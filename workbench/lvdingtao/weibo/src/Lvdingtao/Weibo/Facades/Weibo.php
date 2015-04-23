<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 15/4/13
 * Time: 下午5:06
 */

namespace Lvdingtao\Weibo\Facades;


use Illuminate\Support\Facades\Facade;

class Weibo extends Facade{
    /**
     * 取得组件的注册名称
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'weibo'; }

} 