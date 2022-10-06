<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProjectManager
 *
 * @property $project_id
 * @property $manager_id
 * @property $status_id
 * @property $user_id
 * @property $date_registration
 *
 * @property Project $project
 * @property Status $status
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ProjectManager extends Model
{
    protected $connection = 'Project';
    protected $table = 'project_manager';
    protected $primaryKey = 'project_id';
    static $rules = [
		'project_id' => 'required',
		'manager_id' => 'required',
		'status_id' => 'required',
		'user_id' => 'required',
		'date_registration' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['project_id','manager_id','status_id','user_id','date_registration'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function project()
    {
        return $this->hasOne('App\Models\Project', 'project_id', 'project_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function status()
    {
        return $this->hasOne('App\Models\Status', 'status_id', 'status_id');
    }
    

}
