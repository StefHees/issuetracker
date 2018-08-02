<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // aleardy done in alter_issues_table_fk.php
//        Schema::table('issues', function (Blueprint $table) {
//            $table->unsignedInteger('client_id')->nullable();
//
//            $table->foreign('client_id')
//                ->references('id')
//                ->on('clients')
//                ->onDelete('cascade');
//        });



        Schema::table('tasks', function (Blueprint $table) {

            $table->foreign('issue_id')
                ->references('id')
                ->on('issues')
                ->onDelete('cascade');

            $table->foreign('status_id')
                ->references('id')
                ->on('statuses')
                ->onDelete('cascade');

        });

        Schema::table('task_users', function (Blueprint $table) {

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('task_id')
                ->references('id')
                ->on('tasks')
                ->onDelete('cascade');

        });

        Schema::table('time_registrations', function (Blueprint $table) {

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


        Schema::table('issues', function (Blueprint $table) {
            $table->dropForeign('issues_client_id_foreign');
            $table->dropColumn('client_id');
        });

        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign('tasks_issue_id_foreign');
            $table->dropForeign('tasks_status_id_foreign');
        });

        Schema::table('task_users', function (Blueprint $table) {
            $table->dropForeign('task_user_users_id_foreign');
            $table->dropForeign('task_users_task_id_foreign');
        });

        Schema::table('time_registrations', function (Blueprint $table) {
            $table->dropForeign('time_registrations_user_id_foreign');
            $table->dropForeign('time_registrations_task_id_foreign');
        });

    }
}
