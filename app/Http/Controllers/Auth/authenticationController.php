<?php
/**
 * Created by IntelliJ IDEA.
 * User: Judyza
 * Date: 10/29/16
 * Time: 1:05 PM
 */

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use DB;
use Illuminate\Http\Request;
// use Tymon\JWTAuth\Facades\JWTAuth;
use Log;

class authenticationController  extends Controller
{
    private $userModel;
    private $userRole;

    public function __construct() {

        // Apply the jwt.auth middleware to all methods in this controller
        // except for the authenticate method. We don't want to prevent
        // the user from retrieving their token if they don't already have it

        $this->middleware('jwt.auth', ['except' => ['authenticate']]);

    }

    public function authenticate(Request $request) {

        //get access code for google open id
        $url = 'https://www.googleapis.com/oauth2/v3/token';

        // $data = array('code' => $request->code, 'client_id' => '121236538621-rt7e8cgk9v4r5ptkrrvsmauu0o37sorp.apps.googleusercontent.com', 'client_secret' => '-7b4_T96QlgqGE48rc9ib3QM', 'redirect_uri' => 'http://localhost:8888', 'grant_type' => 'authorization_code');

        $data = array('code' => $request->code, 'client_id' => '316967852944-dbqtiuetnhv8u30anjfgnmijkodjmvak.apps.googleusercontent.com', 'client_secret' => 'o6wZfIWGLpXsh6OnV_tGHP33', 'redirect_uri' => 'http://localhost:3000', 'grant_type' => 'authorization_code');

        // use key 'http' even if you send the request to https://...
        //post to get access token
        $options = array('http' => array('header' => "Content-type: application/x-www-form-urlencoded\r\n", 'method' => 'POST', 'content' => http_build_query($data)));
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        $token = json_decode($result);

        //get json user's information from google by access token
        $userInfo = file_get_contents('https://www.googleapis.com/oauth2/v1/userinfo?access_token=' . $token->access_token);

        //decode json to array
        $user = json_decode($userInfo);

        //Log::info($userInfo);

        //check @crm-c.club or crmc.consulting
        $emailDomain = explode('@', $user->email);

        //Log::info($emailDomain[1]);

        if ($emailDomain[1] != 'crm-c.club' && $emailDomain[1] != 'crmc.consulting') {

            return response()->json(array('error' => 'Email is not accepted'), 403);
        }

        if (!User::where('email', '=', $user->email)->exists()) {
            // user not found
            //$this->userModel = User::create(['name' => $user->name, 'email' => $user->email, 'roleID' => 4]);
            return response()->json(array('error' => 'Email is not accepted'), 403);

        } else {
            $this->userModel = User::where('email', '=', $user->email)->firstOrFail();
        }

        if ($this->userModel->roleID != null) {
            //$this->userRole = Role::with('permission')->find($this->userModel->roleID);
            $this->userRole = Role::find($this->userModel->roleID);
            //$supervisor = DB::table('users')->where('id', $this->userModel->supervisorID)->first();
            //$approvelist = DB::table('users')->where('supervisorID', $this->userModel->id)->get();

        } else {
            $this->userRole = Role::find(4);
        }

        $this->userModel->picture = $user->picture;
        $this->userModel->save();
        //$token = JWTAuth::fromUser($this->userModel, array('user' => $this->userModel, 'role' => $this->userRole, 'supervisor' => $supervisor, 'approvelist' => $approvelist));
        $token = JWTAuth::fromUser($this->userModel, array('user' => $this->userModel, 'role' => $this->userRole));

        //Log::info($token);

        // if no errors are encountered we can return a JWT
        return response()->json(compact('token'));
    }

}