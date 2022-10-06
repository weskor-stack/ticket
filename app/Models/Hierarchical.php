<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hierarchical extends Model
{
    use HasFactory;
    protected $connection = 'Employee';
    protected $table = 'hierarchical';
    protected $primaryKey = 'hierarchical_id';
}
