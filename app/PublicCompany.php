<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class PublicCompany extends Model
{
    use Notifiable;
    public $guarded = [];

    public function publicManagers()
    {
        return $this->hasMany(PublicManager::class);
    }
}
