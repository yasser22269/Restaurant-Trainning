<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOptionsTable extends Migration {

	public function up()
	{
		Schema::create('options', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->integer('product_id')->unsigned();
			$table->integer('attribute_id')->unsigned();
			$table->string('price');
			$table->boolean('status');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('options');
	}
}