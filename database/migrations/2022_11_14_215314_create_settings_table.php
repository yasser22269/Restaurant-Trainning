<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
			$table->increments('id');
			$table->string('phoneNumber');
			$table->string('phoneNumber2');
			$table->string('whatsapp');
			$table->string('facebook');
			$table->string('websiteName');
			$table->string('address');
			$table->string('about');
			$table->string('email');
			$table->string('logo');
			$table->string('logoWidth');
			$table->string('smallLogo');
		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
}