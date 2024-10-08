<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemAnalyzeCompTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_analyze_comp', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('item_comp_prd_val_id');
            $table->unsignedBigInteger('company_id')->nullable();
            $table->decimal('arbitrage_value',13,2)->nullable();
            $table->decimal('initial_budget_value',13,2)->nullable();
            $table->decimal('approved_budget_value',13,2)->nullable();
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
        Schema::dropIfExists('item_analyze_comp');
    }
}
