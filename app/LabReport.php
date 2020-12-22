<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LabReport extends Model
{

    protected $table = 'lab_reports';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';


    protected $fillable = ['report_name', 'file', 'patient_id'];

    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }
    
}
