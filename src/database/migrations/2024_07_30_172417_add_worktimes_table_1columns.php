<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWorktimesTable1columns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('worktimes', function (Blueprint $table) {
            $table->time('break_total_time')->nullable()->after('end_time');
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
            $table->dropColumn('break_total_time');
            //
        });
    }
}
