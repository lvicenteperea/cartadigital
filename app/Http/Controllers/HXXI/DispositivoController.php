<?php

namespace App\Http\Controllers\HXXI;

use App\Http\Controllers\Controller;

use App\Modelos\HXXI\Hxxi_Dispositivo;
use Illuminate\Http\Request;

class DispositivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dispositivos = Hxxi_Dispositivo::latest()->paginate(5);

        return view('HXXI.dispositivos.index',compact('dispositivos'))
            ->with('i', (request()->input('page', 1) - 1) * 1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        return view('HXXI.dispositivos.crear');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate(['nombre' => 'required|min:3|max:255',
                           ]);

        $disp = new Hxxi_Dispositivo();
        $disp->nombre = $request->input('nombre');
        $disp->save();

        return redirect()->route('hxxi.dispositivos.index')
            ->with('success','Dispositivo creada correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modelos\HXXI\Hxxi_Dispositivo  $hxxi_dispositivo
     * @return \Illuminate\Http\Response
     */
    public function mostrar($id)
    {

        $dispositivo = Hxxi_Dispositivo::find($id);


        return view('HXXI.dispositivos.mostrar',['hxxi_dispositivo' => $dispositivo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modelos\HXXI\Hxxi_Dispositivo  $hxxi_dispositivo
     * @return \Illuminate\Http\Response
     */
    public function editar(Hxxi_Dispositivo $hxxi_dispositivo)
    {
        return view('HXXI.dispositivos.editar',compact('hxxi_dispositivo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modelos\HXXI\Hxxi_Dispositivo  $hxxi_dispositivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hxxi_Dispositivo $hxxi_dispositivo)
    {
        $request->validate(['nombre' => 'required|min:3|max:255',
                           ]);
        $hxxi_dispositivo->nombre = $request->input('nombre');

        $hxxi_dispositivo->update();

        return redirect()->route('hxxi.dispositivos.index')
            ->with('message','Dispositivo modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modelos\HXXI\Hxxi_Dispositivo  $hxxi_dispositivo
     * @return \Illuminate\Http\Response
     */
    public function delete(Hxxi_Dispositivo $hxxi_dispositivo)
    {

        $hxxi_dispositivo->delete();

        return redirect()->route('hxxi.dispositivos.index')
            ->with('success','Dispositivo borrada correctamente');
    }
}
