<?php

namespace App\Http\Controllers\HXXI;

use App\Http\Controllers\Controller;

use App\Modelos\HXXI\Hxxi_Texto;
use Illuminate\Http\Request;

class TextoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $textos = Hxxi_Texto::orderBy('id', 'ASC')->paginate(5);

        return view('hxxi.textos.index',compact('textos'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        return view('hxxi.textos.crear');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate(['descripcion' => 'required|min:3|max:255',
                            'division' => 'required|in:WEB,TABLAS,OTROS',
                            'subdivision' => 'required|min:3|max:100',
                           ]);

        $texto = new Hxxi_Texto();
        $texto->descripcion = $request->input('descripcion');
        $texto->division = $request->input('division');
        $texto->subdivision = $request->input('subdivision');
        $texto->save();

        return redirect()->route('hxxi.textos.index')
            ->with('success','Texto creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  $id de texto
     * @return \Illuminate\Http\Response
     */
    public function mostrar($id)
    {

        $texto = Hxxi_Texto::find($id);

        return view('hxxi.textos.mostrar',['hxxi_texto' => $texto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modelos\HXXI\Hxxi_Texto  $hxxi_texto
     * @return \Illuminate\Http\Response
     */
    public function editar(Hxxi_Texto $hxxi_texto)
    {
        return view('hxxi.textos.editar',compact('hxxi_texto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modelos\HXXI\Hxxi_Texto  $hxxi_texto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hxxi_Texto $hxxi_texto)
    {
        $request->validate(['descripcion' => 'required|min:3|max:255',
                            'division' => 'required|in:WEB,TABLAS,OTROS',
                            'subdivision' => 'required|min:3|max:100',
                           ]);

        $hxxi_texto->descripcion = $request->input('descripcion');
        $hxxi_texto->division   = $request->input('division');
        $hxxi_texto->subdivision = $request->input('subdivision');

        $hxxi_texto->update();

        return redirect()->route('hxxi.textos.index')
            ->with('message','Texto modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modelos\HXXI\Hxxi_Texto  $hxxi_texto
     * @return \Illuminate\Http\Response
     */
    public function delete(Hxxi_Texto $hxxi_texto)
    {

        $hxxi_texto->delete();

        return redirect()->route('hxxi.textos.index')
            ->with('success','Texto borrada correctamente');
    }
}
