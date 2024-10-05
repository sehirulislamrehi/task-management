<?php

namespace App\Interfaces\TaskModule\Tasks;

interface TaskReadInterface{
    public function get_all_task();
    public function get_all_active_task();
    public function task_datatable($tasks);
}

?>