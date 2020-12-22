<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorAvailable extends Model
{

    protected $table = 'doctor_availables';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';


    protected $fillable = ['starting_time', 'ending_time', 'date', 'doctor_id'];

    public function doctor()
    {
        return $this->belongsTo('App\Doctor');
    }
    
}
