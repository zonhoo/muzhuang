<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('user_id');
            $table->integer('node_id');
            $table->string('photo');
            $table->string('title')->index();
            $table->string('subtitle')->index();
            $table->text('description');
            $table->text('body');
            $table->string('type');
            $table->boolean('is_checked')->default(0)->index();
            $table->boolean('is_locked')->default(0)->index();
            $table->integer('favorite_count')->default(0)->index();
            $table->integer('share_count')->default(0)->index();
            $table->integer('view_count')->default(0)->index();
            $table->integer('commit_count')->default(0)->index();
            $table->string('status');
            $table->softDeletes();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('posts');
	}

}
