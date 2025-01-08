<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'price',
        'stock',
        'description',
        'image',
        'status',
        'moved_at',
        'admin_id',
        'expiry_hours',
    ];

    // Check if product is expired
    public function isExpired()
    {
        $expiryDateTime = Carbon::parse($this->created_at)->addHours($this->expiry_hours);
        return Carbon::now()->greaterThanOrEqualTo($expiryDateTime);
    }

    // Get remaining hours until expiry
    public function getRemainingHoursAttribute()
    {
        $expiryDateTime = Carbon::parse($this->created_at)->addHours($this->expiry_hours);
        $remainingHours = Carbon::now()->diffInHours($expiryDateTime, false);
        return $remainingHours > 0 ? $remainingHours : 0;
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
