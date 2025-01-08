<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Consultant extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'address',
        'province',
        'contact_no',
        'bio',
        'education',
        'qualifications',
        'email',
        'password',
        'skills',
        'sub_skills',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    // Relationship with Requests
    public function requests()
    {
        return $this->hasMany(Request::class);
    }
}
