<?php

namespace App\Http\Controllers\HXXI;

use App\Http\Controllers\Controller;

use App\Modelos\HXXI\Hxxi_Texto_Idioma;
use Illuminate\Http\Request;

class TextoIdiomaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $textos = Hxxi_Texto_Idioma::orderBy('id', 'ASC')->paginate(5);

        return view('hxxi.txt_idiomas.index',compact('textos'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        return view('hxxi.txt_idiomas.crear');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate(['id_texto' => 'required',
                            'id_idioma' => 'required',
                            'texto' => 'required',
        ]);

        $texto = new Hxxi_Texto_Idioma();
        $texto->id_texto = $request->input('id_texto');
        $texto->id_idioma = $request->input('id_idioma');
        $texto->texto = $request->input('texto');
        $texto->save();

        return redirect()->route('hxxi.txt_idiomas.index')
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

        $texto = Hxxi_Texto_Idioma::find($id);

        return view('hxxi.txt_idiomas.mostrar',['hxxi_texto_idioma' => $texto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modelos\HXXI\Hxxi_Texto_Idioma  $hxxi_texto_idioma
     * @return \Illuminate\Http\Response
     */
    public function editar(Hxxi_Texto_Idioma $hxxi_texto_idioma)
    {
        return view('hxxi.txt_idiomas.editar',compact('hxxi_texto_idioma'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modelos\HXXI\Hxxi_Texto_Idioma  $hxxi_texto_idioma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hxxi_Texto_Idioma $hxxi_texto_idioma)
    {
        $request->validate(['id_texto' => 'required',
                            'id_idioma' => 'required',
                            'texto' => 'required',
        ]);

        $hxxi_texto->id_texto = $request->input('id_texto');
        $hxxi_texto->id_idioma = $request->input('id_idioma');
        $hxxi_texto->texto = $request->input('texto');

        $hxxi_texto->update();

        return redirect()->route('hxxi.txt_idiomas.index')
            ->with('message','Texto modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modelos\HXXI\Hxxi_Texto_Idioma  $hxxi_texto_idioma
     * @return \Illuminate\Http\Response
     */
    public function delete(Hxxi_Texto_Idioma $hxxi_texto_idioma)
    {

        $hxxi_texto_idioma->delete();

        return redirect()->route('hxxi.txt_idiomas.index')
            ->with('success','Texto borrada correctamente');
    }
}
