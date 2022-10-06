<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceEmployee extends Model
{
    protected $table = 'service_employee';
    protected $primaryKey = 'service_employee_id';
    public $incrementing = false;
    public $timestamps = false;
    static $rules = [
		'service_employee_id' => 'required',
		'service_id' => 'required',
		'employee_id' => 'required',
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
    protected $fillable = ['service_employee_id','service_id','employee_id','status_id','user_id','date_registration'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function service()
    {
        return $this->hasOne('App\Models\Service', 'service_id', 'service_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function serviceEmployeeSchedules()
    {
        return $this->hasMany('App\Models\ServiceEmployeeSchedule', 'service_employee_id', 'service_employee_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function status()
    {
        return $this->hasOne('App\Models\Status', 'status_id', 'status_id');
    }
}
