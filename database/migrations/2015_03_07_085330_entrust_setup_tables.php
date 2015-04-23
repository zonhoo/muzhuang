<?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use App\User;
    use App\Role;
    use App\Permission;
    class EntrustSetupTables extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return  void
         */
        public function up()
        {
            // Create table for storing roles
            Schema::create('roles', function (Blueprint $table) {
                           $table->increments('id');
                           $table->string('name')->unique();
                           $table->string('display_name')->nullable();
                           $table->string('description')->nullable();
                           $table->timestamps();
                           });
            
            // Create table for associating roles to users (Many-to-Many)
            Schema::create('role_user', function (Blueprint $table) {
                           $table->integer('user_id')->unsigned();
                           $table->integer('role_id')->unsigned();
                           
                           $table->foreign('user_id')->references('id')->on('users')
                           ->onUpdate('cascade')->onDelete('cascade');
                           $table->foreign('role_id')->references('id')->on('roles')
                           ->onUpdate('cascade')->onDelete('cascade');
                           
                           $table->primary(['user_id', 'role_id']);
                           });
            
            // Create table for storing permissions
            Schema::create('permissions', function (Blueprint $table) {
                           $table->increments('id');
                           $table->string('name')->unique();
                           $table->string('display_name')->nullable();
                           $table->string('description')->nullable();
                           $table->timestamps();
                           });
            
            // Create table for associating permissions to roles (Many-to-Many)
            Schema::create('permission_role', function (Blueprint $table) {
                           $table->integer('permission_id')->unsigned();
                           $table->integer('role_id')->unsigned();
                           
                           $table->foreign('permission_id')->references('id')->on('permissions')
                           ->onUpdate('cascade')->onDelete('cascade');
                           $table->foreign('role_id')->references('id')->on('roles')
                           ->onUpdate('cascade')->onDelete('cascade');
                           
                           $table->primary(['permission_id', 'role_id']);
                           });
            
            $this->setupFounderAndBaseRolesPermission();
        }
        
        /**
         * Reverse the migrations.
         *
         * @return  void
         */
        public function down()
        {
            Schema::table('role_user', function (Blueprint $table) {
                          $table->dropForeign('role_user_user_id_foreign');
                          $table->dropForeign('role_user_role_id_foreign');
                          });
            
            Schema::table('permission_role', function (Blueprint $table) {
                          $table->dropForeign('permission_role_permission_id_foreign');
                          $table->dropForeign('permission_role_role_id_foreign');
                          });
            
            Schema::drop('permission_role');
            Schema::drop('permissions');
            Schema::drop('role_user');
            Schema::drop('roles');
        }
        
        /**
         *  Initialize the user group
         *
         */
        public function setupFounderAndBaseRolesPermission()
        {
            //Create Roles
            $founder = new Role;
            $founder->name = 'Founder';
            $founder->save();
            
            $admin = new Role;
            $admin->name = 'Admin';
            $admin->save();
            
            //Create User
            $user = new User;
            $user->name = 'muzhuang';
            $user->email = 'admin@admin.com';
            $user->password = Hash::make('secret');
            
            if(! $user->save()){
                Log::info('Unabel to create user '.$user->username,(array)$user->errors());
            }else{
                Log::info('Create user "'.$user->username.'" <'.$user->email.'>');
            }
            
            //Attach Roles to user
            $user->roles()->attach($founder->id);
            
            //Create Permissions
            $manageUsers = new Permission;
            $manageUsers->name = 'admin.user';
            $manageUsers->display_name = 'Manage Users';
            $manageUsers->save();
            
            // Assign Permission to Role
            $founder->perms()->sync([$manageUsers->id]);
            $admin->perms()->sync([$manageUsers->id]);
        }
    }
