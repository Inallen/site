<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Illusion extends Model
{
    protected $fillable = [
        'illusion_owner',
        'title',
        'slug',
        'excerpt',
        'thumbnail',
        'content',
        'illusion_priority',
        'illusion_type',
        'illusion_status',
    ];
}
