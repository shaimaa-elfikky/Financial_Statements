<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCompCapStructDetFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comp_cap_struct_det', function (Blueprint $table) {
            DB::statement('ALTER TABLE comp_cap_struct_det
                     ADD CONSTRAINT comp_cap_struct_det_fk1  FOREIGN KEY (invest_company_id)
                            REFERENCES company(id);');

            DB::statement('ALTER TABLE comp_cap_struct_det
                    ADD CONSTRAINT comp_cap_struct_det_fk2  FOREIGN KEY (comp_cap_struct_id)
                        REFERENCES comp_cap_struct(id);');
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
