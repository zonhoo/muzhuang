<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 15/4/15
 * Time: 下午4:42
 */

namespace App\Repositories;


use App\Cover;

class CoverRepository {
    public function create(array $data)
    {
        return Cover::create([
            'name' => $data['name'],
            'cover_url' => $data['cover_url'],
            'disable' => $data['disable']
        ]);
    }
    public function update(array $data,$id)
    {
        $cover = Cover::find($id);

        $cover->name = $data['name'];
        $cover->cover_url = $data['cover_url'];
        $cover->display = $data['display'];
        $cover->save();
        return $cover;
    }
} 