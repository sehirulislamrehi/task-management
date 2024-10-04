<?php

namespace App\Http\Controllers\Backend\UserModule\User;

use App\Enum\UserGroupEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\UserModule\User\UserCreateRequest;
use App\Http\Requests\Backend\UserModule\User\UserUpdateRequest;
use App\Models\Backend\CommonModule\BusinessUnit;
use App\Models\Backend\CommonModule\ServiceCenter;
use App\Models\Backend\UserModule\AgentType;
use App\Models\Backend\UserModule\User;
use App\Services\Backend\CommonService\OthobaDepartment\OthobaDepartmentService;
use App\Services\Backend\DatatableServices\UserModule\User\UserDatatableService;
use App\Services\Backend\ModuleServices\UserModule\User\UserService;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{

    use ApiResponseTrait;

    protected UserService $userService;
    protected UserDatatableService $userDatatableService;
    protected OthobaDepartmentService $othobaDepartmentService;

    /**
     * @param UserService $userService
     * @param UserDatatableService $userDatatableService
     * @param OthobaDepartmentService $othobaDepartmentService
     */
    public function __construct(UserService $userService, UserDatatableService $userDatatableService, OthobaDepartmentService $othobaDepartmentService)
    {
        $this->userService = $userService;
        $this->userDatatableService = $userDatatableService;
        $this->othobaDepartmentService = $othobaDepartmentService;
    }


    function index(): View
    {
        if (can('user_index')) {
            if (auth('super_admin')->check()) {
                $businessUnits = BusinessUnit::all();
                $serviceCenters = ServiceCenter::all();
            } else {
                $userId = auth('web')->user()->id;
                $user = User::find($userId);
                if ($user->user_group->id == UserGroupEnum::ADMIN->value && count(isAdminBusinessUnitAccess()) == 0) {
                    $businessUnits = BusinessUnit::all();
                    $serviceCenters = ServiceCenter::all();
                } elseif ($user->user_group->id == UserGroupEnum::ADMIN->value && count(isAdminBusinessUnitAccess()) > 0) {
                    $userBusinessUnits = DB::table("business_unit_user")->where("user_id", $user->id)->pluck("business_unit_id")->toArray();
                    $businessUnits = BusinessUnit::whereIn("id", $userBusinessUnits)->get();
                    $businessUnitServiceCenters = DB::table('business_unit_service_center')->whereIn("business_unit_id", $userBusinessUnits)->pluck("service_center_id")->toArray();
                    $serviceCenters = ServiceCenter::whereIn("id", $businessUnitServiceCenters)->get();
                } else {
                    $userBusinessUnits = DB::table("business_unit_user")->where("user_id", $user->id)->pluck("business_unit_id")->toArray();
                    $businessUnits = BusinessUnit::whereIn("id", $userBusinessUnits)->get();
                    $businessUnitServiceCenters = DB::table('business_unit_service_center')->whereIn("business_unit_id", $userBusinessUnits)->pluck("service_center_id")->toArray();
                    $serviceCenters = ServiceCenter::whereIn("id", $businessUnitServiceCenters)->get();
                }

            }

            $user_groups = $this->userService->getUserGroups();
            $othobaDepartmentServices = $this->othobaDepartmentService->getAllOthobaDepartment();

            return view('backend.modules.user_module.user.index', compact('businessUnits', 'serviceCenters', 'user_groups','othobaDepartmentServices'));
        }
        return view('error.403');
    }


    function data(Request $request): \Illuminate\Http\JsonResponse
    {
        if (can('user_index')) {
            // dd($this->userService->getAllUser($request->only('business_unit_id', 'service_center_id')));
            $data = $this->userService->getAllUser($request->only('business_unit_id', 'service_center_id', 'user_group_id','othoba_department_id'));
            return $this->userDatatableService->getUserData($data);
        }
        $alert = array(
            'message' => 'Unauthorized',
            'status' => 'error'
        );
        return response()->json($alert);
    }

    function create(UserCreateRequest $request): \Illuminate\Http\JsonResponse
    {
        if (can('user_index')) {
            $request->validated();
            try {

                $response = $this->userService->createUser($request);

                if( $response['status'] == true ){
                    return $this->success(null, $response['message']);
                }
                else{
                    return $this->error(null, $response['message']);
                }

                // $alert = array(
                //     'message' => 'Successfully saved',
                //     'status' => 'success'
                // );
                // return response()->json($alert);

            } catch (\Throwable $th) {
                $alert = array(
                    'message' => $th->getMessage(),
                    'status' => 'error'
                );
                return response()->json($alert);

            }
        }
        $alert = array(
            'message' => 'Unauthorized',
            'status' => 'error'
        );
        return response()->json($alert);
    }

    public function edit($id): View
    {
        if (can('user_index')) {
            $user = $this->userService->getUserDetails($id);
            $groups = $this->userService->getUserGroups();
            $roles = $this->userService->getRoles();
            $service_centers = $this->userService->getServiceCenters();
            $selected_service_center = $this->userService->userSelectedServiceCenter($user);
            $selected_business_unit = $this->userService->userSelectedBusinessUnit($user);
            $business_units = $this->userService->getBusinessUnit();
            $agent_types = AgentType::where('is_active', true)->get();
            $othobaDepartmentServices = $this->othobaDepartmentService->getAllOthobaDepartment();

            return view('backend.modules.user_module.user.modals.edit', compact('user', 'groups', 'roles', 'service_centers', 'selected_service_center', 'selected_business_unit', 'business_units', 'agent_types', 'othobaDepartmentServices'));
        }
        return view('error.modals.403');
    }


    public function update(UserUpdateRequest $request, int $id): \Illuminate\Http\JsonResponse
    {
        if (can('user_index')) {
            $user = User::findOrFail($id);
            $request->validated();
            try {
                $response = $this->userService->updateUser($request, $user);

                if( $response['status'] == true ){
                    return $this->success(null, $response['message']);
                }
                else{
                    return $this->error(null, $response['message']);
                }

                // $alert = array(
                //     'message' => 'Successfully Done',
                //     'status' => 'success'
                // );
                // return response()->json($alert);

            } catch (\Throwable $th) {
                $alert = array(
                    'message' => $th->getMessage(),
                    'status' => 'error'
                );
                return response()->json($alert);
            }

        }
        $alert = array(
            'message' => 'Unauthorized',
            'status' => 'error'
        );
        return response()->json($alert);
    }

    public function create_modal(): View
    {
        if (can('user_index')) {
            $user_groups = $this->userService->getUserGroups();
            $roles = $this->userService->getRoles();
            $service_centers = $this->userService->getServiceCenters();
            $business_units = $this->userService->getBusinessUnit();
            $othobaDepartmentServices = $this->othobaDepartmentService->getAllOthobaDepartment();

            return view('backend.modules.user_module.user.modals.create', compact('user_groups', 'roles', 'service_centers', 'business_units','othobaDepartmentServices'));
        }
        return view('error.modals.403');
    }


    public function getServiceCenterByBu(Request $request): \Illuminate\Http\JsonResponse
    {
        $selectedBu = $request->input("selectedBu");
        $data = DB::table('service_centers')
            ->join("business_unit_service_center", 'service_centers.id', "=", 'business_unit_service_center.service_center_id')
            ->join('business_units', "business_units.id", "=", "business_unit_service_center.business_unit_id")
            ->select('service_centers.id', 'service_centers.name')
            ->whereIn("business_units.id", $selectedBu)
            ->get();
        return response()->json($data);
    }

    public function passwordResetModal($user_id): View
    {
        if (can('user_index')) {
            $user = User::select('id', 'fullname')->findOrFail($user_id);
            return view('backend.modules.user_module.user.modals.password_reset', compact('user'));
        }
        return view('error.modals.403');
    }

    public function resetPassword(Request $request): \Illuminate\Http\JsonResponse
    {
        if (can('user_index') && can('password_reset')) {
            $request->validate([
                'user_id' => 'required|exists:users,id',
                'password' => "required|min:6",
                'password_confirmation' => "required|same:password"
            ]);

            $user = User::find($request['user_id']);
            $user->password = Hash::make($request['password']);
            $user->save();
            $alert = array(
                'message' => 'Password Reset Successful',
                'status' => 'success'
            );
            return response()->json($alert);
        }
        $alert = array(
            'message' => 'Unauthorized',
            'status' => 'error'
        );
        return response()->json($alert);
    }

    public function getAgentType(): \Illuminate\Http\JsonResponse
    {
        if (can('user_index')) {
            $result = DB::table('agent_types')->select('id', 'agent_type')->where('is_active', true)->get();
            return response()->json($result);
        }
        return response()->json([
            'message' => 'Unauthorized',
            'status' => 'error'
        ]);
    }

}
