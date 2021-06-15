<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HRM_Employee extends Model
{
    use HasFactory;
    protected $connection = 'sqlsrv';
    protected $table = 'Employees';
    public $timestamps = false;
    protected $fillable = [
        'FirstName', 'LastName', 'Gender', 'Birthday', 'Address', 'Email', 'PhoneNumber', 'Ethnicity', 'RecruitmentDate', 'Benefits', 'Benefits_old',
    ];

    public function phongban()
    {
        return $this->belongsTo(HRM_PhongBan::class, 'MAPHONGBAN');
    }
}
