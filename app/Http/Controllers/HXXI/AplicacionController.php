<?php

namespace App\Http\Controllers\HXXI;

use App\Http\Controllers\Controller;

use App\Modelos\HXXI\hxxi_aplicacion;
use Illuminate\Http\Request;

class AplicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aplicaciones = Hxxi_Aplicacion::latest()->paginate(5);

        return view('HXXI.aplicaciones.index',compact('aplicaciones'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        return view('HXXI.aplicaciones.crear');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Hxxi_Aplicacion::create($request->all());

        return redirect()->route('hxxi.aplicaciones.index')
            ->with('success','Aplicación creada correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modelos\HXXI\hxxi_aplicacion  $hxxi_aplicacion
     * @return \Illuminate\Http\Response
     */
    public function mostrar(hxxi_aplicacion $hxxi_aplicacion)
    {
        return view('HXXI.aplicaciones.mostrar',compact('hxxi_aplicacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modelos\HXXI\hxxi_aplicacion  $hxxi_aplicacion
     * @return \Illuminate\Http\Response
     */
    public function editar(hxxi_aplicacion $hxxi_aplicacion)
    {
        return view('HXXI.aplicaciones.editar',compact('hxxi_aplicacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modelos\HXXI\hxxi_aplicacion  $hxxi_aplicacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, hxxi_aplicacion $hxxi_aplicacion)
    {
        $request->validate(['Nombre' => 'required',
                           ]);

        $hxxi_aplicacion->update($request->all());

        return redirect()->route('hxxi.aplicaciones.index')
            ->with('message','Aplicación modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modelos\HXXI\hxxi_aplicacion  $hxxi_aplicacion
     * @return \Illuminate\Http\Response
     */
    public function delete(hxxi_aplicacion $hxxi_aplicacion)
    {
        $hxxi_aplicacion->delete();

        return redirect()->route('hxxi.aplicaciones.index')
            ->with('success','Aplicación borrada correctamente');
    }
}
