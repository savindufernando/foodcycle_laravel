<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_id', 'name', 'email', 'address', 'city', 'phone', 'postal_code', 'payment_method', 'payment_status'
    ];

    public function items()
    {
        return $this->hasMany(PaymentItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}