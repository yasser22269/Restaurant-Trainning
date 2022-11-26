<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInplaceOrdersTable extends Migration {

	public function up()
	{
		Schema::create('inplace_orders', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('table_id')->unsigned();
			$table->integer('order_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('inplace_orders');
	}
}