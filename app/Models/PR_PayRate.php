<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PR_PayRate extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'PayRates';
    public $timestamps = false;
    public $primaryKey = 'idPayRates';
    protected $fillable = [
        'PayRateName', 'value', 'TaxPercentage', 'PayType', 'PayAmount', 'PT-Level',
    ];

    public function employee()
    {
        return $this->belongsTo(PR_Employee::class);
    }
}
