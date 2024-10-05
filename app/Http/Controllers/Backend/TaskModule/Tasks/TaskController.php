<?php

namespace App\Http\Controllers\Backend\TaskModule\Tasks;

use App\Enum\TaskStatusEnum;
use App\Http\Controllers\Controller;
use App\Interfaces\TaskModule\Tasks\TaskReadInterface;
use App\Interfaces\TaskModule\Tasks\TaskWriteInterface;
use App\Interfaces\UserModule\User\UserReadInterface;
use App\Services\Backend\Modules\TaskModule\TaskService;
use App\Traits\ApiResponseTrait;
use Exception;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    
    use ApiResponseTrait;
    protected $task_read_repository;
    protected $task_write_repository;
    protected $task_service;
    protected $user_read_repository;

    public function __construct(TaskReadInterface $task_read_interface, TaskWriteInterface $task_write_interface, TaskService $task_service, UserReadInterface $user_read_interface)
    {
        $this->task_read_repository = $task_read_interface;
        $this->task_write_repository = $task_write_interface;
        $this->task_service = $task_service;
        $this->user_read_repository = $user_read_interface;
    }

    public function index(){
        try{
            if (can('task_list')) {
                return view("backend.modules.task_module.tasks.index");
            } else {
                return view("errors.403");
            }
        }
        catch(Exception $e){
            return back()->with('error', $e->getMessage());
        }
    }

    public function data(){
        try{
            if (can('task_list')) {
                $tasks = $this->task_read_repository->get_all_task();
                return $this->task_read_repository->task_datatable($tasks);
            } 
            else {
                return unauthorized();
            }
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function add_modal(){
        try{
            if(can("add_task")){
                $all_task_status = $this->task_service->get_task_status();
                return view("backend.modules.task_module.tasks.modals.add", compact("all_task_status"));
            }
            else{
                return unauthorized();
            }
        }
        catch( Exception $e ){
            return $e->getMessage();
        }
    }

    public function get_user_by_email($email){
        try{
            if(can("add_task")){
                $users = $this->user_read_repository->get_user_by_email($email);
                return $this->success($users, "User data");
            }
            else{
                return $this->warning(null, unauthorized());
            }
        }
        catch( Exception $e ){
            return $this->error(null, $e->getMessage());
        }
    }

    public function add(Request $request){
        try{
            if(can("add_task")){
                
            }
            else{
                return $this->warning(null, unauthorized());
            }
        }
        catch( Exception $e ){
            return $this->error(null, $e->getMessage());
        }
    }
}
