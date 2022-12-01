<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name', 50);
            $table->text('customer_phone');
            $table->date('scheduleDate');
            $table->time('startTime');
            $table->time('endTime')->nullable();
            $table->enum('status',['active','Completed'])->default('active');
            $table->integer('table_id')->unsigned();
            $table->foreign('table_id')->references('id')->on('tables')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
