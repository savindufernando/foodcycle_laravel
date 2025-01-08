<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class donor extends Model
{
    protected $fillable = [
        'food_request_id',
        'location',
        'donor_name',
        'donor_email',
        'phone_number',
        'items',
        'schedule',
        'accept_id',
        'delivery_status',
    ];

    protected $casts = [
        'items' => 'array', // Cast JSON items to an array
        'delivery_status' => 'boolean', // Cast delivery_status to boolean
    ];

    public function foodRequest()
    {
        return $this->belongsTo(foodReqests::class, 'food_request_id', 'id');
    }
}
