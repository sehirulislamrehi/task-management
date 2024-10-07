<?php

namespace Database\Seeders;

use App\Enum\TaskStatusEnum;
use App\Services\Backend\Modules\CommonModule\CommonService;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{

    protected $common_service;
    public function __construct(CommonService $common_service)
    {
        $this->common_service = $common_service;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement("DELETE FROM tasks");
        DB::table('tasks')->insert([
            [
                'id' => 1,
                'name' => "Add to cart functionality",
                'description' => "Add to cart functionality",
                'status' => TaskStatusEnum::PENDING->value,
                'start_date' => Carbon::today()->subDays(28)->format('Y-m-d'),
                'due_date' => Carbon::today()->subDays(25)->format('Y-m-d'),
                'time_taken' => $this->common_service->convert_two_date_to_second(Carbon::today()->subDays(28)->format('Y-m-d'), Carbon::today()->subDays(25)->format('Y-m-d')),
                'assigned_to' => 2,
                'assigned_by' => 1,
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'name' => "Order Place functionality",
                'description' => "Order Place functionality",
                'status' => TaskStatusEnum::PENDING->value,
                'start_date' => Carbon::today()->subDays(15)->format('Y-m-d'),
                'due_date' => Carbon::today()->subDays(11)->format('Y-m-d'),
                'time_taken' => $this->common_service->convert_two_date_to_second(Carbon::today()->subDays(15)->format('Y-m-d'), Carbon::today()->subDays(11)->format('Y-m-d')),
                'assigned_to' => 3,
                'assigned_by' => 2,
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'name' => "APP ui development",
                'description' => "APP ui development",
                'status' => TaskStatusEnum::COMPLETE->value,
                'start_date' => Carbon::today()->subDays(30)->format('Y-m-d'),
                'due_date' => Carbon::today()->subDays(20)->format('Y-m-d'),
                'time_taken' => $this->common_service->convert_two_date_to_second(Carbon::today()->subDays(30)->format('Y-m-d'), Carbon::today()->subDays(20)->format('Y-m-d')),
                'assigned_to' => 4,
                'assigned_by' => 1,
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 4,
                'name' => "Push notification development",
                'description' => "Push notification development",
                'status' => TaskStatusEnum::COMPLETE->value,
                'start_date' => Carbon::today()->subDays(17)->format('Y-m-d'),
                'due_date' => Carbon::today()->subDays(16)->format('Y-m-d'),
                'time_taken' => $this->common_service->convert_two_date_to_second(Carbon::today()->subDays(17)->format('Y-m-d'), Carbon::today()->subDays(16)->format('Y-m-d')),
                'assigned_to' => 1,
                'assigned_by' => 2,
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 5,
                'name' => "Point system",
                'description' => "Point system",
                'status' => TaskStatusEnum::COMPLETE->value,
                'start_date' => Carbon::today()->subDays(1)->format('Y-m-d'),
                'due_date' => Carbon::today()->subDays(1)->format('Y-m-d'),
                'time_taken' => $this->common_service->convert_two_date_to_second(Carbon::today()->subDays(1)->format('Y-m-d'), Carbon::today()->subDays(1)->format('Y-m-d')),
                'assigned_to' => 4,
                'assigned_by' => 3,
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 6,
                'name' => "Role management development",
                'description' => "Role management development",
                'status' => TaskStatusEnum::COMPLETE->value,
                'start_date' => Carbon::today()->subDays(13)->format('Y-m-d'),
                'due_date' => Carbon::today()->subDays(1)->format('Y-m-d'),
                'time_taken' => $this->common_service->convert_two_date_to_second(Carbon::today()->subDays(13)->format('Y-m-d'), Carbon::today()->subDays(1)->format('Y-m-d')),
                'assigned_to' => 3,
                'assigned_by' => 4,
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 7,
                'name' => "EMI functionality development",
                'description' => "EMI functionality development",
                'status' => TaskStatusEnum::IN_PROGRESS->value,
                'start_date' => Carbon::today()->subDays(18)->format('Y-m-d'),
                'due_date' => Carbon::today()->subDays(18)->format('Y-m-d'),
                'time_taken' => $this->common_service->convert_two_date_to_second(Carbon::today()->subDays(18)->format('Y-m-d'), Carbon::today()->subDays(18)->format('Y-m-d')),
                'assigned_to' => 2,
                'assigned_by' => 4,
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
