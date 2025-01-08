<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class DeliveryUser extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'full_name', 'dob', 'gender', 'contact_number', 'profile_photo',
        'vehicle_type', 'vehicle_model', 'vehicle_reg_number', 'vehicle_color', 'vehicle_photo',
        'id_number', 'license_number', 'license_expiry', 'photo_id', 'driving_license',
        'bank_account_name', 'bank_account_number', 'bank_name', 'branch_name',
        'emergency_contact_name', 'emergency_contact_number', 'location', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}