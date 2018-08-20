<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('text');
            $table->string('attachment')->nullable();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('task_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->foreign('task_id')
                ->references('id')
                ->on('tasks');
            $table->unsignedInteger('reply_id')->nullable();
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
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign('comments_user_id_foreign');
            $table->dropForeign('comments_task_id_foreign');
        });
        Schema::dropIfExists('comments');
    }
}
