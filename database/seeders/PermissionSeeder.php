<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
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
            //Common module
            [
                'id' => 1,
                'key' => 'common_module',
                'display_name' => 'Common Module',
                'module_id' => 1,
            ],
            [
                'id' => 2,
                'key' => 'bu_index',
                'display_name' => 'Business Units',
                'module_id' => 1,
            ],
            [
                'id' => 3,
                'key' => 'district_index',
                'display_name' => 'District',
                'module_id' => 1,
            ],
            [
                'id' => 4,
                'key' => 'service_center_index',
                'display_name' => 'Service Center',
                'module_id' => 1,
            ],
            [
                'id' => 5,
                'key' => 'thana_index',
                'display_name' => 'Thana',
                'module_id' => 1,
            ],
            [
                'id' => 6,
                'key' => 'brand_index',
                'display_name' => 'Brand',
                'module_id' => 1,
            ],
            //User module
            [
                'id' => 7,
                'key' => 'user_module',
                'display_name' => 'User Module',
                'module_id' => 2,
            ],
            [
                'id' => 8,
                'key' => 'user_index',
                'display_name' => 'User',
                'module_id' => 2,
            ],
            [
                'id' => 9,
                'key' => 'password_reset',
                'display_name' => 'Password Reset',
                'module_id' => 2,
            ],
            [
                'id' => 10,
                'key' => 'role_index',
                'display_name' => 'Role',
                'module_id' => 2,
            ],
            [
                'id' => 11,
                'key' => 'channel_index',
                'display_name' => 'Channel',
                'module_id' => 2,
            ],
            //Product Module
            [
                'id' => 12,
                'key' => 'product_module',
                'display_name' => 'Product',
                'module_id' => 3
            ],
            [
                'id' => 13,
                'key' => 'product_category_index',
                'display_name' => 'Product Category',
                'module_id' => 3
            ],
            //Ticketing module
            [
                'id' => 14,
                'key' => 'ticket_module',
                'display_name' => 'Ticket Module',
                'module_id' => 4,
            ],
            [
                'id' => 15,
                'key' => 'ticket_index',
                'display_name' => 'Ticket List',
                'module_id' => 4
            ],
            [
                'id' => 16,
                'key' => 'agent_panel',
                'display_name' => 'Agent Panel',
                'module_id' => 4
            ],
            [
                'id' => 17,
                'key' => 'user_service_center',
                'display_name' => 'Assign User Service Center',
                'module_id' => 2,
            ],
            //Agent Module
            [
                'id' => 18,
                'key' => 'agent_module',
                'display_name' => 'Agent Module',
                'module_id' => 5,
            ],
            [
                'id' => 19,
                'key' => 'recording_index',
                'display_name' => 'Recordings',
                'module_id' => 5,
            ],
            [
                'id' => 20,
                'key' => 'agent_list_index',
                'display_name' => 'Agent List',
                'module_id' => 5,
            ],
            [
                'id' => 21,
                'key' => 'agent_performance_index',
                'display_name' => 'Agent Performance',
                'module_id' => 5,
            ],
            [
                'id' => 22,
                'key' => 'user_thana',
                'display_name' => 'Assign User Thana',
                'module_id' => 2,
            ],
            [
                'id' => 23,
                'key' => 'ticket_status_update',
                'display_name' => 'Ticket Status Update',
                'module_id' => 4,
            ],
            //QC
            [
                'id' => 24,
                'key' => 'qc_module',
                'display_name' => 'QC Module',
                'module_id' => 6,
            ],
            [
                'id' => 25,
                'key' => 'evaluation_section_index',
                'display_name' => 'Evaluation Section',
                'module_id' => 6,
            ],
            [
                'id' => 26,
                'key' => 'evaluation_report_index',
                'display_name' => 'Evaluation Report',
                'module_id' => 6,
            ],
            [
                'id' => 27,
                'key' => 'manage_othoba_department',
                'display_name' => 'Manage Othoba Department',
                'module_id' => 1,
            ],
            [
                'id' => 28,
                'key' => 'othoba_ticket_category',
                'display_name' => 'Othoba Ticket Category',
                'module_id' => 1,
            ],
            [
                'id' => 29,
                'key' => 'othoba_ticket_index',
                'display_name' => 'Othoba Ticket',
                'module_id' => 4,
            ],
            [
                'id' => 30,
                'key' => 'othoba_ticket_status',
                'display_name' => 'Othoba Ticket Status',
                'module_id' => 4,
            ],
        ]);
    }
}
