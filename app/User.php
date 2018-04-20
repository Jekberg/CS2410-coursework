<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * Get the {@link App\Event} objects which <code>$this</code> {@code User}
     * owns.
     *
     * @return The {@link App\Event} objects which <code>$this</code>
     *          {@code User} object owns.
     */
	public function events()
	{
		return $this->hasMany('App\Event');
	}
}
