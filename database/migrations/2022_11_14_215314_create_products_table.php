<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	public function up()
	{
		Schema::create('products', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 50);
			$table->text('description');
			$table->string('picture');
			$table->string('price');
			$table->boolean('status');
			$table->string('discount')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('products');
	}
}