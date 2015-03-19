<?php namespace App\Http\Controllers\Admin;
    
    use Illuminate\Html;
    use App\User;
    use App\Role;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;
    class UserController extends BaseController{
        
        public function index()
        {
            //echo $can = Route::currentRouteName();
            $users = User::paginate(15);
            return view('admin.user.index',compact('users'));
        }
        
        public function edit($id)
        {
            return view('admin.user.edit');
        }
        
        public function test(Request $request)
        {
//            $user = User::find(1);
//            
//            if($user->hasRole('Founder')){
//                return '您是创始人'.'ID:'.$user->id;
//            };
            
            if($request->user())
            {
//                $userRoles = $request->user()->roles()->get();
//                foreach($userRoles as $r){
//                    $roles[] = $r->name;
//                }
//                var_dump($roles);
                $userRoles = Role::all();
                foreach($userRoles as $r){
                    $roles[] = $r->name;
                }
                if(!$request->user()->hasRole($roles)) return redirect()->guest('auth/login');
                //$can = Route::currentRouteName();//当前route-name  exp:user.test
                $can = Route::currentRouteAction();
                echo $can;
                $res = $request->user()->can($can);
                echo $res;
            }
        }
        
        public function profile($id)
        {
            $user = User::find($id);
            //获取用户角色
            $role = $user->roles()->first()->display_name;
            return view('admin.user.profile',compact('user','role'));
        }
        
    }
