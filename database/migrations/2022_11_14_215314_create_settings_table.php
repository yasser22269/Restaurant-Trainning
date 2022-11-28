<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
			$table->increments('id');
			$table->string('phoneNumber')->nullable();
			$table->string('phoneNumber2')->nullable();
			$table->string('facebook')->nullable();
			$table->string('websiteName')->nullable();
			$table->string('address')->nullable();
			$table->text('about')->nullable();
			$table->string('email')->nullable();
			$table->string('logo')->nullable();
			$table->string('smallLogo')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
}
