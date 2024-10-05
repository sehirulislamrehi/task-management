<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement("DELETE FROM permissions");

        DB::table('permissions')->insert([
            [
                'id' => 1,
                'key' => 'user_module',
                'display_name' => 'User Module',
                'module_id' => 1,
            ],
            [
                'id' => 2,
                'key' => 'all_user',
                'display_name' => 'All User',
                'module_id' => 1,
            ],
            [
                'id' => 3,
                'key' => 'add_user',
                'display_name' => '-- Add User',
                'module_id' => 1,
            ],
            [
                'id' => 4,
                'key' => 'edit_user',
                'display_name' => '-- Edit User',
                'module_id' => 1,
            ],
            [
                'id' => 5,
                'key' => 'reset_password',
                'display_name' => '-- Reset Password',
                'module_id' => 1,
            ],
            [
                'id' => 6,
                'key' => 'task_module',
                'display_name' => 'Task Module',
                'module_id' => 2,
            ],
            [
                'id' => 7,
                'key' => 'task_list',
                'display_name' => 'Task List',
                'module_id' => 2,
            ],
            [
                'id' => 8,
                'key' => 'add_task',
                'display_name' => '-- Add Task',
                'module_id' => 2,
            ],
            [
                'id' => 9,
                'key' => 'edit_task',
                'display_name' => '-- Edit Task',
                'module_id' => 2,
            ],
            [
                'id' => 10,
                'key' => 'delete_task',
                'display_name' => '-- Delete Task',
                'module_id' => 2,
            ],
        ]);
    }
}