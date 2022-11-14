<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateZonesTable extends Migration {

	public function up()
	{
		Schema::create('zones', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('price');
		});
	}

	public function down()
	{
		Schema::drop('zones');
	}
}