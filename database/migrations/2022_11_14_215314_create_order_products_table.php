<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderProductsTable extends Migration {

	public function up()
	{
		Schema::create('order_products', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('order_id')->unsigned();
			$table->integer('product_id')->unsigned();
			$table->string('quantity');
			$table->enum('status', array('cooking', 'finished'));
		});
	}

	public function down()
	{
		Schema::drop('order_products');
	}
}