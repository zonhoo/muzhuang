<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 15/3/30
 * Time: 下午4:10
 */

namespace App\Repositories;

use App\Post;
use Illuminate\Support\Facades\Auth;

class PostRepository {

    public function create(array $data)
    {
        return Post::create([
            'user_id' => Auth::id(),
            'title' => $data['title'],
            'subtitle' => $data['subtitle'],
            'description' => $data['description'],
            'is_checked' => 0,
            'is_locked' => 0,
            'photo' => $data['photo'],
            'body' => $data['body']
        ]);
    }

    public function update(array $data,$id)
    {
        $post = Post::find($id);
        $post->user_id = Auth::id();
        $post->title = $data['title'];
        $post->subtitle = $data['subtitle'];
        $post->description = $data['description'];
        $post->photo = $data['photo'];
        $post->body = $data['body'];
        $post->save();
        return $post;
    }
} 