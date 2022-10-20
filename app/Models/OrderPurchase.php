<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderPurchase
 *
 * @property $order_service_id
 * @property $purchase_id
 * @property $key
 * @property $user_id
 * @property $date_registration
 *
 * @property OrderService $orderService
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class OrderPurchase extends Model
{
    protected $table = 'order_purchase';
    protected $primaryKey = 'purchase_id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    static $rules = [
		'key' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['order_service_id','purchase_id','key','user_id','date_registration'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function orderService()
    {
        return $this->hasOne('App\Models\OrderService', 'order_service_id', 'order_service_id');
    }
    

}
