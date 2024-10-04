<?php

namespace App\Services\Backend\Auth;

use App\Models\UserModule\User;
use App\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\Auth;

class AuthenticationService
{

     use ApiResponseTrait;

     public function do_login($request)
     {
          $user = User::where("email", $request->email)->first();

          if ($user) {
               if ($user->is_active == true) {
                    $credentials = [
                         'email' => $request['email'],
                         'password' => $request['password'],
                    ];
                    if (auth('web')->attempt($credentials, true)) {
                         Auth::guard('web')->login($user);
                         return [
                              "status" => true,
                              "message" => "User Authenticate",
                              "data" => [
                                   "route" => route('dashboard')
                              ],
                         ];
                    } else {
                         return [
                              "status" => false,
                              "message" => "Invalid Credentials",
                              "data" => [],
                         ];
                    }
               } else {
                    return [
                         "status" => false,
                         "message" => "Your Account is temporary disabled. Please contact with system administrator",
                         "data" => [],
                    ];
               }
          } else {
               return [
                    "status" => false,
                    "message" => "No user found with the given email address",
                    "data" => [],
               ];
          }
     }

     public function do_logout()
     {
          if (auth('web')->check()) {
               $user = auth('web')->user();
               Auth::guard('web')->logout($user);
          }

          return [
               "status" => true,
               "message" => "Logout successfull",
               "data" => [
                    "route" => route('login.page')
               ],
          ];
     }
}
