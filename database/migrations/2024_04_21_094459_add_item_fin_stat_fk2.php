<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddItemFinStatFk2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('item_fin_stat', function (Blueprint $table) {
            DB::statement('ALTER TABLE item_fin_stat
                     ADD CONSTRAINT item_fin_stat_fk2  FOREIGN KEY (fin_stat_id)
                             REFERENCES fin_stat(id);');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
