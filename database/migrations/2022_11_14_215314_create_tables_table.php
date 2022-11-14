<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTablesTable extends Migration {

	public function up()
	{
		Schema::create('tables', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->boolean('status');
			$table->string('number_of_chairs');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('tables');
	}
}