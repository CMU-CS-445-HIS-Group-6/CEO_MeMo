<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PR_Payroll extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'payrolls';
    public $timestamps = false;
    protected $fillable = [
        'employee_id', 'WorkingDays', 'PaidToDays', 'PaidLastYear',
    ];

    public function employee()
    {
        return $this->belongsTo(PR_Employee::class);
    }
}
