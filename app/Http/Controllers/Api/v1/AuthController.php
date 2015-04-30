<?php namespace App\Http\Controllers\Api\V1;
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 15/4/13
 * Time: 上午10:14
 */

use App\AuthenticateUser;
use App\AuthenticateUserListener;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class AuthController extends Controller implements AuthenticateUserListener{


    public function login($socialiteName,AuthenticateUser $authenticateUser,Request $request){

        $hasCode = $request->has('code');

        return $authenticateUser->execute($hasCode,$socialiteName,$this);
    }

    public function userHasLoggedIn($user)
    {
        return response()->json(['msg'=>'has logged in','status'=>'10002','err_code'=>'0']);
    }

    public function logout()
    {
        Auth::logout();
        $result = ['msg'=>'has logged out','status'=>'10003','err_code'=>'0'];
        return response()->json($result);
    }
}