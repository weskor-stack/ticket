<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ServiceReport
 *
 * @property $service_report_id
 * @property $time_entry
 * @property $time_completion
 * @property $lunchtime
 * @property $service_hours
 * @property $service_extras
 * @property $duration_travel
 * @property $date_service
 * @property $service_id
 * @property $employee_id
 * @property $user_id
 * @property $date_registration
 *
 * @property Employee $employee
 * @property Service $service
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ServiceReport extends Model
{
    protected $table = 'service_employee_schedule';
    protected $primaryKey = 'service_employee_id';
    public $incrementing = false;
    public $timestamps = false;
    static $rules = [
		//'service_employee_id' => 'required',
		'time_entry' => 'required',
		'time_departure' => 'required',
		'lunchtime' => 'required',
		//'service_hours' => 'required',
		'hours_extras' => 'required',
		'hours_travel' => 'required',
		'date' => 'required',
		//'service_id' => 'required',
		//'employee_id' => 'required',
		'user_id' => 'required',
		//'date_registration' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['service_employee_id','time_entry','time_departure','lunchtime','service_hours','service_extras','duration_travel','date','user_id','date_registration'];
    //protected $fillable = ['service_employee_id','time_entry','time_departure','lunchtime','service_hours','service_extras','duration_travel','date_service','service_id','employee_id','user_id','date_registration'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function serviceEmployee()
    {
        return $this->hasOne('App\Models\ServiceEmployee', 'service_employee_id', 'service_employee_id');
    }   

}
