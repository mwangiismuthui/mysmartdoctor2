<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{

    protected $table = 'doctors';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    // protected $fillable = ['given_name', 'family_name', 'email', 'languages_spoken', 'education', 'mobile_no', 'alternative_mobile_no', 'private_practice_address', 'qualification', 'professional_experiences'];

    protected $guarded = ['oldimage', 'oldsignature', 'password'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function treatment()
    {
        return $this->hasMany('App\TreatmentInformation');
    }
    public function prescription()
    {
        return $this->hasMany('App\Prescription');
    }
    public function account()
    {
        return $this->hasOne('App\Account');
    }

}