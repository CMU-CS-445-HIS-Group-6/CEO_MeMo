<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHrmEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sqlsrv')->create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('FirstName', 45);
            $table->string('LastName', 45);
            $table->string('Email', 45);
            $table->date('Birthday');
            $table->integer('Gender')->default(0);
            $table->string('Address');
            $table->string('PhoneNumber', 13);
            $table->string('Ethnicity', 45);
            $table->dateTime('RecruitmentDate');
            $table->integer('Benefits')->default(0);
            $table->integer('Benefits_old')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('sqlsrv')->dropIfExists('employees');
    }
}
