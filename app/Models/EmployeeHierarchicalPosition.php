<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeHierarchicalPosition extends Model
{
    use HasFactory;
    protected $connection = 'Employee';
    protected $table = 'employee_hierarchical_position';
    protected $primaryKey = 'hierarchical_position_id';
}
