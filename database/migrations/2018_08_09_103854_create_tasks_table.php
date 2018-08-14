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
            $table->text('description');
            $table->integer('progress')->default(0);
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('priority');
            $table->integer('estimation');
            $table->boolean('archive')->default(0);
            $table->boolean('on-hold')->default(0);
            $table->unsignedInteger('task_id')->nullable();
            $table->unsignedInteger('type_id')->nullable();
            $table->unsignedInteger('parent_id')->index()->nullable();
            $table->unsignedInteger('client_id')->nullable();
            $table->unsignedInteger('status_id')->nullable();
            $table->foreign('task_id')
                ->references('id')
                ->on('tasks')
                ->onDelete('cascade');
            $table->foreign('status_id')
                ->references('id')
                ->on('statuses')
                ->onDelete('cascade');
            $table->foreign('type_id')
                ->references('id')
                ->on('types');
            $table->foreign('client_id')
                ->references('id')
                ->on('clients');
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
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign('tasks_type_id_foreign');
            $table->dropForeign('tasks_client_id_foreign');
            $table->dropForeign('tasks_status_id_foreign');
        });
        Schema::dropIfExists('tasks');
    }
}
