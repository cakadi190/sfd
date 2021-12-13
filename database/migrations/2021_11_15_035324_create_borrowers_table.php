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
      $table->id();
      $table->string('email')->nullable();
      $table->string('loan_id')->unique();
      $table->string('finance_amount')->nullable();
      $table->string('period')->nullable();
      $table->string('fullname')->nullable();
      $table->string('nric')->nullable();
      $table->string('birthdate')->nullable();
      $table->string('dependants')->nullable();
      $table->string('employment')->nullable();
      $table->string('phone')->nullable();
      $table->string('utilities_slip')->nullable();
      $table->string('id_back')->nullable();
      $table->string('id_front')->nullable();
      $table->string('salary_slip')->nullable();
      $table->date('disbursed_at')->nullable();
      $table->date('due_date')->nullable();
      $table->string('status')->nullable(); // 'waiting', 'disbursed', 'blacklist'
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
    Schema::dropIfExists('borrowers');
  }
}
