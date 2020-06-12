<?php

namespace App\Modelos\HXXI;

use Illuminate\Database\Eloquent\Model;

class Hxxi_Idioma extends Model
{
    protected $table = 'hxxi_idiomas';

    protected $fillable = ['nombre', 'ansi', 'idioma', 'pais'
    ];

}
