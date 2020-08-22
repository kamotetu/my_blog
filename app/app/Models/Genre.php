<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $guarded =
    [
        'id',
    ];

    public function articles()
    {
        return $this->belongsTo('App\Models\Article');
    }
}
