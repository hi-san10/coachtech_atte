<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeActualWorkingTimeIntegerToTimeOnWorktimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('worktimes', function (Blueprint $table) {
            $table->time('actual_working_time')->change();
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('worktimes', function (Blueprint $table) {
            $table->integer('actual_working_time')->change();
            //
        });
    }
}
