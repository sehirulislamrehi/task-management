<?php

namespace App\Http\Controllers\Backend\UserModule\User;

use App\Http\Controllers\Controller;
use App\Models\Backend\CommonModule\BusinessUnit;
use App\Models\Backend\UserModule\ServiceCenterUser;
use App\Models\Backend\UserModule\User;
use App\Services\Backend\DatatableServices\UserModule\User\UserDatatableService;
use App\Services\Backend\ModuleServices\CommonModule\BusinessUnit\BusinessUnitService;
use App\Services\Backend\ModuleServices\UserModule\User\UserService;
use App\Traits\ApiResponseTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserServiceCenterController extends Controller
{

    protected BusinessUnitService $businessUnitService;
    protected UserService $userService;
    protected UserDatatableService $userDatatableService;
    use ApiResponseTrait;

    public function __construct(BusinessUnitService $businessUnitService, UserService $userService, UserDatatableService $userDatatableService)
    {
        $this->businessUnitService = $businessUnitService;
        $this->userService = $userService;
        $this->userDatatableService = $userDatatableService;
    }

    public function getUserServiceCenter($id)
    {
        try {
            if (can("user_service_center")) {
                $user = User::where("id", $id)->first();

                if (!$user) {
                    return back()->with('warning', 'User not found');
                }

                $business_units = BusinessUnit::where("is_active", true)->select("id","name")->get();

                return view('backend.modules.user_module.user.pages.service_center.index', compact('user','business_units'));
            } else {
                return back()->with('warning', unauthorized());
            }
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }


    public function getUserServiceCenterData(Request $request, $user_id)
    {
        try {
            if (can("user_service_center")) {
                $data = $this->userService->getServiceCentersUser($request, $user_id);
                return $this->userDatatableService->getServiceCenterUserTable($data);
            } else {
                return $this->warning(null, unauthorized());
            }
        } catch (Exception $e) {
            return $this->error(null, $e->getMessage());
        }
    }

    public function addUserServiceCenterModal($id)
    {
        try {
            if (can("user_service_center")) {
                $user = User::where("id", $id)->first();

                if (!$user) {
                    return 'User not found';
                }

                $business_units = BusinessUnit::where("is_active", true)->orderBy("name", "asc")->select("id", "name")->get();

                return view('backend.modules.user_module.user.pages.service_center.modals.add', compact('user', 'business_units'));
            } else {
                return unauthorized();
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    public function addUserServiceCenter(Request $request, $user_id)
    {
        try {
            if (can("user_service_center")) {
                $validator = Validator::make($request->all(),[
                    "business_unit_id" => "required|exists:business_units,id",
                    "service_center_id" => "required|exists:service_centers,id",
                ]);

                if( $validator->fails() ){
                    return $this->error(null, $validator->errors()->first());
                }

                $mapping_exists = ServiceCenterUser::where("service_center_id",$request->service_center_id)->where("user_id", $user_id)->first();

                if($mapping_exists){
                    return $this->error(null, "Mapping already exists");
                }

                DB::table("service_center_user")->insert([
                    "service_center_id" => $request->service_center_id,
                    "user_id" => $user_id,
                ]);

                return $this->success(null, "New mapping added");

            } else {
                return $this->warning(null, unauthorized());
            }
        } catch (Exception $e) {
            return $this->error(null, $e->getMessage());
        }
    }


    public function getServiceCenterByBu($id)
    {
        try {
            if (can("user_service_center")) {
                $datas = $this->businessUnitService->getServiceCenter($id);
                return $this->success($datas, "Service center data");
            } else {
                return $this->warning(null, unauthorized());
            }
        } catch (Exception $e) {
            return $this->error(null, $e->getMessage());
        }
    }

    public function deleteUserServiceCenterModal($service_center_id, $user_id){
        try {
            if (can("user_service_center")) {
                $service_center_user = ServiceCenterUser::where("service_center_id", $service_center_id)->where("user_id", $user_id)->first();

                if (!$service_center_user) {
                    return 'Data not found';
                }

                return view('backend.modules.user_module.user.pages.service_center.modals.delete', compact('service_center_user'));
            } else {
                return unauthorized();
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    public function deleteUserServiceCenter(Request $request, $service_center_id, $user_id)
    {
        try {
            if (can("user_service_center")) {

                $service_center_user = ServiceCenterUser::where("service_center_id", $service_center_id)->where("user_id", $user_id)->first();

                if (!$service_center_user) {
                    return $this->succerroress(null, "Data already removed");
                }

                DB::statement("DELETE FROM service_center_user WHERE service_center_id = '$service_center_id' AND user_id = '$user_id'");

                return $this->success(null, "Mapping removed");

            } else {
                return $this->warning(null, unauthorized());
            }
        } catch (Exception $e) {
            return $this->error(null, $e->getMessage());
        }
    }
}
