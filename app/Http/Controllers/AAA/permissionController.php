<?php

namespace App\Http\Controllers\AAA;

use Auth;
use App\apiResponse;
use App\Object\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;

class permissionController extends Controller
{

    public function object_all_permission(){
        $objectAll = Permission\Permission::all();
        return apiResponse::success($objectAll);
    }

}
