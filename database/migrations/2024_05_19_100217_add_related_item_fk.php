<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelatedItemFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('related_item', function (Blueprint $table) {
            DB::statement('ALTER TABLE related_item
                     ADD CONSTRAINT related_item_fk1  FOREIGN KEY (item_id)
                             REFERENCES item(id);');

            DB::statement('ALTER TABLE related_item
                    ADD CONSTRAINT related_item_fk2  FOREIGN KEY (item_related_id)
                            REFERENCES item(id);');
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
