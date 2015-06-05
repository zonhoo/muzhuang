<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 6/5/15
 * Time: 11:46 AM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model{

    protected $guarded = array('id');

    public function user()
    {
        return $this->belongsTo('App\User');
    }
} 