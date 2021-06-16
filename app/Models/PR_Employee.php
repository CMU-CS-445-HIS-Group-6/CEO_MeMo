<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PR_Employee extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'employees';
    public $timestamps = false;
    protected $fillable = [
        'LastName', 'FirstName', 'VacationDays',
    ];

    public function payroll()
    {
        return $this->hasOne(PR_Payroll::class);
    }
}
