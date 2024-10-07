<?php

namespace App\Repositories\TaskModule\Tasks;

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
          $folder = $this->get_file_path("task");
          if($file){
               $filename = rand(00000,99999) .'_'. time() .'.'. $file->getClientOriginalExtension();
               if( $this->common_service->file_upload($file,$filename,$folder,null)){
                    $task->image = $filename;
               }
          }
          
          $task->time_taken = $this->common_service->convert_two_date_to_second($request->start_date, $request->due_date);
          $task->save();
          return $this->success(null, "Task Created");
     }

     public function edit($request, $task){

          $task->name = $request->name;
          $task->description = $request->description;
          $task->status = $request->status;
          $task->start_date = $request->start_date;
          $task->due_date = $request->due_date;

          if($request->assigned_to){
               $task->assigned_to = $request->assigned_to;
          }

          $file = $request->file('image');
          $folder = $this->get_file_path("task");

          if($file){
               $filename = rand(00000,99999) .'_'. time() .'.'. $file->getClientOriginalExtension();
               if( $this->common_service->file_upload($file,$filename,$folder,null) ){
                    $task->image = $filename;
               }
          }

          if( $request->is_attachment_remove ){
               $this->common_service->remove_file($folder,$task->image,"public");
               $task->image = null;
          }
          
          $task->time_taken = $this->common_service->convert_two_date_to_second($request->start_date, $request->due_date);
          $task->save();
          return $this->success(null, "Task Updated");
     }

     public function delete($task){
          $folder = $this->get_file_path("task");
          $this->common_service->remove_file($folder,$task->image,"public");
          $task->delete();
          return $this->success(null, "Task Removed");
     }
}
