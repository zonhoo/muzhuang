<?php namespace App\Http\Controllers\Api\Verone;

use App\Cover;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CoverController extends Controller {



	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getLastCover()
	{
		//
        $cover = Cover::orderBy('created_at','desc')->first();
        return response()->json($cover);

	}


}
