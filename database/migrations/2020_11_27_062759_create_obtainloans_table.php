<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObtainloansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obtainloans', function (Blueprint $table) {
            $table->integer('obtain_id');
            $table->integer('application_id');
            $table->string('loan_id');
            $table->string('Issued_date');
            $table->double('amount');
            $table->double('Interest_rate');
            $table->string('expired_date');
            $table->double('total_amount');
            $table->double('installment');
            $table->double('no_of_installment');
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
        Schema::dropIfExists('obtainloans');
    }
}
