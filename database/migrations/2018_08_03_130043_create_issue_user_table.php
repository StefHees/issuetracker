<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssueUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issue_user', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('issue_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('issue_id')
                ->references('id')
                ->on('issues');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
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
        Schema::table('issue_user', function (Blueprint $table) {
            $table->dropForeign('user_id');
            $table->dropForeign('issue_id');
        });
        Schema::dropIfExists('issue_user');
    }
}
