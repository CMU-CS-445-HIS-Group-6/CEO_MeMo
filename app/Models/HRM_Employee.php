<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HRM_Employee extends Model
{
    use HasFactory;
    protected $connection = 'sqlsrv';
    protected $table = 'employees';
    public $timestamps = false;
    protected $fillable = [
        'FirstName', 'LastName', 'Gender', 'Birthday', 'Address', 'Email', 'PhoneNumber', 'Ethnicity', 'RecruitmentDate', 'Benefits', 'Benefits_old', 'department_id',
    ];

    public function department()
    {
        return $this->belongsTo(HRM_Department::class);
    }
}
