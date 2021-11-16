<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrowers', function (Blueprint $table) {
            $table->string('id', 255)->nullable()->primary();
            $table->timestamps();

            $table->string('id_user', 255)->nullable();
            $table->bigInteger('finance_ammount')->unsigned()->nullable();
            $table->string('ic_front', 255)->nullable();
            $table->string('ic_back', 255)->nullable();
            $table->string('pay_slip', 255)->nullable();
            $table->string('tax_slip', 255)->nullable();
            $table->string('bank_statement', 255)->nullable();
            $table->enum('status', ['applied', 'canceled', 'waiting'])->default('waiting');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrowers');
    }
}
