<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterItemRemoveAutonum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('item', function (Blueprint $table) {
       /*     //drop all contraint pk - fk
            DB::statement('ALTER TABLE item DROP CONSTRAINT IF EXISTS item_fk1 ;');
        --    DB::statement('ALTER TABLE item_rep DROP CONSTRAINT IF EXISTS item_rep_fk1 ;');
        --    DB::statement('ALTER TABLE item_comp_prd_val DROP CONSTRAINT IF EXISTS item_comp_prd_val_fk1 ;');
        --    DB::statement('ALTER TABLE item_fin_stat DROP CONSTRAINT IF EXISTS item_fin_stat_fk1 ;');
        --    DB::statement('ALTER TABLE related_item DROP CONSTRAINT IF EXISTS related_item_fk1 ;');
        --    DB::statement('ALTER TABLE related_item DROP CONSTRAINT IF EXISTS related_item_fk2 ;');*/
            // DB::statement('ALTER TABLE item DROP CONSTRAINT IF EXISTS PK__item__3213E83FCC28D7C5 ;');
            // //**//drop column to remove identity
            // DB::statement('ALTER TABLE item  DROP COLUMN id ;');
            // //**//add cloumn again
            // DB::statement('ALTER TABLE item  ADD id BIGINT ;');
            // DB::statement('ALTER TABLE item  ALTER COLUMN  id BIGINT not null;');
            // //**//add pk on item.id
            // DB::statement('ALTER TABLE item ADD CONSTRAINT PK_item PRIMARY KEY NONCLUSTERED (id);');
            // //**//add fk
            // DB::statement('ALTER TABLE item ADD CONSTRAINT item_fk1  FOREIGN KEY (follow_item_id) REFERENCES item(id);');
            // DB::statement('ALTER TABLE item_rep ADD CONSTRAINT item_rep_fk1  FOREIGN KEY (item_id)REFERENCES item(id);');
            // DB::statement('ALTER TABLE item_comp_prd_val ADD CONSTRAINT item_comp_prd_val_fk1  FOREIGN KEY (item_id) REFERENCES item(id);');
            // DB::statement('ALTER TABLE item_fin_stat ADD CONSTRAINT item_fin_stat_fk1  FOREIGN KEY (item_id) REFERENCES item(id);');
            // DB::statement('ALTER TABLE related_item ADD CONSTRAINT related_item_fk1  FOREIGN KEY (item_id) REFERENCES item(id);');
            // DB::statement('ALTER TABLE related_item    ADD CONSTRAINT related_item_fk2  FOREIGN KEY (item_related_id) REFERENCES item(id);');
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
