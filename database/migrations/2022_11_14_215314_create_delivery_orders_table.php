<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeliveryOrdersTable extends Migration {

	public function up()
	{
		Schema::create('delivery_orders', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('order_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->integer('emp_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('delivery_orders');
	}
}