<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class PublicManager extends Model
{
    use Notifiable;
    public $guarded = [];

    public function publicCompany()
    {
        return $this->belongsTo(PublicCompany::class);
    }
}
