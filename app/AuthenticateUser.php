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
} 