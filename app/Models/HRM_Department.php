<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HRM_Department extends Model
{
    use HasFactory;
    protected $connection = 'sqlsrv';
    protected $table = 'departments';
    public $timestamps = false;
    protected $fillable = [
        'Name', 'Address',
    ];

    public function employees()
    {
        return $this->hasMany(HRM_Employee::class);
    }
}
