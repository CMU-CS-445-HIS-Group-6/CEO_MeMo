<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePREmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql')->create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('FirstName', 45);
            $table->string('LastName', 45);
            $table->string('PayRate', '40')->default(0);
            $table->foreignId('pay_rate_id')->nullable()->constrained();
            $table->integer('WorkingDays')->default(0);
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
