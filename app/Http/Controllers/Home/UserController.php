<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 15/3/27
 * Time: 下午2:32
 */

namespace App\Http\Controllers\Home;

use App\User;
use App\Http\Controllers\Home\BaseController;

class UserController extends BaseController{

    public function getProfile($id)
    {
        $user = User::findOrFail($id);
        return view('home.user.profile',compact('user'));
    }

    public function getShow($id)
    {

    }
}