<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixIssueUserForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('issue_user', function (Blueprint $table) {
            $table->dropForeign('issue_user_issue_id_foreign');
            $table->foreign('issue_id')
                ->references('id')
                ->on('issues')
                ->onDelete('cascade');

            $table->dropForeign('issue_user_user_id_foreign');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::table('issue_user', function (Blueprint $table) {
            $table->dropForeign('issue_user_issue_id_foreign');
            $table->foreign('issue_id')
                ->references('id')
                ->on('issues');

            $table->dropForeign('issue_user_user_id_foreign');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
        });
    }
}
