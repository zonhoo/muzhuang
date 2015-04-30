<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Database\Eloquent\SoftDeletes;//软删除
class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;
    use EntrustUserTrait;
    use SoftDeletes;
    
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	//protected $fillable = ['name', 'email', 'password',''];
    protected $guarded = array('id');
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];
    
    protected $dates = ['deleted_at'];
    
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function follows()
    {
        return $this->hasMany('App\Follow');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    public function likes()
    {
        return $this->belongsToMany('App\Post','like_user','user_id','post_id');
    }

}
