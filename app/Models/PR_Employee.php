<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PR_Employee extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'Employee';
    public $timestamps = false;
    public $primaryKey = 'idEmployee';
    protected $fillable = [
        'idEmployee', 'EmployeeNumber', 'LastName', 'FirstName', 'SSN', 'PayRate', 'PayRates_idPayRates', 'VacationDays', 'PaidToDays', 'PaidLastYear',
    ];
}
