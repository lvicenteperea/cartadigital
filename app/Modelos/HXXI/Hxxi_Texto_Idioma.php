<?php

namespace App\Modelos\HXXI;

use Illuminate\Database\Eloquent\Model;

class Hxxi_Texto_Idioma extends Model
{
    protected $table = 'hxxi_textos_idiomas';

    protected $fillable = ['id_idioma', 'texto'
    ];

}
