<?php

namespace App\Http\Controllers\AAA;

use Auth;
use App\apiResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;

class roleController extends Controller
{

    public function object_all_role(){
        $objectAll['object'] = \App\Role::all();
        return apiResponse::success($objectAll);
    }

}
