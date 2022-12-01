<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeesTable extends Migration {

	public function up()
	{
		Schema::create('employees', function(Blueprint $table) {
			$table->id();
			$table->string('name', 50);
            $table->string('email')->unique();
            $table->string('remember_token')->nullable();
            $table->string('phone')->unique();
			$table->string('nid')->unique();
            $table->string('password');
            $table->integer('age')->nullable();
            $table->string('address')->nullable();
            $table->string('salary');
            $table->date('start_date');
            $table->string('position');
            $table->string('office');
            $table->string('photo')->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();
            $table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('employees');
	}
}
