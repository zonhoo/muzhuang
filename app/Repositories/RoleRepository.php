<?php namespace App\Repositories;
    use App\Role;
    class RoleRepository{
        
        public function create(array $data)
        {            
            return Role::Create([
              'name' => $data['name'],
              'display_name' => $data['display_name'],
              'description' => $data['description']
            ]);
        }
        public function update(array $data)
        {
            $role = Role::find($data['id']);
            $role->name = $data['name'];
            $role->display_name = $data['display_name'];
            $role->description = $data['description'];
            $role->save();
            return $role;
        }
    }