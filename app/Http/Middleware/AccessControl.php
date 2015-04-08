<?php namespace App\Http\Middleware;

use Closure;
use App\Role;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Route;
class AccessControl {
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;
    
    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        if($user = $request->user())
        {
            //判断是不是管理员
            $userRoles = Role::all();
            foreach($userRoles as $r){
                $roles[] = $r->name;
            }
            if(!$user->hasRole($roles)) redirect()->guest('auth/login');
            //创始人拥有所有权限
            if(!$user->hasRole('Founder')){
                $can = Route::currentRouteName();//当前routeName  exp:user.test

                $res = $request->user()->can($can);
                if(!$res) return view('admin.noaccess');
            }
        }else{
            return redirect()->guest('auth/login');
        }
        return $next($request);
	}

}
