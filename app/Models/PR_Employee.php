<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PR_Employee extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'Employees';
    public $timestamps = false;
    protected $fillable = [
        'EmployeeNumber', 'LastName', 'FirstName', 'SSN', 'PayRate', 'payrate_id', 'VacationDays', 'PaidToDays', 'PaidLastYear',
    ];

    public function payrate()
    {
        return $this->hasOne(PR_PayRate::class);
    }
}
