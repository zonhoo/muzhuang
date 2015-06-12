<?php namespace App\Http\Controllers\Api\Verone;
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 15/4/13
 * Time: 上午10:14
 */

use App\AuthenticateUser;
use App\AuthenticateUserListener;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller implements AuthenticateUserListener{


    public function login($socialiteName,AuthenticateUser $authenticateUser,Request $request){

        $hasCode = $request->has('code');

        return $authenticateUser->execute($hasCode,$socialiteName,$this);
    }

    public function userHasLoggedIn($user)
    {
        $user = Auth::user();
        return response()->json(['msg'=>'has logged in','status'=>'10002','err_code'=>'0','user'=>$user]);
    }

    public function logout()
    {
        Auth::logout();
        $result = ['msg'=>'has logged out','status'=>'10003','err_code'=>'0'];
        return response()->json($result);
    }


    public function appLogin(AuthenticateUser $authenticateUser,Request $request)
    {
        return $authenticateUser->appExecute($request);
    }
}