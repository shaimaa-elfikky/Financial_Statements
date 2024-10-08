<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddItemCompPrdValFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('item_comp_prd_val', function (Blueprint $table) {
            DB::statement('ALTER TABLE item_comp_prd_val
                     ADD CONSTRAINT item_comp_prd_val_fk1  FOREIGN KEY (item_id)
                             REFERENCES item(id);');

            DB::statement('ALTER TABLE item_comp_prd_val
                    ADD CONSTRAINT item_comp_prd_val_fk2  FOREIGN KEY (period_id)
                            REFERENCES period(id);');

            DB::statement('ALTER TABLE item_comp_prd_val
            ADD CONSTRAINT item_comp_prd_val_fk3  FOREIGN KEY (company_id)
                    REFERENCES company(id);');
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
