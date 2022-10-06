<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HierarchicalPosition extends Model
{
    use HasFactory;
    protected $connection = 'Employee';
    protected $table = 'hierarchical_position';
    protected $primaryKey = 'hierarchical_position_id';
}
