<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TicketProject
 *
 * @property $ticket_id
 * @property $project_id
 * @property $user_id
 * @property $date_registration
 *
 * @property Ticket $ticket
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TicketProject extends Model
{
    protected $table = 'ticket_project';
    protected $primaryKey = 'ticket_id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    static $rules = [
		'ticket_id' => 'required',
		'project_id' => 'required',
		'user_id' => 'required',
		'date_registration' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['ticket_id','project_id','user_id','date_registration'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ticket()
    {
        return $this->hasOne('App\Models\Ticket', 'ticket_id', 'ticket_id');
    }
    

}
