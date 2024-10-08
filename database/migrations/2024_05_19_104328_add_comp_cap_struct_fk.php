<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCompCapStructFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comp_cap_struct', function (Blueprint $table) {
            DB::statement('ALTER TABLE comp_cap_struct
                     ADD CONSTRAINT comp_cap_struct_fk1  FOREIGN KEY (company_id)
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
