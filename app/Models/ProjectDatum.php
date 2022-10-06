<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProjectDatum
 *
 * @property $project_id
 * @property $date_start
 * @property $date_finish
 * @property $user_id
 * @property $date_registration
 *
 * @property Project $project
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ProjectDatum extends Model
{
  protected $connection = 'Project';
  protected $table = 'project_data';
  protected $primaryKey = 'project_id';
  
    static $rules = [
		'project_id' => 'required',
		'date_start' => 'required',
		'user_id' => 'required',
		'date_registration' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['project_id','date_start','date_finish','user_id','date_registration'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function project()
    {



        return $this->hasOne('App\Models\Project', 'project_id', 'project_id');
    }
    

}
