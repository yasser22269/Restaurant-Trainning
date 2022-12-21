<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimeEmpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_emps', function (Blueprint $table) {
            $table->id();
             $table->time('start_at');
             $table->time('end_at');
            $table->BigInteger('emp_id')->unsigned();
            $table->foreign('emp_id')->references('id')->on('employees')
                ->onDelete('NO ACTION')
                ->onUpdate('NO ACTION');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('time_emps');
    }
}
