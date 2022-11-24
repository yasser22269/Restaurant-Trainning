<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRolesTable extends Migration {

	public function up()
	{
		Schema::create('roles', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('name');
            $table->boolean('is_system')->default(false)->comment("System Roles Cannot Be Edited Or Deleted Even By Admins");
            $table->timestamps();
            $table->softDeletes();
        });
	}

	public function down()
	{
		Schema::drop('roles');
	}
}
