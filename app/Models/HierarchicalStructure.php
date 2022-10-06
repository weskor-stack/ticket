<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HierarchicalStructure extends Model
{
    use HasFactory;
    protected $connection = 'Employee';
    protected $table = 'hierarchical_structure';
    protected $primaryKey = 'hierarchical_position_id';
}
