<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddItemRepFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('item_rep', function (Blueprint $table) {
            DB::statement('ALTER TABLE item_rep
                     ADD CONSTRAINT item_rep_fk1  FOREIGN KEY (item_id)
                            REFERENCES item(id);');
            DB::statement('ALTER TABLE item_rep
                    ADD CONSTRAINT item_rep_fk2  FOREIGN KEY (rep_id)
                            REFERENCES report(id);');
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
