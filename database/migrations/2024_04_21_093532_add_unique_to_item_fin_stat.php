<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUniqueToItemFinStat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('item_fin_stat', function (Blueprint $table) {
            DB::statement(" ALTER TABLE item_fin_stat
                                ADD CONSTRAINT uq_item_fin_stat UNIQUE(fin_stat_id , item_id);");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('item_fin_stat', function (Blueprint $table) {
            //
        });
    }
}
