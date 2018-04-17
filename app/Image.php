<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * The attributes which are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'event_id'
    ];
}
