<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{

    protected $table = 'chats';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';


    protected $fillable = ['from', 'to', 'content'];

    public function fromUser()
    {
        return $this->belongsTo('App\User', 'from');
    }
    public function toUser()
    {
        return $this->belongsTo('App\User', 'to');
    }
}