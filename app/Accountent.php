<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Accountent extends Model
{
    use Notifiable;

    protected $fillable = ['user_id','name','phone','email','address','bank_name','iban_name','iban'];
}

