<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePRPayRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql')->create('PayRates', function (Blueprint $table) {
            $table->integer('idPayRates')->autoIncrement();
            $table->string('PayRateName', 40);
            $table->double('value');
            $table->double('TaxPercentage');
            $table->integer('PayType');
            $table->double('PayAmount');
            $table->double('PT-Level');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql')->dropIfExists('PayRates');
    }
}
