<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustPermission;
class Permission extends EntrustPermission {

	//
    protected $fillable = array('name','display_name','description');

}
