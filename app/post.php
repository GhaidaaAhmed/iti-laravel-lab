<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class post extends Model
{
    use Sluggable;
   //use SoftDeletes;
    protected $fillable = [
        'title',
        'description',
        'user_id',
        'slug'
    ];  
     
     public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


}
