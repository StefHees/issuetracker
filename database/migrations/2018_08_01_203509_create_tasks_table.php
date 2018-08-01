<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('progress');
            $table->date('start_date');
            $table->date('end_date');
            // Bij priority kunnen we misschien 1 = low 2 = medium 3 = high doen? Kijk maar wat je hier mee doet.
            $table->integer('priority');
            // Of time hier de juiste term is weet ik niet zeker!
            $table->time('estimation');
            $table->unsignedInteger('status_id');
            $table->foreign('status_id')->references('id')->on('status');
            $table->timestamps();
            // Verder moet er ook nog een tabel voor opmerkingen (comments) gemaakt worden.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
