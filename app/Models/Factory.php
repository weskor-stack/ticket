<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Customer
 *
 * @property $factory_id
 * @property $key
 * @property $name
 * @property $address
 * @property $customer_id
 * @property $contact_id
 * @property $user_id
 * @property $date_registration
 *
 * @property Contact $contact
 * @property Customer $customer
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Factory extends Model
{
    protected $connection = 'Customer';
    protected $table = 'factory';
    protected $primaryKey = 'factory_id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    static $rules = [
    'key' => 'required',
		'name' => 'required',
		'address' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['key','name','address'];
    // protected $fillable = ['factory_id','key','name','address','customer_id','contact_id','user_id','date_registration'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function contact()
    {
        return $this->hasOne('App\Models\Contact', 'contact_id', 'contact_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function customer()
    {
        return $this->hasOne('App\Models\Customer', 'customer_id', 'customer_id');
    }
    
}
