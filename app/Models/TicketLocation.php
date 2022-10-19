<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TicketLocation
 *
 * @property $ticket_id
 * @property $factory_id
 * @property $site
 * @property $location
 * @property $user_id
 * @property $date_registration
 *
 * @property Ticket $ticket
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TicketLocation extends Model
{
    protected $table = 'ticket_location';
    protected $primaryKey = 'ticket_id';
    public $incrementing = false;
    public $timestamps = false;
    static $rules = [
		'factory_id' => 'required',
		'location' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['ticket_id','factory_id','site','location','user_id','date_registration'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ticket()
    {
        return $this->hasOne('App\Models\Ticket', 'ticket_id', 'ticket_id');
    }
    

}
