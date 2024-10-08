<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUniqueToFinStat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fin_stat', function (Blueprint $table) {
                DB::statement(" ALTER TABLE fin_stat
                                ADD CONSTRAINT uq_fin_stat UNIQUE(code);");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fin_stat', function (Blueprint $table) {
            //
        });
    }
}
