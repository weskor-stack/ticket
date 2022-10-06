<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warranty extends Model
{
    protected $connection = 'Project'; //nombre de la conexión
    protected $table = 'project_warranty'; //nombre de la tabla a ocupar
    protected $primaryKey = 'project_id'; //id de la tabla


    use HasFactory;
    public function ProjectPriority()
    {
      //muchos proyectos pueden tener una project priority id
        return $this->hasOne('App\Models\Project', 'project_priority_id', 'project_priority_id');
    }
    
}
