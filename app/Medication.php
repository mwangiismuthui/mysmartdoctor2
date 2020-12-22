<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{

    protected $table = 'medications';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';


    protected $fillable = ['medication','patient_id','file'];

    
}