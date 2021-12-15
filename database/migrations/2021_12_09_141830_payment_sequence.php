<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PaymentSequence extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('payment_sequence');
        Schema::create('payment_sequence', function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('borrower_loan_id');
            $table->foreign('borrower_loan_id')->references('loan_id')->on('borrowers')->onDelete('cascade');
            $table->integer('current_payment_seq')->nullable();
            $table->integer('max_payment_seq')->nullable();
            $table->double('ammount')->nullable();
            $table->date('due_date')->nullable();
            $table->dateTime('paid_at')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('officer')->nullable(); // Column to indicate which admin accept the payment from borrower
            $table->string('status')->default('pending'); // 'pending', 'paid', 'overdue'
            $table->boolean('is_late')->default(false);
            $table->double('late_charge')->default(0.0);
            $table->longText('remark')->nullable();
            $table->string('file_receipt')->nullable();
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
        Schema::dropIfExists('payment_sequence');
    }
}
