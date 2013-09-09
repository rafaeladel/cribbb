<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersFollowsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_follows' , function($table){
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('follows_id');
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
		Schema::dropIfExists('user_follows');
	}

}