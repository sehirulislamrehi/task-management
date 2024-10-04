<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Services\Backend\Auth\AuthenticationService;
use App\Traits\ApiResponseTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    
    use ApiResponseTrait;

    protected AuthenticationService $authentication_service;

    public function __construct(AuthenticationService $authentication_service)
    {
        $this->authentication_service = $authentication_service;
    }

    public function index(){
        if (auth('web')->check()) {
            return redirect()->route("dashboard");
        } else {
            return view("backend.auth.login");
        }
    }

    public function do_login(Request $request){
        try{
            $validator = Validator::make($request->all(),[
                'email' => 'required|exists:users,email',
                'password' => 'required',
            ]);

            if( $validator->fails() ){
                return $this->warning("", $validator->errors()->first());
            }
            else{

                $response = $this->authentication_service->do_login($request);
                if($response['status']){
                    return $this->location_reload(null, "Login successfull. Redirecting please wait...", true, $response['data']['route']);
                }
                else{
                    return $this->warning(null, $response['message']);
                }
            }

        }
        catch( Exception $e ){
            return $this->error("", $e->getMessage());
        }

    }
}
