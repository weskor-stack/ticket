<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ServiceOrder
 *
 * @property $service_order_id
 * @property $date_order
 * @property $ticket_id
 * @property $type_maintenance_id
 * @property $type_service_id
 * @property $status_order_id
 * @property $user_id
 * @property $date_registration
 *
 * @property EmployeeOrder[] $employeeOrders
 * @property MaterialAssigned[] $materialAssigneds
 * @property OrderStatus $orderStatus
 * @property Service[] $services
 * @property Ticket $ticket
 * @property ToolAssigned[] $toolAssigneds
 * @property TypeMaintenance $typeMaintenance
 * @property TypeService $typeService
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ServiceOrder extends Model
{
    protected $table = 'order_service';
    protected $primaryKey = 'order_service_id';
    public $incrementing = false;
    public $timestamps = false;
    static $rules = [
		//'service_order_id' => 'required',
		'date_order' => 'required',
		//'ticket_id' => 'required',
		'type_maintenance_id' => 'required',
		'type_service_id' => 'required',
		//'status_order_id' => 'required',
		//'user_id' => 'required',
		//'date_registration' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['date_order', 'ticket_id', 'type_maintenance_id','type_service_id','user_id'];
    //protected $fillable = ['service_order_id','date_order','ticket_id','type_maintenance_id','type_service_id','status_order_id','user_id','date_registration'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderActivitySpecifics()
    {
        return $this->hasMany('App\Models\OrderActivitySpecific', 'order_service_id', 'order_service_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderEmployees()
    {
        return $this->hasMany('App\Models\OrderEmployee', 'order_service_id', 'order_service_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderMaterials()
    {
        return $this->hasMany('App\Models\OrderMaterial', 'order_service_id', 'order_service_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderSchedules()
    {
        return $this->hasMany('App\Models\OrderSchedule', 'order_service_id', 'order_service_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function orderStatus()
    {
        return $this->hasOne('App\Models\OrderStatus', 'order_status_id', 'order_status_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderTools()
    {
        return $this->hasMany('App\Models\OrderTool', 'order_service_id', 'order_service_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function services()
    {
        return $this->hasMany('App\Models\Service', 'order_service_id', 'order_service_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ticket()
    {
        return $this->hasOne('App\Models\Ticket', 'ticket_id', 'ticket_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function typeMaintenance()
    {
        return $this->hasOne('App\Models\TypeMaintenance', 'type_maintenance_id', 'type_maintenance_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function typeService()
    {
        return $this->hasOne('App\Models\TypeService', 'type_service_id', 'type_service_id');
    }
    
}
