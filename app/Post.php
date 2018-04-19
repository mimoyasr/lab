<?php

namespace App;
use carbon;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title' , 'desc' , 'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getReadableDateAttribute()
    {
        return carbon\Carbon::parse($this->attributes['created_at'])->format('l jS \\of F Y h:i:s A');
    }
}
