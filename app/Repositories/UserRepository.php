<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 15/3/27
 * Time: 上午10:21
 */

namespace App\Repositories;
use App\User;
use Illuminate\Support\Facades\Hash;
class UserRepository {

    public function create(array $data)
    {
        return User::Create([
            'name' => $data['name'],
            'password' => Hash::make($data['password']),
            'email' => $data['email'],
            'signature' => $data['signature'],
            'telephone' => $data['telephone'],
            'sex' => $data['sex'],
            'is_banned' => $data['is_banned'],
        ]);
    }

    public function update(array $data)
    {
        $user = User::find($data['id']);
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->signature = $data['signature'];
        $user->telephone = $data['telephone'];
        $user->sex = $data['sex'];
        $user->is_banned = $data['is_banned'];
        $user->save();
        return $user;
    }

    public function findByUsernameOrCreate($userData,$socialiteName)
    {
        if($socialiteName=='weibo'){
            $user = User::where('weibo_id','=',$userData->id)->first();
            if(!$user)
            {
                if($userData->user['gender'] =='m'){
                    $sex = 1;
                }elseif($userData->user['gender'] =='f'){
                    $sex = 2;
                }else{
                    $sex = 0;
                }
                return User::Create([
                    'nickname' => $userData->nickname,
                    'avatar' => $userData->avatar,
                    'weibo_id'=> $userData->id,
                    'signature'=> $userData->user['description'],
                    'email' => $userData->email,
                    'sex' => $sex,
                ]);
            }
            return $user;

        }elseif($socialiteName=='weixin'){
            $user = User::where('weixin_id','=',$userData->openid)->first();
            if(!$user){
                $user = User::Create([
                    'nickname' => $userData->nickname,
                    'avatar' => $userData->headimgurl,
                    'weixin_id'=>$userData->openid,
                    'sex' => $userData->sex
                ]);

                if($userData->country=='CN'){
                    $country = '中国';
                }else{
                    $country = '其他';
                }
                $location = $user->location();
                $location->create([
                    'country' => $country,
                    'province' => $userData->province,
                    'city'=> $userData->city
                ]);
            }
            return $user;
        }
    }

    public function findByNicknameOrCreate($userData)
    {
        $user = User::firstOrCreate([
            'nickname' => $userData->input('nickname'),
            'avatar' => $userData->input('avatar'),
            'weibo_id'=> $userData->input('weibo_id'),
            'weixin_id'=> $userData->input('weixin_id'),
            'signature'=> $userData->input('signature'),
            'email'=> $userData->input('email'),
            'sex' => $userData->input('sex'),
        ]);

        $location = $user->location();
        $location->firstOrCreate([
            'country' => $userData->input('country'),
            'province' => $userData->input('province'),
            'city'=> $userData->input('city')
        ]);
        return $user;
    }
}