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
            $table->integer('priority');
            $table->unsignedInteger('issue_id')->nullable();
            $table->time('estimation');
            $table->unsignedInteger('status_id')->nullable();
            $table->unsignedInteger('comment_id')->nullable();
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
        Schema::dropIfExists('tasks');
    }
}
