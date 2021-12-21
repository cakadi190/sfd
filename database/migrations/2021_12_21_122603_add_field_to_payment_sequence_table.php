<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToPaymentSequenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasColumn('payment_sequence', 'is_late')){
            Schema::table('payment_sequence', function (Blueprint $table) {
                $table->boolean('is_late')->default(false);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payment_sequence', function (Blueprint $table) {
            $table->dropColumn('is_late');
        });
    }
}
