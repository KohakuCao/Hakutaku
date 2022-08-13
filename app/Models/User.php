<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
	    'sex',
	    'school',
	    'phone',
	    'role',
	    'grade',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

	public static function getAuthor($id)
	{
		$user = self::find($id);
		return [
			'id'     => $user->id,
			'name'   => $user->name,
			'email'  => $user->email,
			'url'    => '',  // Optional
			'avatar' => 'gravatar',  // Default avatar
			'admin'  => $user->role == 2, // bool
		];
	}
}
