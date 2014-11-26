<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table) {

			$table->increments('id');
			$table->string('name');
			$table->string('email')->unique();
			$table->string('password');
			$table->string('remember_token')->nullable();
			$table->timestamps();

		});


		Schema::create('juices', function($table) {

			$table->increments('id');
			$table->string('title');
			$table->text('ingredients');
			$table->text('directions');
			$table->text('day');
			$table->text('day_part');
			$table->string('image_file_name');
			$table->integer('user_id')->unsigned();
			$table->timestamps();

			#Foreign key to users table
			$table->foreign('user_id')->references('id')->on('users');

		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS=0');
		Schema::drop('users');
		Schema::drop('juices');
		DB::statement('SET FOREIGN_KEY_CHECKS=1');
	}

}
