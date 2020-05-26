<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\Emp_Local;

class Emp_LocalController extends Controller
{
    public function index($id){
        //$locales = Emp_Local::find($id);
        $locales = Emp_Local::all();

        return view('empresa.lista_locales'
                  ,['locales' => $locales]
                   );
    }
}
