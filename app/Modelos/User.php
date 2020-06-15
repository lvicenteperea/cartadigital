<?php

namespace App\Modelos;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'hxxi_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role', 'id_user_jefe', 'nombre', 'apellidos', 'nick', 'email', 'password', 'id_empresa', 'imagen', 'id_aplicacion',
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


    // Indicamos relación One to One
    public function users(){
        return $this->hasOne('App\Modelos\User', 'id_user_jefe');
    }

    // Indicamos relación One to One
    public function emp_empresas(){
        return $this->hasOne('App\Modelos\Emp\Emp_Empresa', 'id_empresa');
    }

    // Indicamos relación One to One
    public function hxxi_aplicaciones(){
        return $this->hasOne('App\Modelos\HXXI\Hxxi_Aplicacion', 'id_aplicacion');
    }

}
