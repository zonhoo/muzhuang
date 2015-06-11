<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 5/22/15
 * Time: 9:56 AM
 */

namespace App\Http\Controllers\Api\Verone;


use App\Post;
use Illuminate\Http\Request;

class SearchController extends BaseController{

    public function search(Request $request){

        $keyword = $request->input('keyword');
        return Post::with('user','likes')->whereRaw("title like '%$keyword%' or body like '%$keyword%'")->paginate(10);
    }
} 