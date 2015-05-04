<?php namespace App\Http\Controllers\Admin;
    
    use Illuminate\Html;
    use App\User;
    use App\Role;
    use Illuminate\Http\Request;
    use App\Http\Requests\StoreUserProfileRequest;
    use App\Http\Requests\UpdateUserProfileRequest;
    use App\Repositories\UserRepository;
    use Illuminate\Support\Facades\Route;
    use Laracasts\Flash\Flash;
    class UserController extends BaseController{
        protected $user;
        
        public function __construct(UserRepository $user)
        {
            parent::__construct();
            $this->user = $user;
        }

        public function index()
        {
            //echo $can = Route::currentRouteName();
            $users = User::paginate(15);
            return view('admin.user.index',compact('users'));
        }

        public function create()
        {
            return view('admin.user.create');
        }

        public function store(StoreUserProfileRequest $request)
        {
            $user = $this->user->create($request->all());

            if($user->id) {
                flash()->success('发布成功');
            }else{
                flash()->error('发布失败');
            }
            return redirect()->back();
        }

        public function update(UpdateUserProfileRequest $request)
        {
            $user = $this->user->update($request->all());
            if($user->id) {
                flash()->success('更新成功');
            }else{
                flash()->error('更新失败');
            }
            return redirect()->back();

        }

        public function edit($id)
        {
            $user = User::findOrFail($id);
            return view('admin.user.edit',compact('user'));
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
