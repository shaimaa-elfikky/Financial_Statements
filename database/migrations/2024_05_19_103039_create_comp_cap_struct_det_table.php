<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompCapStructDetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comp_cap_struct_det', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('comp_cap_struct_id');
            $table->unsignedBigInteger('invest_company_id');
            $table->integer('invest_stock_num');
            $table->decimal('invest_stock_val' , 12 ,2);
            $table->boolean('minority_fl')->default(0);
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
        Schema::dropIfExists('comp_cap_struct_det');
    }
}
