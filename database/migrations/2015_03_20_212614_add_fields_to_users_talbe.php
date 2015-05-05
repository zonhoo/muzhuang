<?php
/*
 * 添加字段到users表
 */

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToUsersTalbe extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table)
		{
			//
          $table->string('nickname')->nullable()->index();
          $table->string('telephone')->nullable()->index();
          $table->string('true_name')->nullable();
          $table->string('avatar')->nullable();
          $table->text('signature')->nullable();
          $table->tinyInteger('sex')->default(0);
          $table->integer('follower_count')->default(0)->index();
          $table->integer('following_count')->default(0)->index();
          $table->integer('publish_count')->default(0)->index();
          $table->integer('like_count')->default(0)->index();
          $table->boolean('is_banned')->default(false);
          $table->softDeletes();
          
          $table->index('email');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table)
		{
			//
            $table->dropColumn(array('telephone', 'true_name', 'avatar','signature','sex','follower_count','following_count','publish_count','like_count','is_banned','deleted_at'));
		});
	}

}
