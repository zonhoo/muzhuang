<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 15/4/16
 * Time: 下午3:03
 */

namespace App\Repositories;


use App\Version;
use Illuminate\Support\Facades\Auth;

class VersionRepository {
    public function create(array $data){
        return Version::create([
            'title' => $data['title'],
            'version_code' => $data['version_code'],
            'version_name' => $data['version_name'],
            'description' => $data['description'],
            'app_url' => $data['app_url'],
            'user_id' => Auth::id(),
        ]);
    }

    public function update(array $data,$id)
    {
        $version = Version::find($id);
        $version->title = $data['title'];
        $version->version_code = $data['version_code'];
        $version->version_name = $data['version_name'];
        $version->description = $data['description'];
        $version->app_url = $data['app_url'];
        $version->user_id = Auth::id();
        $version->save();
        return $version;
    }
} 