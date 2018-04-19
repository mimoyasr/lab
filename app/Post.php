<?php

namespace App;
use carbon;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use Sluggable;

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

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
