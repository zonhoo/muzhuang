<?php namespace App\Http\Controllers\Admin;
    
use Illuminate\Html;
use App\Permission;
use App\Http\Requests\UpdatePermissionRequest;
use App\Repositories\PermissionRepository;
use Laracasts\Flash\Flash;
    class PermissionController extends BaseController{
        
        protected $permission;
        
        public function __construct(PermissionRepository $permission)
        {
            parent::__construct();
            $this->permission = $permission;
        }
        
        public function index()
        {
            $permissions = Permission::paginate(15);
            return view('admin.permission.index',compact('permissions'));
        }
        
        public function create()
        {
            return view('admin.permission.create');
        }
        
        public function store(StorePermissionPostRequest $request)
        {
            $permission = $this->permission->create($request->all());

            if($permission->id) {
                flash()->success('添加成功');
            }else{
                flash()->error('添加失败');
            }
            return redirect()->back();
        }
        
        public function edit($id)
        {
            $permission = Permission::findOrFail($id);
            return view('admin.permission.edit',compact('permission'));
        }
        
        public function update(UpdatePermissionRequest $request)
        {
            $permission = $this->permission->update($request->all());
            if($permission->id) {
                flash()->success('更新成功');
            }else{
                flash()->error('更新失败');
            }
            return redirect()->back();

        }
        
        public function destroy($id)
        {
            
        }
    }