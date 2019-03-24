<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function incomingInvites()
    {
        return $this->hasMany('\App\Invite', 'to');
    }

    public function outcomingInvites()
    {
        return $this->hasMany('\App\Invite', 'from');
    }

    public function outcomingInvite()
    {
        return $this->hasOne('\App\Invite', 'from');
    }

    public function countIncomingInvites()
    {
        return $this->incomingInvites->where('status', '<>', 2)->count();
    }

}
