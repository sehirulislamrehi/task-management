<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement("DELETE FROM sub_modules");
        DB::table('sub_modules')->insert([
            //module id 1 start
            [
                'id' => 1,
                'name' => 'Business units',
                'key' => 'bu_index',
                'position' => 1,
                'route' => 'admin.common-module.bu.index',
                'module_id' => 1,
            ],
            [
                'id' => 2,
                'name' => 'District',
                'key' => 'district_index',
                'position' => 2,
                'route' => 'admin.common-module.district.index',
                'module_id' => 1,
            ],
            [
                'id' => 3,
                'name' => 'Thana',
                'key' => 'thana_index',
                'position' => 3,
                'route' => 'admin.common-module.thana.index',
                'module_id' => 1,
            ],
            [
                'id' => 4,
                'name' => 'Service Center',
                'key' => 'service_center_index',
                'position' => 4,
                'route' => 'admin.common-module.service-center.index',
                'module_id' => 1,
            ],
            [
                'id' => 5,
                'name' => 'Brand',
                'key' => 'brand_index',
                'position' => 5,
                'route' => 'admin.common-module.brand.index',
                'module_id' => 1,
            ],
            [
                'id' => 6,
                'name' => 'Channel',
                'key' => 'channel_index',
                'position' => 5,
                'route' => 'admin.common-module.channel.index',
                'module_id' => 1,
            ],
            [
                'id' => 16,
                'name' => 'Othoba Department',
                'key' => 'manage_othoba_department',
                'position' => 5,
                'route' => 'admin.common-module.othoba-department.index',
                'module_id' => 1
            ],
            [
                'id' => 17,
                'name' => 'Othoba Ticket Category',
                'key' => 'othoba_ticket_category',
                'position' => 5,
                'route' => 'admin.common-module.othoba-ticket-category.index',
                'module_id' => 1
            ],
            //module id 1 end


            //module id 2 start
            [
                'id' => 7,
                'name' => 'User',
                'key' => 'user_index',
                'position' => 1,
                'route' => 'admin.user-module.user.index',
                'module_id' => 2,
            ],
            [
                'id' => 8,
                'name' => 'Role',
                'key' => 'role_index',
                'position' => 1,
                'route' => 'admin.user-module.role.index',
                'module_id' => 2,
            ],
            //module id 2 end


            //module id 3 start
            [
                'id' => 9,
                'name' => 'Product Category',
                'key' => 'product_category_index',
                'position' => 1,
                'route' => 'admin.product-module.product-category.index',
                'module_id' => 3
            ],
            //module id 3 end

            //module id 4 start
            [
                'id' => 10,
                'name' => 'Ticketing',
                'key' => 'ticket_index',
                'position' => 1,
                'route' => 'ticket.admin.ticket.index',
                'module_id' => 4
            ],
            [
                'id' => 18,
                'name' => 'Othoba Ticket',
                'key' => 'othoba_ticket_index',
                'position' => 2,
                'route' => 'ticket.admin.othoba.ticket.index',
                'module_id' => 4
            ],
            //module id 4 end

            //module id 5 start

            [
                'id' => 11,
                'name' => 'Call Recording',
                'key' => 'recording_index',
                'position' => 1,
                'route' => 'admin.agent-module.recording.index',
                'module_id' => 5
            ],
            [
                'id' => 12,
                'name' => 'Agent List',
                'key' => 'agent_list_index',
                'position' => 2,
                'route' => 'admin.agent-module.agent_list.agent-list.index',
                'module_id' => 5
            ],
            [
                'id' => 13,
                'name' => 'Agent Performance',
                'key' => 'agent_performance_index',
                'position' => 3,
                'route' => 'admin.agent-module.agent_performance.index',
                'module_id' => 5
            ],
            //module id 5 end

            //module id 6 start
            [
                'id' => 14,
                'name' => 'Evaluation Section',
                'key' => 'evaluation_section_index',
                'position' => 1,
                'route' => 'admin.qc-module.evaluation_criteria.index',
                'module_id' => 6
            ],
            [
                'id' => 15,
                'name' => 'Evaluation Report',
                'key' => 'evaluation_report_index',
                'position' => 1,
                'route' => 'admin.qc-module.evaluation_report.index',
                'module_id' => 6
            ],
            //module id 6 end


        ]);
        //last id 18
    }
}
