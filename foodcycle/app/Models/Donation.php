<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Donation extends Authenticatable 
{
    protected $fillable = [
        'orgname', 'regno', 'orgtype', 'regdate', 'authority',
        'name', 'position', 'email', 'phone', 'address',
        'description', 'beneficiaries', 'region', 'url', 
        'regcertificate', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
