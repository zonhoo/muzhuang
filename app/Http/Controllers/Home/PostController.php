<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 6/25/15
 * Time: 10:10 AM
 */

namespace App\Http\Controllers\Home;


use App\Post;

class PostController extends BaseController{

    public function show($id)
    {
        $post = Post::find($id);
        return $post->body;
    }
} 