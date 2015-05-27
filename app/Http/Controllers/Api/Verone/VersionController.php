<?php namespace App\Http\Controllers\Api\Verone;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Version;
use Illuminate\Http\Request;

class VersionController extends Controller {

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getLastVersion()
	{
		//获取最新版本信息
         $version = Version::orderBy('created_at')->first();
        return response()->json($version);
	}

}
