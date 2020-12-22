<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingFee extends Model
{

    protected $table = 'booking_fees';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';


    protected $fillable = ['professional_fee','service_charge'];


}
