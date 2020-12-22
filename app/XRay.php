<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class XRay extends Model
{

    protected $table = 'x_rays';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';


    protected $fillable = ['name', 'file','patient_id'];

    
}