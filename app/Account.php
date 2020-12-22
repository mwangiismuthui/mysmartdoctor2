<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{

    protected $table = 'accounts';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';


    protected $fillable = ['first_name', 'last_name', 'street_address', 'city', 'country', 'post_code', 'phone_number', 'email', 'card', 'expiry_date','doctor_id','account_holder_name','bankAccountNumber','name_of_the_bank','branch'];

    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }
    public function doctor()
    {
        return $this->belongsTo('App\Doctor');
    }
}
