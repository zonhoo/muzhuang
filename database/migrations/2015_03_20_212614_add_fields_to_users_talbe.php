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
          $table->string('telephone')->nullable()->index();
          $table->string('true_name')->nullable();
          $table->string('photo_url')->nullable();
          $table->text('signature')->nullable();
          $table->tinyInteger('sex')->default(0);
          $table->integer('follow_count')->default(0)->index();
          $table->integer('like_count')->default(0)->index();;
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
            $table->dropColumn(array('telephone', 'true_name', 'photo_url','signature','sex','follow_count','like_count','is_banned','deleted_at'));
		});
	}

}
