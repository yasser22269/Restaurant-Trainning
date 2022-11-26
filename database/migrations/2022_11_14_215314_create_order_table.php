<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderTable extends Migration {

	public function up()
	{
		Schema::create('order', function(Blueprint $table) {
			$table->increments('id');
			$table->string('Invoice_number');
			$table->enum('type', array('takeaway', 'Delivery', 'InPlace'));
			$table->string('taxes');
			$table->string('discount')->default('0');
			$table->string('total_price');
			$table->enum('payment_type', array('Cash', 'Visa'));
			$table->integer('emp_id')->unsigned()->nullable();
			$table->boolean('paid_status');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('order');
	}
}