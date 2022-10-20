<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Ticket
 *
 * @property $ticket_id
 * @property $subject
 * @property $problem
 * @property $date_ticket
 * @property $status_ticket_id
 * @property $customer_id
 * @property $contact_id
 * @property $priority_id
 * @property $user_id
 * @property $date_registration
 *
 * @property Contact $contact
 * @property Customer $customer
 * @property Priority $priority
 * @property ServiceOrder[] $serviceOrders
 * @property TicketStatus $ticketStatus
 * @property TicketTracking[] $ticketTrackings
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Ticket extends Model
{
    protected $table = 'ticket';
    protected $primaryKey = 'ticket_id';
    public $incrementing = false;
    public $timestamps = false;
    static $rules = [
		'subject' => 'required',
		'problem' => 'required',
		//'status_ticket_id' => 'required',
		'customer_id' => 'required',
		'contact_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['subject', 'ticket_id','problem','customer_id','contact_id','user_id','ticket_priority_id'];
    //protected $fillable = ['subject','problem','date_ticket','customer_id','contact_id','ticket_priority_id','user_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderServices()
    {
        return $this->hasMany('App\Models\OrderService', 'ticket_id', 'ticket_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ticketContacts()
    {
        return $this->hasMany('App\Models\TicketContact', 'ticket_id', 'ticket_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ticketContactNotifies()
    {
        return $this->hasMany('App\Models\TicketContactNotify', 'ticket_id', 'ticket_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ticketCustomers()
    {
        return $this->hasMany('App\Models\TicketCustomer', 'ticket_id', 'ticket_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ticketOrigin()
    {
        return $this->hasOne('App\Models\TicketOrigin', 'ticket_origin_id', 'ticket_origin_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ticketPriority()
    {
        return $this->hasOne('App\Models\Priority', 'ticket_priority_id', 'ticket_priority_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ticketProjects()
    {
        return $this->hasMany('App\Models\TicketProject', 'ticket_id', 'ticket_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ticketStatus()
    {
        return $this->hasOne('App\Models\TicketStatus', 'ticket_status_id', 'ticket_status_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ticketTrackings()
    {
        return $this->hasMany('App\Models\TicketTracking', 'ticket_id', 'ticket_id');
    }

}
