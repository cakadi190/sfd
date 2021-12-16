<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('applicants', function (Blueprint $table) {
      $table->id();

      $table->string('loan_id')->unique()->nullable();
      $table->bigInteger('finance_amount')->nullable();
      $table->string('period')->nullable();
      $table->string('fullname')->nullable();
      $table->string('nric')->nullable();
      $table->string('email')->nullable();
      $table->string('phone')->nullable();
      $table->string('birthdate')->nullable();
      $table->string('dependants')->nullable();
      $table->string('employment')->nullable();
      $table->string('id_front')->nullable();
      $table->string('id_back')->nullable();
      $table->string('salary_slip')->nullable();
      $table->string('bank_statement')->nullable();
      $table->string('utilities_slip', 255)->nullable();
      $table->enum('status', ['applied', 'canceled', 'pending'])->default('pending');
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
    Schema::dropIfExists('applicants');
  }
}
