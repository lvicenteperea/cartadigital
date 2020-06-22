<?php

namespace App\Modelos\HXXI;

use Illuminate\Database\Eloquent\Model;

class Hxxi_Users extends Model
{
    protected $table = 'hxxi_users';

    protected $fillable = ['id_aplicacion', 'id_user_jefe', 'id_empresa', 'role',
                           'nombre', 'apellidos', 'nick', 'email', 'password', 'imagen'
    ];

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
