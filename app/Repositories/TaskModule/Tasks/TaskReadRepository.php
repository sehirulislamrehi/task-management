<?php

namespace App\Repositories\TaskModule\Tasks;

use App\Enum\TaskStatusEnum;
use App\Interfaces\TaskModule\Tasks\TaskReadInterface;
use App\Models\TaskModule\Task;
use Yajra\DataTables\Facades\DataTables;

class TaskReadRepository implements TaskReadInterface
{
    public function get_all_task()
    {
        return Task::orderBy("id", "desc");
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
            ->rawColumns(['action', 'start_date', 'due_date', 'assigned_to', 'assigned_by', 'created_at', 'done_at'])
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
            ->editColumn('done_at', function (Task $task) {
                if( $task->status === TaskStatusEnum::COMPLETE->value ){

                }
                else{
                    return "<span class='badge badge-danger'>Not Done</span>";
                }
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
                        <a class="dropdown-item" href="#" data-content="' . route('user.reset.modal', $task->id) . '" data-target="#myModal" data-toggle="modal">
                            <i class="fas fa-trash"></i>
                            Delete
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
