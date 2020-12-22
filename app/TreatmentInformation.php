<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TreatmentInformation extends Model
{

    protected $table = 'treatment_informations';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    protected $fillable = ['patient_id', 'treatment', 'time', 'cost', 'total_paid', 'balance', 'doctor_id'];

    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }
    public function doctor()
    {
        return $this->belongsTo('App\Doctor');
    }
}