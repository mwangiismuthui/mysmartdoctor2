<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{

    protected $table = 'prescriptions';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';


    protected $fillable = ['doctor_id', 'patient_id', 'prescription',
    'name',
    'age',
    'sex',
    'drug_name',
    'drug_name2',
    'drug_name3',
    'drug_name4',
    'drug_name5',
    'drug_name6',
    'drug_name7',
    'frequency',
    'frequency2',
    'frequency3',
    'frequency4',
    'frequency5',
    'frequency6',
    'frequency7',
    'number_of_days',
    'number_of_days2',
    'number_of_days3',
    'number_of_days4',
    'number_of_days5',
    'number_of_days6',
    'number_of_days7',
    'allergy',
    'instructions',
    'dr_name',
    'registration_number',
    'digital_signature',
];

    public function doctor()
    {
        return $this->belongsTo('App\Doctor');
    }
    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }
    
}
