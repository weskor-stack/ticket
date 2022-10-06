<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProjectPriority
 *
 * @property $project_priority_id
 * @property $name
 * @property $order
 * @property $user_id
 * @property $date_registration
 *
 * @property Project[] $projects
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ProjectPriority extends Model
{
  protected $connection = 'Project';
    protected $table = 'project_priority';
    protected $primaryKey = 'project_priority_id';
    static $rules = [
		'project_priority_id' => 'required',
		'name' => 'required',
		'order' => 'required',
		'user_id' => 'required',
		'date_registration' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['project_priority_id','name','order','user_id','date_registration'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projects()
    {
      //muchos proyectos pueden tener una project priority id
        return $this->hasMany('App\Models\Project', 'project_priority_id', 'project_priority_id');
    }
    public function tickets()
    {
      //muchos proyectos pueden tener una project priority id
        return $this->hasMany('App\Models\Project', 'project_priority_id', 'project_priority_id');
    }
    

}
