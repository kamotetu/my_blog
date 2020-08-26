<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = 
    [
        'id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag')->withTimestamps();
    }

    public function genre()
    {
        return $this->belongsTo('App\Models\Genre');
    }

}
