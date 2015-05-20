<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;//软删除

class Post extends Model {

	//
    use SoftDeletes;
    protected $guarded = array('id');

    protected $dates = ['deleted_at'];
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function likes()
    {
        return $this->belongsToMany('App\User','like_user','post_id','user_id');
    }

    //修改器
    public function getSubtitleAttribute($value)
    {
        return ucfirst($value);
    }

    public function setSubtitleAttribute($value)
    {

        $this->attributes['subtitle'] = $value==null?'':$value;
    }
}
