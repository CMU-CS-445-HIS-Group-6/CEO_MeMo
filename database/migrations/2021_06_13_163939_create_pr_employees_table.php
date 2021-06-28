<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql')->create('Employee', function (Blueprint $table) {
            $table->integer('idEmployee');
            $table->integer('EmployeeNumber')->nullable();
            $table->string('LastName', 45);
            $table->string('FirstName', 45);
            $table->integer('SSN')->nullable();
            $table->string('PayRate', 40)->nullable();
            $table->integer('PayRates_idPayRates')->nullable();
            $table->foreign('PayRates_idPayRates')->references('idPayRates')->on('PayRates');
            $table->integer('VacationDays')->default(0);
            $table->double('PaidToDays')->default(0);
            $table->double('PaidLastYear')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql')->dropIfExists('employees');
    }
}
