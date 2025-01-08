<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = ['blogger_id', 'blog_id'];

    public function blogger()
    {
        return $this->belongsTo(Blogger::class);
    }

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}
