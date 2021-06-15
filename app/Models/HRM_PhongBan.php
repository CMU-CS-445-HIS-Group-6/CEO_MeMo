<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HRM_PhongBan extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'phongban';
    protected $primaryKey = 'MAPHONGBAN';
    public $timestamps = false;
}
