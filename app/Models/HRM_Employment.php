<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HRM_Employment extends Model
{
    use HasFactory;
    protected $connection = 'sqlsrv';
    protected $table = 'Employment';
    public $timestamps = false;
    public $primaryKey = 'Employee_id';
    protected $fillable = [
        'Employee_ID', 'Employment_Status', 'Hire_Date', 'Workers_Comp_Code', 'Termination_Date', 'Rehire_Date', 'Last_Review_Date',
    ];

    public function employee()
    {
        return $this->belongsTo(HRM_Personal::class, 'Employee_ID', 'Employee_ID');
    }
}
