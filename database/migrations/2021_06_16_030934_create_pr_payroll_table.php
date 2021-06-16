<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrPayrollTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql')->create('payrolls', function (Blueprint $table) {
            $table->foreignId('employee_id')->constrained()->cascadeOnDelete();
            $table->integer('WorkingDays')->default(0);
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
        Schema::connection('mysql')->dropIfExists('pr_payroll');
    }
}
