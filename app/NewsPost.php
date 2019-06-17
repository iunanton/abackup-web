<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsPost extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'locale', 'content',
    ];
}
