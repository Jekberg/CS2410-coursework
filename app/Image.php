<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * The {@code Image} class is a {@link Model} objec which represents an images
 * in a relational database.
 */
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
