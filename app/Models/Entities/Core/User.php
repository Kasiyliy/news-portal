<?php

namespace App\Models\Entities\Core;

use App\Models\Entities\Support\AppFile;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject ,MustVerifyEmail
{
    public const DEFAULT_RESOURCE_DIRECTORY = 'images/avatars';

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'role_id',
        'avatar_file_id',
        'iin'
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }


    public function avatar()
    {
        return $this->belongsTo(AppFile::class, 'avatar_file_id');
    }
    public function getAvatar()
    {
        return $this->avatar->system_url;
    }

    public function isAdmin()
    {
        return $this->role_id == Role::ADMIN_ID;
    }




}
