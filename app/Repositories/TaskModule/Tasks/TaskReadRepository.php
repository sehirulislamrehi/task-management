<?php

namespace App\Repositories\TaskModule\Tasks;

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
            ->rawColumns(['action', 'due_date', 'assigned_to', 'assigned_by', 'created_at', 'done_at'])
            ->editColumn('due_date', function (Task $task) {
                
            })
            ->editColumn('assigned_to', function (Task $task) {
                
            })
            ->editColumn('assigned_by', function (Task $task) {
                
            })
            ->editColumn('created_at', function (Task $task) {
                
            })
            ->editColumn('done_at', function (Task $task) {
                
            })
            ->addColumn('action', function (Task $task) {
                return '
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown' . $task->id . '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdown' . $task->id . '">
                    
                        ' . (can("edit_user") ? '
                        <a class="dropdown-item" href="#" data-content="' . route('user.edit', $task->id) . '" data-target="#myModal" class="btn btn-outline-dark" data-toggle="modal">
                            <i class="fas fa-edit"></i>
                            Edit
                        </a>
                        ' : '') . '

                        ' . (can("reset_password") ? '
                        <a class="dropdown-item" href="#" data-content="' . route('user.reset.modal', $task->id) . '" data-target="#myModal" data-toggle="modal">
                            <i class="fas fa-key"></i>
                            Reset Password
                        </a>
                        ' : '') . '

                    </div>
                </div>
                ';
            })
            ->make(true);
    }
}
