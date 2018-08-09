<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_user', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();;
            $table->unsignedInteger('task_id')->nullable();;
            $table->timestamps();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('task_id')
                ->references('id')
                ->on('tasks')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('task_user', function (Blueprint $table) {
            $table->dropForeign('task_user_task_id_foreign');
            $table->dropForeign('task_user_user_id_foreign');
        });
        Schema::dropIfExists('task_user');
    }
}
