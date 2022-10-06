<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ToolUsed
 *
 * @property $tool_used_id
 * @property $tool_id
 * @property $quantity
 * @property $service_id
 * @property $user_id
 * @property $date_registration
 *
 * @property Service $service
 * @property TaskSpecificTool[] $taskSpecificTools
 * @property Tool $tool
 * @property ToolUsedCost[] $toolUsedCosts
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ToolUsed extends Model
{
    protected $table = 'service_tool';
    protected $primaryKey = 'service_tool_id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    static $rules = [
		//'service_tool_id' => 'required',
		'tool_id' => 'required',
		'quantity' => 'required',
		'service_id' => 'required',
		//'user_id' => 'required',
		//'date_registration' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tool_id','quantity','service_id'];
    //protected $fillable = ['service_tool_id','quantity','service_id','tool_id','user_id','date_registration'];


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
    public function serviceTaskGeneralTools()
    {
        return $this->hasMany('App\Models\ServiceTaskGeneralTool', 'service_tool_id', 'service_tool_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function serviceToolCosts()
    {
        return $this->hasMany('App\Models\ServiceToolCost', 'service_tool_id', 'service_tool_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tool()
    {
        return $this->hasOne('App\Models\Tool', 'tool_id', 'tool_id');
    }
    

}
