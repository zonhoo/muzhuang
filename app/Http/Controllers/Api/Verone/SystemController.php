<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 4/23/15
 * Time: 9:49 AM
 */

namespace App\Http\Controllers\Api\Verone;


class SystemController extends BaseController{

    public function versionCode()
    {
        $version_code = [
            'version' => '1.0.0.1',
            'support' => 'Android IOS'
        ];
        return response()->json($version_code);
    }
}