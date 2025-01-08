<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'content',
        'photos1',
        'photos2',
        'blogger_id',
        'status', // Add status for mass assignment
        'rejection_reason', // Add rejection reason
    ];

    public function blogger()
    {
        return $this->belongsTo(\App\Models\Blogger::class, 'blogger_id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }


}
