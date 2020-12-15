<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->integer('obtain_id');
            $table->integer('payment_id');
            $table->string('loan_id');
            $table->string('Installment_date');
            $table->double('Installment');
            $table->double('paid_amount');
            $table->double('to_be_paid_amount');
            $table->string('to_be_paid_date');
            $table->double('rating_no');
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
        Schema::dropIfExists('payments');
    }
}
