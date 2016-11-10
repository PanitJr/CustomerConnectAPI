<?php

namespace App\Http\Controllers\AAA;

use Auth;
use App\apiResponse;
use App\Object\ProfilePermission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;

class permissionController extends Controller
{

    public function object_all_ProfilePermission(){
        $objectAll = ProfilePermission\ProfilePermission::all();
        return apiResponse::success($objectAll);
    }

    public function saveProfilePermission(Request $request){

        $profileID =$request->input("pid");
        $permissionList = $request->input("list");

        $permissionList=$permissionList->all();
        $permissionList->count();

        if($profileID){

            $ProfilePermission = new ProfilePermission;

            foreach ($permissionList as $permission){
                $ProfilePermission->profile_id=  $profileID;
                $ProfilePermission->permission_id =  $permissionList['id'];
                $ProfilePermission->permissionstatus = $permissionList['holdingstatus'];
            }
            $ProfilePermission->save();
            $profilePermission = apiResponse::success ("save profile permission", $ProfilePermission);

        }else{


            $profilePermission = apiResponse::error("profile error"," please input the profile information");

        }





        return $profilePermission;
    }

}
