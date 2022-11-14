<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeesTable extends Migration {

	public function up()
	{
		Schema::create('employees', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 50);
			$table->integer('role_id')->unsigned()->nullable();
			$table->string('nid')->unique();
			$table->string('phone')->unique();
			$table->string('photo')->nullable();
			$table->boolean('status');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('employees');
	}
}