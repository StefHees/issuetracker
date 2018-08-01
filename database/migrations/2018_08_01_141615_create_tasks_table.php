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
            $table->integer('issue_id');
            $table->integer('user_id');
            $table->integer('status_id');
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
