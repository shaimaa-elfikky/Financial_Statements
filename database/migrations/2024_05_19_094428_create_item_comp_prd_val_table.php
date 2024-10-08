<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemCompPrdValTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_comp_prd_val', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('period_id');
            $table->decimal('arbitrage_value',13,2);
            $table->decimal('initial_budget_value',13,2)->nullable();
            $table->decimal('approved_budget_value',13,2)->nullable();
            $table->unsignedBigInteger('company_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_comp_prd_val');
    }
}
