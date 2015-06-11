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
            if($userData->gender =='m'){
                $sex = 1;
            }elseif($userData->gender =='f'){
                $sex = 2;
            }else{
                $sex = 0;
            }
            return User::firstOrCreate([
                'nickname' => $userData->nickname,
                'avatar' => $userData->avatar,
                'weibo_id'=> $userData->id,
                'signature'=> $userData->user['description'],
                'email' => $userData->email,
                'sex' => $sex,
            ]);
        }elseif($socialiteName=='weixin'){

            $user = User::firstOrCreate([
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
            return $user;
        }elseif($socialiteName='github'){
            return User::firstOrCreate([
                'name'=>$userData->id,
                'nickname'=>$userData->nickname,
                'avatar'=>$userData->avatar
            ]);
        }
    }
} 