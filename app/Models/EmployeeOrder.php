<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EmployeeOrder
 *
 * @property $service_order_id
 * @property $employee_id
 * @property $status_id
 * @property $user_id
 * @property $date_registration
 *
 * @property Employee $employee
 * @property ServiceOrder $serviceOrder
 * @property Status $status
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class EmployeeOrder extends Model
{
    protected $table = 'order_employee';
    protected $primaryKey = 'order_service_id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    static $rules = [
		'employee_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['employee_id','user_id'];
    //protected $fillable = ['order_service_id','employee_id','status_id','user_id','date_registration'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderEmployeeSchedules()
    {
        return $this->hasMany('App\Models\OrderEmployeeSchedule', 'order_service_id', 'order_service_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderEmployeeSchedules2()
    {
        return $this->hasMany('App\Models\OrderEmployeeSchedule', 'employee_id', 'employee_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function orderService()
    {
        return $this->hasOne('App\Models\OrderService', 'order_service_id', 'order_service_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function status()
    {
        return $this->hasOne('App\Models\Status', 'status_id', 'status_id');
    }
    

}
