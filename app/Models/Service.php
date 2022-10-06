<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Service
 *
 * @property $service_id
 * @property $date_service
 * @property $status_report_id
 * @property $order_service_id
 * @property $user_id
 * @property $date_registration
 *
 * @property MaterialUsed[] $materialUseds
 * @property ReportStatus $reportStatus
 * @property ServiceOrder $serviceOrder
 * @property ServiceReport[] $serviceReports
 * @property ServiceTaskSpecific $serviceTaskSpecific
 * @property ToolUsed[] $toolUseds
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Service extends Model
{
    protected $table = 'service';
    protected $primaryKey = 'service_id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    static $rules = [
		//'service_id' => 'required',
		//'date_service' => 'required',
		//'service_status_id' => 'required',
		//'order_service_id' => 'required',
		//'user_id' => 'required',
		//'date_registration' => 'required',
    ];

    protected $perPage = 20;

     /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function orderService()
    {
        return $this->hasOne('App\Models\OrderService', 'order_service_id', 'order_service_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function serviceEmployees()
    {
        return $this->hasMany('App\Models\ServiceEmployee', 'service_id', 'service_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function serviceMaterials()
    {
        return $this->hasMany('App\Models\ServiceMaterial', 'service_id', 'service_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function serviceStatus()
    {
        return $this->hasOne('App\Models\ServiceStatus', 'service_status_id', 'service_status_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function serviceTask()
    {
        return $this->hasOne('App\Models\ServiceTask', 'service_id', 'service_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function serviceTools()
    {
        return $this->hasMany('App\Models\ServiceTool', 'service_id', 'service_id');
    }
    

}
