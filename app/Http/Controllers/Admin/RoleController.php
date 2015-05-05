<?php namespace App\Http\Controllers\Admin;
    
    use Illuminate\Html;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;
    use App\Http\Requests\StoreRoleRequest;
    use App\Repositories\RoleRepository;
    use App\Role;
    use App\Permission;
    use Laracasts\Flash\Flash;
    class RoleController extends BaseController{
        
        protected $role;
        
        public function __construct(RoleRepository $role)
        {
            parent::__construct();
            $this->role = $role;
        }
        
        public function index()
        {
            $roles = Role::all();
            return view('admin.role.index',compact('roles'));
        }
        
        public function create()
        {
            return view('admin.role.create');
        }
        
        public function edit($id)
        {
            $role = Role::findOrFail($id);
            return view('admin.role.edit',compact('role'));
        }
        
        public function store(StoreRoleRequest $request)
        {
            $role = $this->role->create($request->all());

            if($role->id) {
                flash()->success('发布成功');
            }else{
                flash()->error('发布失败');
            }
            return redirect()->back();

        }
        
        public function update(UpdateRoleRequest $request)
        {
            $role = $this->role->update($request->all());
            if($role->id) {
                flash()->success('发布成功');
            }else{
                flash()->error('发布失败');
            }
            
            return redirect()->route('admin.role.edit', $request->all()['id']);
        }
        
        public function destroy($id)
        {
            $user = Role::delete($id);
            $user->delete();
            foreach($user->roles() as $u){
                $user->roles()->detach($u->id);
            }
        }
        
        public function can($id)
        {
            $role = Role::find($id);
            //所有权限
            $all_permissions = Permission::all();
            //管理员所拥有的权限
            $permissions = $role->permissions()->get();
            foreach($all_permissions as $k=>$p){
                foreach($permissions as $per){
                    if($p->id===$per->id){
                        $all_permissions[$k]['can'] = 1;
                    }
                }
            }
            //dd($permissions);
            return view('admin.role.can',compact('role','all_permissions'));
        }
        
        public function updateCan(Request $request)
        {            
            $request = $request->all();
            $role = Role::find($request['role_id']);
            //dd($role->permissions);
            
            foreach($role->permissions as $p){
                $detach[]=$p->id;
                //var_dump($p->id);
            }
            $role->permissions()->detach($detach);
            $role->permissions()->attach($request['id']);
            return redirect()->route('role.can', $request['role_id']);
            
        }
        
    }