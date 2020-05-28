<?php

namespace App\Helpers;
  
use Illuminate\Support\Facades\DB;

// https://victorroblesweb.es/2018/01/18/crear-helpers-en-laravel-5/

class Varios {
    public static function mostrarError($mensaje){
        echo '<span class="invalid-feedback" role="alert">';
        echo '<strong>'. $mensaje .'</strong>';
        echo '</span>';

    }
}