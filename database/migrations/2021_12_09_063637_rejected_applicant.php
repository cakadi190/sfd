<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RejectedApplicant extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rejected_applicants', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->bigInteger('applicants_id')->unsigned();
            $table->foreign('applicants_id')->references('id')->on('applicants')->onDelete('cascade');
            $table->longText('reject_reason');
            $table->string('reject_status');
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
        Schema::dropIfExists('rejected_applicants');
    }
}
