<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountryDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country_detail', function (Blueprint $table) {
            $table->id();
            $table->string("country_name")->nullable();
            $table->string("country_name_init")->nullable();
            $table->string("country_code")->nullable();
            $table->string("country_currency")->nullable();
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
        Schema::dropIfExists('country_detail');
    }
}
