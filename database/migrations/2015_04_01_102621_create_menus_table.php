<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
class CreateMenusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('menus', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('name')->index();
            $table->string('route_name')->index();
            $table->string('icon');
            $table->integer('fid');
			$table->timestamps();
		});

        $this->initializeMenus();
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('menus');
	}


    /*
     * Initialize the sidebar menus
     *
     * */
    public function initializeMenus()
    {
        DB::table('menus')->truncate();// clear menus table
        $menus = array(
            array('name'=>'setting_system','route_name'=>'','icon'=>'linecons-cog','fid'=>'0'),
            array('name'=>'setting_ucenter','route_name'=>'','icon'=>'linecons-user','fid'=>'0'),
            array('name'=>'setting_content','route_name'=>'','icon'=>'linecons-doc','fid'=>'0'),
            array('name'=>'setting_message','route_name'=>'','icon'=>'linecons-mail','fid'=>'0'),
            array('name'=>'setting_stats','route_name'=>'','icon'=>'linecons-database','fid'=>'0'),
            array('name'=>'setting_operation','route_name'=>'','icon'=>'linecons-globe','fid'=>'0'),

            //setting system
            array('name'=>'setting_system_base','route_name'=>'','icon'=>'','fid'=>'1'),
            array('name'=>'setting_system_api','route_name'=>'','icon'=>'','fid'=>'1'),
            array('name'=>'setting_system_version','route_name'=>'admin.version','icon'=>'','fid'=>'1'),
            array('name'=>'setting_system_bootstrap','route_name'=>'admin.cover','icon'=>'','fid'=>'1'),

            //manage ucenter
            array('name'=>'setting_ucenter_users','route_name'=>'admin.user','icon'=>'','fid'=>'2'),
            array('name'=>'setting_ucenter_roles','route_name'=>'admin.role','icon'=>'','fid'=>'2'),
            array('name'=>'setting_ucenter_permission','route_name'=>'admin.permission','icon'=>'','fid'=>'2'),
            array('name'=>'setting_ucenter_virtual_user','route_name'=>'','icon'=>'','fid'=>'2'),
            array('name'=>'setting_ucenter_follows','route_name'=>'','icon'=>'','fid'=>'2'),

            //manage content
            array('name'=>'setting_content_feeds','route_name'=>'','icon'=>'','fid'=>'3'),
            array('name'=>'setting_content_posts','route_name'=>'admin.post','icon'=>'','fid'=>'3'),
            array('name'=>'setting_content_keywords','route_name'=>'admin.keyword','icon'=>'','fid'=>'3'),
            array('name'=>'setting_message_check','route_name'=>'','icon'=>'','fid'=>'3'),

            //消息通知
            array('name'=>'setting_message_notifications','route_name'=>'','icon'=>'','fid'=>'4'),
            array('name'=>'setting_message_push','route_name'=>'','icon'=>'','fid'=>'4'),
            array('name'=>'setting_message_day','route_name'=>'','icon'=>'','fid'=>'4'),

            //virtual
            array('name'=>'setting_operation_virtual','route_name'=>'','icon'=>'','fid'=>'6'),
        );

        DB::table('menus')->insert($menus);
    }
}
