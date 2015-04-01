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
} 