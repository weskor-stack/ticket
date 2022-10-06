<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProjectStatus
 *
 * @property $project_status_id
 * @property $name
 * @property $user_id
 * @property $date_registration
 *
 * @property ActivityGeneral[] $activityGenerals
 * @property ActivitySpecific[] $activitySpecifics
 * @property Phase[] $phases
 * @property Project[] $projects
 * @property TaskGeneral[] $taskGenerals
 * @property TaskSpecific[] $taskSpecifics
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ProjectStatus extends Model
{
    //dentro de este modelo se definen las reglas en este caso se está definiendo que la tabla se llamará project_status y que la variable key será project_id
    //tambien con esto evitamos los errores como que no encuentra una tabla por que como sabemos laravel las pone en plural
    protected $connection = 'Project';
    protected $table = 'project_status';
    protected $primaryKey = 'project_status_id';
    // con esto no es necesario que tengamos timestamps ni incrementos, solo los datos que estmaos solicitando
    public $incrementing  = false;
    public $timestamps  = false;
    static $rules = [
		'project_status_id' => 'required',
		'name' => 'required',
		'user_id' => 'required',
		'date_registration' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['project_status_id','name','user_id','date_registration'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activityGenerals()
    {
        return $this->hasMany('App\Models\ActivityGeneral', 'project_status_id', 'project_status_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activitySpecifics()
    {
        return $this->hasMany('App\Models\ActivitySpecific', 'project_status_id', 'project_status_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function phases()
    {
        return $this->hasMany('App\Models\Phase', 'project_status_id', 'project_status_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projects()
    {
        return $this->hasMany('App\Models\Project', 'project_status_id', 'project_status_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function taskGenerals()
    {
        return $this->hasMany('App\Models\TaskGeneral', 'project_status_id', 'project_status_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function taskSpecifics()
    {
        return $this->hasMany('App\Models\TaskSpecific', 'project_status_id', 'project_status_id');
    }
    

}
