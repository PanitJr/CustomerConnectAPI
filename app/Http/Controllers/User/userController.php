<?php

namespace App\Http\Controllers\User;
use App\Object\profilewithpermission;
use Auth;
use App\apiResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\App;

class userController extends Controller
{
//   public function test(){
//       $user = User::where('email','=','panit')->first();
//
//
//       return response()->json($user->email);
//   }

    public function current()
    {
    	return apiResponse::success([
    		"user"=>Auth::user()
    	]);
    }

    public function object_all_user()
    {
        $objectAll['heads'] = ["Id","Firstname","Nickname","Email","Role","Supervisor name","Status"];
        $objectAll['total'] = \App\User::count();
        $objectAll['object'] = \App\User::all();

        // $objectAll = [["id"=>99,"name"=>"User","tablename"=>"users","fieldname"=>"usersname"]];
        return apiResponse::success($objectAll);
    }

    public function object_a_user(Request $request)
    {
         $record = $request->get("r");
        $objectAll['fieldname'] = ["Firstname","Lastname","Nickname","Email","Supervisor name","Role","Profile","Status"];
        $objectAll['fieldfill'] = ["firstname","lastname","nickname","email","supervisor_id","role_id","profile_id","status_id"];
        $objectAll['object'] = \App\User::where('id','=',$record)->first();

       // $objectAll['object'] = \App\User::all();
        // $objectAll = [["id"=>99,"name"=>"User","tablename"=>"users","fieldname"=>"usersname"]];
        return apiResponse::success($objectAll);
    }

    public function userNameList(Request $request){
        $record = $request->get("r");

        $objectAll['fieldname'] = ["Firstname","Lastname","Nickname","Email","Supervisor name","Role","Profile","Status"];
        $objectAll['fieldfill'] = ["firstname","lastname","nickname","email","supervisor_id","role_id","profile_id","status_id"];
        $objectAll['nameLists'] = \App\User::where('id','=',$record)->first();

        // $objectAll['object'] = \App\User::all();
        // $objectAll = [["id"=>99,"name"=>"User","tablename"=>"users","fieldname"=>"usersname"]];
        return apiResponse::success($objectAll);
    }

    public function editUserPage(Request $request){
        $record = $request->get("r");

        $objectAll['fieldname'] = ["Firstname","Lastname","Nickname","Email","Supervisor name","Role","Profile","Status"];
        $objectAll['fieldfill'] = ["firstname","lastname","nickname","email","supervisor_id","role_id","profile_id","status_id"];
        $objectAll['object'] = \App\User::where('id','=',$record)->first();

        // $objectAll['object'] = \App\User::all();
        // $objectAll = [["id"=>99,"name"=>"User","tablename"=>"users","fieldname"=>"usersname"]];
        return apiResponse::success($objectAll);
    }

    public function saveUser(Request $request){
        $record = (int)$request->route('record');

       if (empty($record)) {

            $requestData = $request->all();
            $email = $requestData['email'];
           $user = User::where('email', '=', $email)->first();
           if ($user) {
               $response = apiResponse::error("Email is already exist", "please finding at the user list page");
           } else {
                // newuser
                $userNew = new User;
                $userNew->firstname = $requestData['firstname'];
                $userNew->lastname = $requestData['lastname'];
                $userNew->nickname = $requestData['nickname'];
                $userNew->email = $requestData['email'];
                $userNew->supervisor_id = $requestData['supervisor_id'];
                $userNew->role_id = $requestData['role_id'];
                $userNew->profile_id = $requestData['profile_id'];
                $userNew->status_id = $requestData['status_id'];
                $userNew->save();
                $response = apiResponse::success($userNew);
           }

       }else{
              //  user
                $user = User::where('id','=',$record)->first();
                $requestData = $request->all();
//                $firstname =  $requestData['firstname'];
//                  $email = $requestData['email'];
                $user->firstname = $requestData['firstname'];
                $user->lastname =$requestData['lastname'];
                $user->nickname= $requestData['nickname'];
                $user->email= $requestData['email'];
                $user->supervisor_id= $requestData['supervisor_id'];
                $user->role_id= $requestData['role_id'];
                $user->profile_id= $requestData['profile_id'];
                $user->status_id= $requestData['status_id'];
                $user->save();

                $response = apiResponse::success($user);
            }

        return $response;
    }

    public function deleteUser(Request $request){
        $record = (int)$request->route('record');

        if ($record){
            $user = User::where('id', '=', $record)->first();
            $user->delete();

            if($user){
                $response = apiResponse::error("internal error", "internal error");
            }


                $response = apiResponse::success("delete success", "delete success");
        }else{
            $response = apiResponse::error("no record", "no record");
        }



        // $objectAll['object'] = \App\User::all();
        // $objectAll = [["id"=>99,"name"=>"User","tablename"=>"users","fieldname"=>"usersname"]];
        return apiResponse::success($response);
    }

    public function test(){

//        $user =Auth::user();
//        $id =$user->id;
        $user = User::where('id','=','7')->first();
        $pid= $user->profile_id;

        $p = profilewithpermission\profilewithpermission::where('id','=',$pid)->first();
        $pname =$p->setting;
        return $pname;
    }





}
