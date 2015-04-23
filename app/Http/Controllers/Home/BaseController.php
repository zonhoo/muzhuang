<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 15/3/27
 * Time: 下午2:34
 */

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

class BaseController extends Controller{

    public function __construct()
    {
        $this->middleware('auth');
    }
} 