<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = "id_user";

    protected $fillable = [
        'nama', 
        'jk', 
        'no_hp', 
        'jabatan', 
        'avatar',
        'roles', 
        'username', 
        'password',
        'is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'username',
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        
    ];


    public function kegiatan()
    {
        return $this->hasMany('\App\Models\Kegiatan', 'id_user');
    }

    public function komentar()
    {
        return $this->hasMany('\App\Models\Komentar', 'id_user');
    }
}
