<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{

    protected $table = 'patients';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    protected $guarded = ['email', 'password', 'oldimage1', 'oldimage2', 'oldimage3', 'oldimage4', 'oldimage5', 'oldimage6', 'oldimage7', 'oldimage8', 'oldRadilogy_views', 'oldDrugs'];

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