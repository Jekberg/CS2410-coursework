<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * The {@code Event} class is a subclass of the {@link Model} class, and is and
 * object representation of an event stored in a relational database.
 */
class Event extends Model
{
	/**
	 * The attributes which are mass assignnable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'category',
        'name',
		'description',
		'date',
		'time',
		'address',
		'postcode',
		'user_id'
    ];
	/**
	 * Get the {@link App\User} object which <code>$this</code> {@code Event}
	 * object belongs to.
	 *
	 * @return The {@link App\User} which created <code>$this</code>
	 * 			{@code Event}.
	 */
	public function user()
	{
		return $this->belongsTo('App\User');
	}
	/**
	 * Get all the {@link App\Image} objects which belong to <code>$this</code>
	 * {@code Event}.
	 *
	 * @return The {@link App\Image} which belong to <code>$this</code>
	 * 			{@code Event}.
	 */
	public function images()
	{
		return $this->hasMany('App\Image');
	}
}
