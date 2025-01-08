<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $fillable = [
        'consultant_id', 'first_name', 'last_name', 'email', 'social_media_bio',
        'phone_number', 'city', 'state', 'country', 'company_name',
        'company_website', 'company_description', 'heard_about_us',
        'services_of_interest', 'project_location', 'project_start_date',
        'project_description', 'uploaded_file_path', 'status',
    ];

    // Relationship with Consultant
    public function consultant()
    {
        return $this->belongsTo(Consultant::class);
    }
}

