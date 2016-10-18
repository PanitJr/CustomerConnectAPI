<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use App\User;
use App\apiResponse;
class VerifyApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = $request->get('token');
        if(!empty($token))
        {
            $user = User::where("remember_token",$token)->first();
            if($user)
            {
                Auth::login($user);
                return $next($request);    
            }
            else{
                return apiResponse::error("INVALID_AUTH_TOKEN","token invalid or expired");
            }    
        }else{
            return apiResponse::error("TOKEN_EMPTY","Please send token");
        }
    }
}
