<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDateAndTimeColumnsToCoursesUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses_users', function (Blueprint $table) {
            $table->time('start_at');
            $table->time('end_at');
            $table->string('day');
            $table->timestamps();
            $table->id()->first();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses_users', function (Blueprint $table) {
            $table->dropColumn('start_at');
            $table->dropColumn('end_at');
            $table->dropColumn('day');
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
            $table->dropColumn('id');
        });
    }
}
