<?php

namespace App\Modelos\HXXI;

use Illuminate\Database\Eloquent\Model;

class Hxxi_Texto extends Model
{
    protected $table = 'hxxi_textos';

    protected $fillable = ['descripcion', 'division', 'subdivision'
    ];

}
