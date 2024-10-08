<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUniqueToPeriod extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('period', function (Blueprint $table) {
                    DB::statement(" ALTER TABLE period
                                    ADD CONSTRAINT uq_period UNIQUE(date_from ,date_to);");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('period', function (Blueprint $table) {
            //
        });
    }
}
