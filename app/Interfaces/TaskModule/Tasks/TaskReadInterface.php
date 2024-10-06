<?php

namespace App\Interfaces\TaskModule\Tasks;

interface TaskReadInterface{
    public function get_all_task($request);
    public function get_all_active_task();
    public function task_datatable($tasks);
    public function get_task_by_id($id);
    public function get_task_counting();
    public function get_highest_task_solve_user_list();
    public function get_highest_average_time_taken_user();
}

?>