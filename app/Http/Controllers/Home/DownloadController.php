<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 7/2/15
 * Time: 1:47 PM
 */

namespace App\Http\Controllers\Home;


use App\Version;

class DownloadController extends BaseController{

    public function index()
    {
        $last = Version::find(3);
        return view('home.download.index',compact('last'));
    }

    public function downloadFile()
    {
        $last = Version::orderBy('updated_at','desc')->firstOrFail();
        return response()->download($last->app_url);
    }
}