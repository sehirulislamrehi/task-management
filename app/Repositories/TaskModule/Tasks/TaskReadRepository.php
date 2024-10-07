<?php

namespace App\Repositories\TaskModule\Tasks;

use App\Enum\TaskStatusEnum;
use App\Interfaces\TaskModule\Tasks\TaskReadInterface;
use App\Models\TaskModule\Task;
use App\Services\Backend\Modules\CommonModule\CommonService;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class TaskReadRepository implements TaskReadInterface
{

    protected $common_service;
    public function __construct(CommonService $common_service)
    {
        $this->common_service = $common_service;
    }

    public function get_all_task($request)
    {
        $auth = auth('web')->user();

        $query = Task::orderBy("id", "desc")->with("task_assigned_to", "task_assigned_by");

        if( $auth->is_super_admin == false ){
            $query->where(function ($query) use ($auth) {
                $query->where("assigned_to", $auth->id)->orWhere("assigned_by", $auth->id);
            });
        }

        if ($request['task_name']) {
            $query->where("name", "LIKE", "%" . $request['task_name'] . "%");
        }

        if ($request['status']) {
            $query->where("status", $request['status']);
        }

        if ($request['start_date'] && $request['due_date']) {
            $query->where("start_date", ">=", $request['start_date']);
            $query->where("due_date", "<=", $request['due_date']);
        } elseif ($request['start_date']) {
            // dd("in");
            $query->where("start_date", "=", $request['start_date']);
        } elseif ($request['due_date']) {
            $query->where("due_date", "=", $request['due_date']);
        }

        if ($request['assign_to_email']) {
            $query->whereHas("task_assigned_to", function ($query) use ($request) {
                $query->where("email", $request['assign_to_email']);
            });
        }

        if ($request['assign_by_email']) {
            $query->whereHas("task_assigned_by", function ($query) use ($request) {
                $query->where("email", $request['assign_by_email']);
            });
        }

        if ($request['created_date']) {
            $query->where("created_at", ">=", $request['created_date'] . ' 00:00:00');
            $query->where("created_at", "<=", $request['created_date'] . ' 23:59:59');
        }

        if ($request['type'] && $request['type'] === "AssignedToMe") {
            $query->where("assigned_to", $auth->id);
        }

        if ($request['type'] && $request['type'] === "AssignedByMe") {
            $query->where("assigned_by", $auth->id);
        }

        return $query;
    }
    public function get_all_active_task()
    {
        return Task::orderBy("id", "desc")->where("is_active", true);
    }

    public function task_datatable($tasks)
    {
        return DataTables::of($tasks)
            ->addIndexColumn()
            ->order(function ($tasks) {
                $tasks->orderBy('id', 'desc');  // Apply ordering here
            })
            ->rawColumns(['action', 'start_date', 'due_date', 'assigned_to', 'assigned_by', 'created_at', 'time_taken'])
            ->editColumn('start_date', function (Task $task) {
                return $task->start_date;
            })
            ->editColumn('due_date', function (Task $task) {
                return $task->due_date;
            })
            ->editColumn('assigned_to', function (Task $task) {
                return $task->task_assigned_to->name;
            })
            ->editColumn('assigned_by', function (Task $task) {
                return $task->task_assigned_by->name;
            })
            ->editColumn('created_at', function (Task $task) {
                return $task->created_at;
            })
            ->editColumn('time_taken', function (Task $task) {
                return $this->common_service->convert_second_to_hour_minute($task->time_taken);
            })
            ->addColumn('action', function (Task $task) {
                return '
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown' . $task->id . '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdown' . $task->id . '">
                    
                        ' . (can("edit_task") ? '
                        <a class="dropdown-item" href="#" data-content="' . route('task.edit.modal', $task->id) . '" data-target="#myModal" class="btn btn-outline-dark" data-toggle="modal">
                            <i class="fas fa-edit"></i>
                            Edit
                        </a>
                        ' : '') . '

                        ' . (can("delete_task") ? '
                        <a class="dropdown-item" href="#" data-content="' . route('task.delete.modal', $task->id) . '" data-target="#myModal" data-toggle="modal">
                            <i class="fas fa-trash"></i>
                            Delete
                        </a>
                        ' : '') . '

                        ' . (can("task_list") ? '
                        <a class="dropdown-item" href="#" data-content="' . route('task.details', $task->id) . '" data-target="#myModal" data-toggle="modal">
                            <i class="fas fa-eye"></i>
                            Details
                        </a>
                        ' : '') . '
                        
                    </div>
                </div>
                ';
            })
            ->make(true);
    }

    public function get_task_by_id($id)
    {
        return Task::where("id", $id)->with("task_assigned_to", "task_assigned_by")->first();
    }

    public function get_task_counting(){

        $today = Carbon::today()->format('Y-m-d');
        $yesterday = Carbon::today()->subDay()->format('Y-m-d');
        $thirty_days_before = Carbon::today()->subDays(30)->format('Y-m-d');

        $query = Task::query();

        $yesterday_task = (clone $query)->where("start_date",$yesterday)->count();
        $yesterday_complete = (clone $query)->where("due_date",$yesterday)->where("status",TaskStatusEnum::COMPLETE->value)->count();
        $total_task_last_thirty_days = (clone $query)->where("start_date",">=",$thirty_days_before)->where("due_date","<=",$today)->count();
        $total_last_thirty_day_complete_task = (clone $query)->where("start_date",">=",$thirty_days_before)->where("due_date","<=",$today)->where("status",TaskStatusEnum::COMPLETE->value)->select("time_taken")->count();

        $sum_last_thirty_day_complete_task_time_taken = (clone $query)->where("start_date",">=",$thirty_days_before)->where("due_date","<=",$today)->where("status",TaskStatusEnum::COMPLETE->value)->select("time_taken")->sum("time_taken");
        $average_time_taken_second = ($total_last_thirty_day_complete_task == 0 ) ? 0 : abs($sum_last_thirty_day_complete_task_time_taken / $total_last_thirty_day_complete_task);

        return [
            "yesterday_task" => $yesterday_task,
            "yesterday_complete" => $yesterday_complete,
            "total_task_last_thirty_days" => $total_task_last_thirty_days,
            "average_time_taken_second" => $this->common_service->convert_second_to_hour_minute($average_time_taken_second)
        ];
    }

    public function get_highest_task_solve_user_list()
    {

        $today = Carbon::today()->format('Y-m-d');
        $thirty_days_before = Carbon::today()->subDays(30)->format('Y-m-d');

        return DB::table('tasks')->where("tasks.status", TaskStatusEnum::COMPLETE->value)
            ->where("start_date",">=",$thirty_days_before)->where("due_date","<=",$today)
            ->select('users.name', 'users.email', DB::raw('COUNT(tasks.id) as completed_tasks'))
            ->join('users', 'tasks.assigned_to', '=', 'users.id')
            ->where('tasks.status', TaskStatusEnum::COMPLETE->value)  
            ->groupBy('tasks.assigned_to', 'users.name', 'users.email')
            ->orderBy('completed_tasks', 'desc')
            ->limit(5)
            ->get();
    }

    public function get_highest_average_time_taken_user(){

        $today = Carbon::today()->format('Y-m-d');
        $thirty_days_before = Carbon::today()->subDays(30)->format('Y-m-d');

        $result = [];
        $datas = DB::table('tasks')
        ->where("start_date",">=",$thirty_days_before)->where("due_date","<=",$today)
        ->select('users.name', 'users.email', DB::raw('SUM(tasks.time_Taken) as total_time_Taken'), DB::raw('COUNT(tasks.id) as total_task'))
        ->join('users', 'tasks.assigned_to', '=', 'users.id') 
        ->groupBy('tasks.assigned_to', 'users.name', 'users.email')
        ->orderBy('total_time_Taken', 'desc')
        ->limit(5)
        ->get();

        foreach( $datas as &$data ){
            $data->hour_min = ($data->total_task == 0) ? 0 : $this->common_service->convert_second_to_hour_minute(abs($data->total_time_Taken / $data->total_task));
        }

        return $datas;
    }
}
