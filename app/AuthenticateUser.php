<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 4/25/15
 * Time: 9:16 AM
 */

namespace App;


use App\Repositories\UserRepository;
use Illuminate\Contracts\Auth\Guard;
use Laravel\Socialite\Contracts\Factory as Socialite;

class AuthenticateUser {
    private $users;
    private $socialite;
    private $auth;

    public function __construct(UserRepository $userRepository,Socialite $socialize,Guard $auth)
    {
        $this->users = $userRepository;
        $this->socialite = $socialize;
        $this->auth = $auth;
    }

    public function execute($hasCode,$socialiteName,AuthenticateUserListener $listener)
    {
        if(!$hasCode) return $this->getAuthorizationFirst($socialiteName);
//        $socialiteUser = $this->getSocialiteUser($socialiteName);
//        $user = $this->findUserById($this->getId($socialiteName,$socialiteUser),$socialiteName);
//
//        if(!$user){
//            $user = $this->users->findByUsernameOrCreate($socialiteUser,$socialiteName);
//        }
        $user = $this->users->findByUsernameOrCreate($this->getSocialiteUser($socialiteName),$socialiteName);
        $this->auth->login($user);
        if ($this->auth->check())
        {
            return $listener->userHasLoggedIn($user);
        }

    }

    public function getAuthorizationFirst($socialiteName)
    {
        return $this->socialite->with($socialiteName)->redirect();
    }

    private function getSocialiteUser($socialiteName)
    {
        return $this->socialite->with($socialiteName)->user();
    }

    public function findUserById($id,$socialiteName){
        if($socialiteName=='weibo'){
            $where = 'weibo_id';
        }elseif($socialiteName=='weixin'){
            $where = 'weixin_id';
        }elseif($socialiteName=='github'){
            $where = 'name';
        }

         return User::where($where,'=',$id)->first();
    }

    public function getId($socialiteName,$user){

        if($socialiteName=='weibo'){
            return $user->id;
        }elseif($socialiteName=='weixin'){
            return $user->openid;
        }elseif($socialiteName=='github'){
            return $user->id;
        }
    }
} 