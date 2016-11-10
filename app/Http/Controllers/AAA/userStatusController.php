<?php

namespace App\Http\Controllers\AAA;

use Auth;
use App\apiResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;

class userStatusController extends Controller
{

    public function object_all_userstatus(){
        $objectAll['object'] = \App\Object\UserStatus\UserStatus::all();
        return apiResponse::success($objectAll);
    }

}
