<?php namespace App\Http\Controllers\Api;
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 15/4/13
 * Time: 上午10:14
 */

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Lvdingtao\Weibo\Facades\Weibo;


class AuthController extends Controller{

    protected $weibo;

    public function __construct(){
        //$this->weibo = new WeiboOAuth(config('services.weibo.client_id'), config('services.weibo.client_secret'));
    }

    public function getLogin(Request $request){

        //重定向到授权服务器
        if($request->has('code')){
            $keys = array();
            $keys['code'] = $request->input('code');
            $keys['redirect_uri'] = config('services.weibo.redirect');
            //获取token
            $token = Weibo::getAccessToken('code',$keys);

            if($token){

                //用户数据写入数据库
                //从数据库查找用户数据
                //登录操作
                //code ..

                //登录跳转
                //return redirect('');
            }
        }
        $redirect_url = Weibo::getAuthorizeURL(config('services.weibo.redirect'));
        return redirect($redirect_url);
    }
} 