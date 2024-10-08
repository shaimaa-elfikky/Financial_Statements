<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',100);
            $table->string('address',100)->nullable();
            $table->boolean('aff_or_not')->default(0);
            $table->boolean('owner_or_not')->default(0);
            $table->boolean('is_active')->default(0);
            $table->string('email',50)->nullable();
            $table->integer('telephone')->nullable();
            $table->string('code',10)->nullable();
            $table->string('web_site' , 50)->nullable();
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
        Schema::dropIfExists('company');
    }
}
