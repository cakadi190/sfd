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
      $table->timestamps();

      $table->string('loan_id')->unique()->nullable();
      $table->bigInteger('finance_amount')->unsigned()->nullable();
      $table->string('period')->nullable();
      $table->string('fullname')->nullable();
      $table->string('nric')->nullable();
      $table->string('email')->nullable();
      $table->string('phone')->nullable();
      $table->string('birthdate')->nullable();
      $table->string('dependants')->nullable();
      $table->enum('employment', ['employeed', 'unemployed'])->nullable()->default('unemployed');
      $table->string('id_front', 255)->nullable();
      $table->string('id_back', 255)->nullable();
      $table->string('salary_slip', 255)->nullable();
      $table->string('utilities_slip', 255)->nullable();
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
    Schema::dropIfExists('applicants');
  }
}
