<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Blogger extends Model implements AuthenticatableContract
{
    use Authenticatable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'job_title',
        'location',
        'description',
        'profile_pic',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Define relationship with Blog
    public function blogs()
    {
        return $this->hasMany(\App\Models\Blog::class, 'blogger_id');
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

}
