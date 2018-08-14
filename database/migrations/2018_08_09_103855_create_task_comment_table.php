<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_comment', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('task_id');
            $table->unsignedInteger('comment_id');
            $table->foreign('task_id')
                ->references('id')
                ->on('tasks');
            $table->foreign('comment_id')
                ->references('id')
                ->on('comments');
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
        Schema::table('task_comment', function (Blueprint $table) {
            $table->dropForeign(['task_id']);
            $table->dropForeign(['comment_id']);
        });
        Schema::dropIfExists('task_comment');
    }
}
