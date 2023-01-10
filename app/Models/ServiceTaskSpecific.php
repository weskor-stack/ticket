<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ServiceTaskSpecific
 *
 * @property $service_id
 * @property $description_task
 * @property $previous_evidence
 * @property $subsequent_evidence
 * @property $signature_evidence
 * @property $contact_id
 * @property $employee_id
 * @property $user_id
 * @property $date_registration
 *
 * @property Contact $contact
 * @property Employee $employee
 * @property Service $service
 * @property TaskSpecificReport[] $taskSpecificReports
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ServiceTaskSpecific extends Model
{
    protected $table = 'service_task';
    protected $primaryKey = 'service_id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    static $rules = [
		//'service_id' => 'required',
		'description' => 'required',
		'previous_evidence' => 'required',
		'subsequent_evidence' => 'required',//|image|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
		'signature_evidence' => 'required',
		//'contact_id' => 'required',
		//'employee_id' => 'required',
		'user_id' => 'required',
		//'date_registration' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['previous_evidence','subsequent_evidence','signature_evidence'];
    //protected $fillable = ['service_id','description','previous_evidence','subsequent_evidence','signature_evidence','contact_id','employee_id','user_id','date_registration'];


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
    public function serviceTaskGenerals()
    {
        return $this->hasMany('App\Models\ServiceTaskGeneral', 'service_id', 'service_id');
    }
    

}
