<?php

namespace App\Services\Backend\Modules\TaskModule;

use App\Enum\TaskStatusEnum;

class TaskService
{
    public function get_task_status(){
        return TaskStatusEnum::all();
    }
}

?>