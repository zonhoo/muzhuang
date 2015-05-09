<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 15/4/16
 * Time: 上午10:21
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feedback extends Model{
    use SoftDeletes;

    protected $data = ['delete_at'];

    protected $guarded = array('id');

} 