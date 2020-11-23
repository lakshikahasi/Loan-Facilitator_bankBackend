<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('loan_id');
            $table->string('nic');
            $table->string('date');
            $table->string('crop');
            $table->string('whatfor');
            $table->string('reason');
            $table->double('amount');
            $table->integer('months');
            $table->string('civil');
            $table->string('spousename');
            $table->string('spo_emplo');
            $table->integer('children');
            $table->string('fix_name');
            $table->string('fix_deed');
            $table->double('fix_size');
            $table->double('fix_value');
            $table->string('mot_about');
            $table->string('mot_location');
            $table->double('mot_value');
            $table->string('gua1_name');
            $table->string('gua1_occ');
            $table->string('gua1_tp');
            $table->string('gua2_name');
            $table->string('gua2_occ');
            $table->string('gua2_tp');
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
        Schema::dropIfExists('applications');
    }
}
