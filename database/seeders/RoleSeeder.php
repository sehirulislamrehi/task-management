<?php

namespace Database\Seeders;

use App\Enum\RoleEnum;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('DELETE FROM roles');
        /**
         * Don't change the id and ordering of sequence as long as you know what are you doing, actually.
         * Changing the order need to change on service center service class. As it is hardcoded there.
         */
        DB::table('roles')->insert([
            [
                'id' => RoleEnum::ADMIN,
                'name' => 'Admin',
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => RoleEnum::AGENT,
                'name' => 'Agent',
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => RoleEnum::SERVICE_CENTER,
                'name' => 'Service Center',
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => RoleEnum::TECHNICIAN,
                'name' => 'Technician',
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
