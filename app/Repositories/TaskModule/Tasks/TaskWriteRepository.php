<?php

namespace App\Repositories\TaskModule\Tasks;

use App\Enum\TaskStatusEnum;
use App\Interfaces\TaskModule\Tasks\TaskWriteInterface;
use App\Models\TaskModule\Task;
use App\Services\Backend\Modules\CommonModule\CommonService;
use App\Traits\ApiResponseTrait;
use App\Traits\FilePathTrait;

class TaskWriteRepository implements TaskWriteInterface
{
     use FilePathTrait, ApiResponseTrait;
     protected $common_service;
     public function __construct(CommonService $common_service)
     {
          $this->common_service = $common_service;
     }

     public function create($request){

          $task = new Task();

          $task->name = $request->name;
          $task->description = $request->description;
          $task->status = $request->status;
          $task->start_date = $request->start_date;
          $task->due_date = $request->due_date;
          $task->assigned_to = $request->assigned_to;
          $task->assigned_by = auth('web')->user()->id;

          $file = $request->file('image');
          if($file){
               $path = $this->get_file_path("task");
               $filename = rand(00000,99999) .'_'. time() .'.'. $file->getClientOriginalExtension();
               if( $this->common_service->file_upload($file,$filename,$path,null)){
                    $task->image = $filename;
               }
          }
          
          if( $request->status === TaskStatusEnum::COMPLETE->value ){
               $task->done_at = date("Y-m-d H:i:s");
               $task->time_taken = 0;
          }

          $task->save();
          return $this->success(null, "Task saved");
     }

     public function edit($request, $task){

          $task->name = $request->name;
          $task->description = $request->description;
          $task->status = $request->status;
          $task->start_date = $request->start_date;
          $task->due_date = $request->due_date;
          $task->assigned_to = $request->assigned_to;
          $task->assigned_by = auth('web')->user()->id;

          $file = $request->file('image');
          if($file){
               $path = $this->get_file_path("task");
               $filename = rand(00000,99999) .'_'. time() .'.'. $file->getClientOriginalExtension();
               if( $this->common_service->file_upload($file,$filename,$path,null)){
                    $task->image = $filename;
               }
          }
          
          if( $request->status === TaskStatusEnum::COMPLETE->value ){
               $task->done_at = date("Y-m-d H:i:s");
               $task->time_taken = 0;
          }

          $task->save();
          return $this->success(null, "Task saved");
     }
}
