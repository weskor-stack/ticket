<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MaterialUsed
 *
 * @property $material_used_id
 * @property $material_id
 * @property $quantity
 * @property $service_id
 * @property $user_id
 * @property $date_registration
 *
 * @property Material $material
 * @property MaterialUsedCost[] $materialUsedCosts
 * @property Service $service
 * @property TaskSpecificMaterial[] $taskSpecificMaterials
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class MaterialUsed extends Model
{
    protected $table = 'service_material';
    protected $primaryKey = 'service_material_id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    static $rules = [
		//'service_material_id' => 'required',
		'material_id' => 'required',
		'quantity' => 'required',
		'service_id' => 'required',
		'user_id' => 'required',
		//'date_registration' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['material_id','quantity','service_id','user_id'];
    //protected $fillable = ['service_material_id','quantity','service_id','material_id','user_id','date_registration'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function material()
    {
        return $this->hasOne('App\Models\Material', 'material_id', 'material_id');
    }
    
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
    public function serviceMaterialCosts()
    {
        return $this->hasMany('App\Models\ServiceMaterialCost', 'service_material_id', 'service_material_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function serviceTaskGeneralMaterials()
    {
        return $this->hasMany('App\Models\ServiceTaskGeneralMaterial', 'service_material_id', 'service_material_id');
    }
    

}
