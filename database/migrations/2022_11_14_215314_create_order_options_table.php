<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderOptionsTable extends Migration {

	public function up()
	{
		Schema::create('order_options', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('order_id')->unsigned();
			$table->integer('option_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('order_options');
	}
}