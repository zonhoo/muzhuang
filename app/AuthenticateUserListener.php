<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 4/25/15
 * Time: 9:51 AM
 */

namespace App;


interface AuthenticateUserListener {

    /*
     * @param $user
     * @return mixed
     * */

    public function userHasLoggedIn($user);
} 