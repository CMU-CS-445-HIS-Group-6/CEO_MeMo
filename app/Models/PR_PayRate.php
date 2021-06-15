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

    protected $fillable = [
        'PayRateName', 'Value', 'TaxPercentage', 'PayType', 'PayAmount', 'PTLevel',
    ];
}
