<?php

namespace App\Http\Controllers\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\apiResponse;
use App\User;

class loginController extends userController
{
    public function login(Request $request)
    {
		if(Auth::attempt([
			"email"=>$request->input("u"),	
			"password"=>$request->input("p"),	
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
		$auth = User::where('email', '=', $request->input("u"))->first();
		if($auth){
			Auth::login($auth,true);
			$response = apiResponse::success([
				"token"=>Auth::user()->getRememberToken()
			]);
		}else {
			$response = apiResponse::error("LOGIN_FAIL","Login Fail");
		}
		return $response;
	}


}
