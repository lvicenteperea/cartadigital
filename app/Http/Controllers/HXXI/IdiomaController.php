<?php

namespace App\Http\Controllers\HXXI;

use App\Http\Controllers\Controller;

use App\Modelos\HXXI\Hxxi_Idioma;
use Illuminate\Http\Request;

class IdiomaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idiomas = Hxxi_Idioma::orderBy('id', 'ASC')->paginate(5);

        return view('hxxi.idiomas.index',compact('idiomas'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        return view('hxxi.idiomas.crear');
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
                            'ansi' => 'required|max:5',
                            'idioma' => 'required|min:2|max:2',
                            'pais' => 'required|min:2|max:2',
                           ]);

        $idioma = new Hxxi_Idioma();
        $idioma->nombre = $request->input('nombre');
        $idioma->save();

        return redirect()->route('hxxi.idiomas.index')
            ->with('success','Idioma creada correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modelos\HXXI\Hxxi_Idioma  $Hxxi_Idioma
     * @return \Illuminate\Http\Response
     */
    public function mostrar($id)
    {

        $idioma = Hxxi_Idioma::find($id);

        return view('hxxi.idiomas.mostrar',['hxxi_idioma' => $idioma]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modelos\HXXI\Hxxi_Idioma  $Hxxi_Idioma
     * @return \Illuminate\Http\Response
     */
    public function editar(Hxxi_Idioma $Hxxi_Idioma)
    {
        return view('hxxi.idiomas.editar',compact('Hxxi_Idioma'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modelos\HXXI\Hxxi_Idioma  $Hxxi_Idioma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hxxi_Idioma $hxxi_idioma)
    {
        $request->validate(['nombre' => 'required|min:3|max:255',
                            'ansi' => 'required|max:5',
                            'idioma' => 'required|min:2|max:2',
                            'pais' => 'required|min:2|max:2',
                           ]);
        $hxxi_idioma->nombre = $request->input('nombre');
        $hxxi_idioma->ansi   = $request->input('ansi');
        $hxxi_idioma->idioma = $request->input('idioma');
        $hxxi_idioma->pais   = $request->input('pais');

        $hxxi_idioma->update();

        return redirect()->route('hxxi.idiomas.index')
            ->with('message','Idioma modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modelos\HXXI\Hxxi_Idioma  $Hxxi_Idioma
     * @return \Illuminate\Http\Response
     */
    public function delete(Hxxi_Idioma $hxxi_idioma)
    {

        $hxxi_idioma->delete();

        return redirect()->route('hxxi.idiomas.index')
            ->with('success','Idioma borrada correctamente');
    }
}
