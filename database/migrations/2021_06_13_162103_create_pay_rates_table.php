<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql')->create('pay_rates', function (Blueprint $table) {
            $table->id();
            $table->string('PayRateName', 40);
            $table->decimal('Value');
            $table->decimal('TaxPercentage');
            $table->integer('PayType');
            $table->decimal('PayAmount');
            $table->decimal('PTLevel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql')->dropIfExists('pay_rates');
    }
}
