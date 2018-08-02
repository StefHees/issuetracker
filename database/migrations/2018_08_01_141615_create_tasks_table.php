<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTableOld extends Migration
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
            $table->unsignedInteger('issue_id')->nullable();
            // $table->unsignedInteger('user_id')->nullable(); // not used anymore: realtion through task_id in task_user table
            $table->unsignedInteger('status_id')->nullable();
            $table->integer('estimated_time_minutes');
            $table->integer('percentage_finished');
            $table->string('remarks'); //attachments arranged in PHP/JS code, safe to filesystem not DB
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
