<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HRM_Personal extends Model
{
    use HasFactory;
    protected $connection = 'sqlsrv';
    protected $table = 'Personal';
    public $timestamps = false;
    public $primaryKey = 'Employee_id';
    protected $fillable = [
        'Employee_ID', 'First_Name', 'Last_Name', 'Middle_Initial', 'Address1', 'Address2', 'City', 'State', 'Zip', 'Email', 'Phone_Number', 'Social_Security_Number', 'Drivers_License', 'Marital_Status', 'Gender', 'Shareholder_Status', 'Benefit_Plans', 'Ethnicity', 'RecruitmentDate', 'Benefits', 'Benefits_old', 'Birthday',
    ];

    public function employement()
    {
        return $this->hasOne(HRM_Employment::class, 'Employee_ID', 'Employee_ID');
    }
}
