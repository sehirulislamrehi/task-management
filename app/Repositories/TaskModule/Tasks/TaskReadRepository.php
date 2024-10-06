<?php

namespace App\Repositories\TaskModule\Tasks;

use App\Enum\TaskStatusEnum;
use App\Interfaces\TaskModule\Tasks\TaskReadInterface;
use App\Models\TaskModule\Task;
use App\Services\Backend\Modules\CommonModule\CommonService;
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
        $query = Task::orderBy("id", "desc")->with("task_assigned_to","task_assigned_by")->where(function($query) use ($auth){
            $query->where("assigned_to",$auth->id)->orWhere("assigned_by", $auth->id);
        });

        if( $request['task_name'] ){
            $query->where("name","LIKE","%".$request['task_name']."%");
        }

        if( $request['status'] ){
            $query->where("status",$request['status']);
        }

        if( $request['start_date'] && $request['due_date'] ){
            $query->where("start_date",">=",$request['start_date']);
            $query->where("due_date","<=",$request['due_date']);
        }
        elseif( $request['start_date'] ){
            // dd("in");
            $query->where("start_date","=",$request['start_date']);
        }
        elseif( $request['due_date'] ){
            $query->where("due_date","=",$request['due_date']);
        }

        if( $request['assign_to_email'] ){
            $query->whereHas("task_assigned_to", function($query) use ($request){
                $query->where("email", $request['assign_to_email']);
            });
        }

        if( $request['assign_by_email'] ){
            $query->whereHas("task_assigned_by", function($query) use ($request){
                $query->where("email", $request['assign_by_email']);
            });
        }

        if( $request['created_date'] ){
            $query->where("created_at", ">=", $request['created_date'] . ' 00:00:00');
            $query->where("created_at", "<=", $request['created_date'] . ' 23:59:59');
        }

        if( $request['type'] && $request['type'] === "AssignedToMe" ){
            $query->where("assigned_to",$auth->id);
        }

        if( $request['type'] && $request['type'] === "AssignedByMe" ){
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
            ->order(function($tasks) {
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

    public function get_task_by_id($id){
        return Task::where("id", $id)->with("task_assigned_to","task_assigned_by")->first();
    }
}
