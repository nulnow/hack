<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    protected $table = 'invites';

    public function inviter()
    {
        return $this->belongsTo('\App\User', 'from');
    }

    public function invited()
    {
        return $this->belongsTo('\App\User', 'to');
    }
}
