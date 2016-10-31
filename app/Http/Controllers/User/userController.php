<?php

namespace App\Http\Controllers\User;

use Auth;
use App\apiResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;

class userController extends Controller
{
    public function current()
    {
    	return apiResponse::success([
    		"user"=>Auth::user()
    	]);
    }

    public function object_all_user(){
        $objectAll['heads'] = ["Id","Name","Nickname","Email","Role","Supervisor","Status"];
        $objectAll['total'] = \App\User::count();
        $objectAll['object'] = \App\User::all();


        // $objectAll = [["id"=>99,"name"=>"User","tablename"=>"users","fieldname"=>"usersname"]];
        return apiResponse::success($objectAll);
    }




}
