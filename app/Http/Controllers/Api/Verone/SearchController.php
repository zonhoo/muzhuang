<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 5/22/15
 * Time: 9:56 AM
 */

namespace App\Http\Controllers\Api\Verone;


use App\Post;

class SearchController extends BaseController{

    public function search($keyword){

        return Post::whereRaw("title like '%$keyword%' or body like '%$keyword%'")->paginate(15);
    }
} 