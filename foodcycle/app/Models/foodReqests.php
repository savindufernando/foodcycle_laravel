<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class foodReqests extends Model
{
    protected $fillable = [
        'type', 'title', 'purpose', 'beneficiaries', 'completed', 'organization_name', 'Org_location'
    ];

    public function donors()
    {
        return $this->hasMany(Donor::class, 'food_request_id', 'id');
    }
}
