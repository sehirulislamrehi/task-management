<?php

namespace App\Http\Controllers\Backend\UserModule\User;

use App\Http\Controllers\Controller;
use App\Models\Backend\CommonModule\District;
use App\Models\Backend\UserModule\User;
use App\Models\Backend\UserModule\UserThana;
use App\Services\Backend\DatatableServices\UserModule\User\UserDatatableService;
use App\Services\Backend\ModuleServices\UserModule\User\UserService;
use App\Traits\ApiResponseTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserThanaController extends Controller
{

    protected UserService $userService;
    protected UserDatatableService $userDatatableService;
    use ApiResponseTrait;

    public function __construct(UserService $userService, UserDatatableService $userDatatableService)
    {
        $this->userService = $userService;
        $this->userDatatableService = $userDatatableService;
    }

    public function getUserThana($id){
        try {
            if (can("user_thana")) {
                $user = User::where("id", $id)->first();

                if (!$user) {
                    return back()->with('warning', 'User not found');
                }

                return view('backend.modules.user_module.user.pages.thanas.index', compact('user'));
            } else {
                return back()->with('warning', unauthorized());
            }
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }


    public function getUserThanaData(Request $request, $user_id)
    {
        try {
            if (can("user_thana")) {
                $data = $this->userService->getUserThana($request, $user_id);
                return $this->userDatatableService->getUserThanaTable($data);
            } else {
                return $this->warning(null, unauthorized());
            }
        } catch (Exception $e) {
            return $this->error(null, $e->getMessage());
        }
    }


    public function addUserThanaModal($user_id){
        try {
            if (can("user_thana")) {

                $user = User::where("id",$user_id)->first();
                if(!$user){
                    return "No user found";
                }

                $districts = District::select("id","name")->orderBy("name","asc")->get();

                return view('backend.modules.user_module.user.pages.thanas.modals.add', compact('districts','user'));

            } else {
                return unauthorized();
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    public function addUserThana(Request $request, $user_id){
        try {
            if (can("user_thana")) {

                $validator = Validator::make($request->all(),[
                    "thana_id" => "required|exists:thanas,id"
                ]);

                if( $validator->fails() ){
                    return $this->error(null, $validator->errors()->first());
                }

                $exists = UserThana::where("user_id", $user_id)->where("thana_id", $request->thana_id)->first();
                if($exists){
                    return $this->error(null, "Thana already assigned");
                }

                DB::table("user_thanas")->insert([
                    "user_id" => $user_id,
                    "thana_id" => $request->thana_id,
                ]);

                return $this->success(null, "Thana assigned");

            } else {
                return $this->error(null, unauthorized());
            }
        } catch (Exception $e) {
            return $this->error(null, $e->getMessage());
        }
    }


    public function deleteUserThanaModal($thana_id, $user_id){
        try {
            if (can("user_thana")) {

                $user_thana = UserThana::where("user_id", $user_id)->where("thana_id", $thana_id)->with("user","thana")->first();
                if(!$user_thana){
                    return $this->error(null, "Thana already removed");
                }

                return view('backend.modules.user_module.user.pages.thanas.modals.delete', compact('user_thana'));

            } else {
                return unauthorized();
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    public function deleteUserThana(Request $request, $thana_id, $user_id){
        try {
            if (can("user_thana")) {


                $user_thana = UserThana::where("user_id", $user_id)->where("thana_id", $thana_id)->first();
                if(!$user_thana){
                    return $this->error(null, "Thana already removed");
                }

                DB::table("user_thanas")->where("user_id", $user_id)->where("thana_id", $thana_id)->delete();

                return $this->success(null, "Thana removed");


            } else {
                return $this->error(null, unauthorized());
            }
        } catch (Exception $e) {
            return $this->error(null, $e->getMessage());
        }
    }

}
