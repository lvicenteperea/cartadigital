<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Emp_Local extends Model
{
    protected $table = 'emp_locales';

    /**
     * Relación uno a
     */
    public function emp_empresas()
    {
        return $this->hasMany('App\Modelos\Emp_Empresa', 'id_empresa');
    }
}
