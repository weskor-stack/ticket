<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MaterialAssigned
 *
 * @property $material_assigned_id
 * @property $material_id
 * @property $quantity
 * @property $service_order_id
 * @property $user_id
 * @property $date_registration
 *
 * @property Material $material
 * @property ServiceOrder $serviceOrder
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class MaterialAssigned extends Model
{
    protected $table = 'order_material';
    protected $primaryKey = 'order_material_id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    static $rules = [
		'material_id' => 'required',
		'quantity' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['material_id','quantity'];
    //protected $fillable = ['order_material_id','quantity','order_service_id','material_id','user_id','date_registration'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function material()
    {
        return $this->hasOne('App\Models\Material', 'material_id', 'material_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderMaterialCosts()
    {
        return $this->hasMany('App\Models\OrderMaterialCost', 'order_material_id', 'order_material_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function orderService()
    {
        return $this->hasOne('App\Models\OrderService', 'order_service_id', 'order_service_id');
    }
    
    

}
