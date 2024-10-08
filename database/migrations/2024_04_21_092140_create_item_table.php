<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',30);
            $table->integer('code');
            $table->unsignedBigInteger('follow_item_id')->nullable();
            $table->integer('calc_fl');
            $table->boolean('analize_fl');
            $table->boolean('show_fl')->defualt(1);
            $table->timestamps();
            /*  $table->bigIncrements('id');
            $table->string('name',30);
            $table->integer('code')->nullable();
            $table->unsignedBigInteger('follow_item_id')->nullable();
            $table->integer('calc_fl')->defualt(0);
            $table->timestamps();*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item');
    }
}
