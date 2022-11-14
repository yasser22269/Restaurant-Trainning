<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeliveriesTable extends Migration {

	public function up()
	{
		Schema::create('deliveries', function(Blueprint $table) {
			$table->increments('id');
			$table->enum('type', array('free', 'Basicsalary'));
			$table->string('name');
			$table->string('phone');
			$table->string('nid');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('deliveries');
	}
}