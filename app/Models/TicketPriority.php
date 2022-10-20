<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TicketPriority
 *
 * @property $ticket_priority_id
 * @property $name
 * @property $user_id
 * @property $date_registration
 *
 * @property Ticket[] $tickets
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TicketPriority extends Model
{
    protected $table = 'ticket_priority';
    protected $primaryKey = 'ticket_priority_id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    static $rules = [
		'ticket_priority_id' => 'required',
		'name' => 'required',
		'user_id' => 'required',
		'date_registration' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['ticket_priority_id','name','user_id','date_registration'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tickets()
    {
        return $this->hasMany('App\Models\Ticket', 'ticket_priority_id', 'ticket_priority_id');
    }
    

}
