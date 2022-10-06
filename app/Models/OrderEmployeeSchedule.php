<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderEmployeeSchedule
 *
 * @property $order_employee_schedule_id
 * @property $time_entry
 * @property $time_departure
 * @property $lunchtime
 * @property $hours_service
 * @property $hours_travel
 * @property $date
 * @property $order_service_id
 * @property $employee_id
 * @property $user_id
 * @property $date_registration
 *
 * @property OrderEmployee $orderEmployee
 * @property OrderEmployee $orderEmployee
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class OrderEmployeeSchedule extends Model
{
    protected $table = 'order_employee_schedule';
    protected $primaryKey = 'order_employee_schedule_id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    static $rules = [
		// 'order_employee_schedule_id' => 'required',
		'time_entry' => 'required',
		'time_departure' => 'required',
		'lunchtime' => 'required',
		'hours_service' => 'required',
		'hours_travel' => 'required',
		'date' => 'required',
		'order_service_id' => 'required',
		'employee_id' => 'required',
		'user_id' => 'required',
		// 'date_registration' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['order_employee_schedule_id','time_entry','time_departure','lunchtime','hours_service','hours_travel','date','order_service_id','employee_id','user_id','date_registration'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function orderEmployee()
    {
        return $this->hasOne('App\Models\OrderEmployee', 'order_service_id', 'order_service_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function orderEmployee2()
    {
        return $this->hasOne('App\Models\OrderEmployee', 'employee_id', 'employee_id');
    }
    

}
