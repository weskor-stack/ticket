<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class area_Employee extends Model
{
    protected $connection = 'Employee';
    protected $table = 'area_employee';
    protected $primaryKey = 'area_id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}
