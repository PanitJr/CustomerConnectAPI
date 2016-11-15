<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use App\User;
use App\apiResponse;
use App\Object\profilewithpermission;

class VerifyProfilePermission
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

        $objectname = $request->route('objectName');
        $user = Auth::user();
        $pid = $user->profile_id;
        $p = profilewithpermission\profilewithpermission::where('id', '=', $pid)->first();

    if($objectname=='Expense'|| $objectname=='Item' || $objectname=='Leave') {

    if ($user) {
        $itempermission = $p->item;
        $expensepermission = $p->expense;
        $leavepermission = $p->leave;

        if ($itempermission == 'true' && $objectname == 'Item') {
            return $next($request);
        } elseif ($expensepermission == 'true' && $objectname == 'Expense') {
            return $next($request);
        } elseif ($leavepermission == 'true' && $objectname == 'Leave') {
            return $next($request);
        } else {
            return apiResponse::error("no permission", "no permission");
        }
    } else {
        return apiResponse::error("no user", "no user");
    }
}

elseif($objectname == 'user'){
    $userpermission = $p->user;
    if ($userpermission == 'true' && $objectname == 'user') {
        return $next($request);
    } else {
        return apiResponse::error("no permission", "no permission");
    }
}
elseif($objectname == 'profilewithpermission'){
    $userpermission = $p->user;
    if ($userpermission == 'true' && $objectname == 'profilewithpermission') {
        return $next($request);
    } else {
        return apiResponse::error("no permission", "no permission");
    }

}


       // return apiResponse::success($objectname);




       // return apiResponse::success($objectname);
    }
}
