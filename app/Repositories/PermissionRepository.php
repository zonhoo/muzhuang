<?php namespace App\Repositories;
use App\Permission;
class PermissionRepository{

    public function create(array $data)
    {
        
        return Permission::Create([
            'name' => $data['name'],
            'display_name' => $data['display_name'],
            'description' => $data['description']
        ]);
    }
    public function update(array $data)
    {
        $permission = Permission::find($data['id']);
        $permission->name = $data['name'];
        $permission->display_name = $data['display_name'];
        $permission->description = $data['description'];
        $permission->save();
        return $permission;
    }
}