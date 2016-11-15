<?php

namespace App\Http\Controllers\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\apiResponse;
use App\User;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Auth\Passwords\TokenRepositoryInterface;

class loginController extends userController
{

    private $userModel;


    public function login(Request $request)
    {
		if(Auth::attempt([
			"email"=>$request->input("u"),
			"password"=>$request->input("p")
		],true))
		{
			$response = apiResponse::success([
					"token"=>Auth::user()->getRememberToken()
				]);

		}else {
			$response = apiResponse::error("LOGIN_FAIL","Login Fail");
		}
    	return $response;
    }

    public function loginGoogle(Request $request)
    {
        $userFname =$request->input("Fname");
        $userLname =$request->input("Lname");

        $auth = User::where('email', '=', $request->input("u"))->first();
        if($auth){

            if($auth->status_id!=1){
                $response = apiResponse::error("Inactive user"," Inactive user");
            }
            else{
                Auth::login($auth,true);

                if(!$auth->firstname){
                    $auth->firstname=$userFname;
                    $auth->lastname=$userLname;
                    $auth->save();
                }
                $response = apiResponse::success([
                    "token"=>Auth::user()->getRememberToken()
                ]);
            }

        }else {
            $response = apiResponse::error("LOGIN_FAIL","Login Fail");
        }
        return $response;
    }


}
