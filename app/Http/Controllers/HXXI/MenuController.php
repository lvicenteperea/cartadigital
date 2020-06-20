<?php

namespace App\Http\Controllers\HXXI;

use App\Http\Controllers\Controller;

use App\Modelos\HXXI\Hxxi_Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Hxxi_Menu::orderBy('id', 'ASC')->paginate(5);

        return view('hxxi.menus.index',compact('menus'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        return view('hxxi.menus.crear');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate(['id_aplicacion'=>'required',
                            'id_menu'=>'required',
                            'tooltip' => 'required|min:3|max:100',
                            'label' => 'required|min:3|max:50',
                            'link' => 'required|min:3|max:255',
                            'role' => 'required|min:3|max:20',
                            'icono' => 'max:255',
                            'orden'=>'required|int',
                            'desde' => 'required|date|after:today',
                            'hasta' => 'date|after_or_equal:desde',
                           ]);

        $menu = new Hxxi_Menu();
        $menu->id_aplicacion = $request->input('id_aplicacion');
        $menu->id_menu = $request->input('id_menu');
        $menu->tooltip = $request->input('tooltip');
        $menu->label = $request->input('label');
        $menu->link = $request->input('link');
        $menu->role = $request->input('role');
        $menu->icono = $request->input('icono');
        $menu->orden = $request->input('orden');
        $menu->desde = $request->input('desde');
        $menu->hasta = $request->input('hasta');
        $menu->save();

        return redirect()->route('hxxi.menus.index')
            ->with('success','Menu creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  $id de menu
     * @return \Illuminate\Http\Response
     */
    public function mostrar($id)
    {

        $menu = Hxxi_Menu::find($id);

        return view('hxxi.menus.mostrar',['hxxi_menu' => $menu]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modelos\HXXI\Hxxi_Menu  $hxxi_menu
     * @return \Illuminate\Http\Response
     */
    public function editar(Hxxi_Menu $hxxi_menu)
    {
        return view('hxxi.menus.editar',compact('hxxi_menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modelos\HXXI\Hxxi_Menu  $hxxi_menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hxxi_Menu $hxxi_menu)
    {
        $request->validate(['id_aplicacion'=>'required',
                            'id_menu'=>'required',
                            'tooltip' => 'required|min:3|max:100',
                            'label' => 'required|min:3|max:50',
                            'link' => 'required|min:3|max:255',
                            'role' => 'required|min:3|max:20',
                            'icono' => 'max:255',
                            'orden'=>'required|int',
                            'desde' => 'required|date|after:today',
                            'hasta' => 'date|after_or_equal:desde',
                           ]);

        $hxxi_menu->id_aplicacion = $request->input('id_aplicacion');
        $hxxi_menu->id_menu = $request->input('id_menu');
        $hxxi_menu->tooltip = $request->input('tooltip');
        $hxxi_menu->label = $request->input('label');
        $hxxi_menu->link = $request->input('link');
        $hxxi_menu->role = $request->input('role');
        $hxxi_menu->icono = $request->input('icono');
        $hxxi_menu->orden = $request->input('orden');
        $hxxi_menu->desde = $request->input('desde');
        $hxxi_menu->hasta = $request->input('hasta');

        $hxxi_menu->update();

        return redirect()->route('hxxi.menus.index')
            ->with('message','Menu modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modelos\HXXI\Hxxi_Menu  $hxxi_menu
     * @return \Illuminate\Http\Response
     */
    public function delete(Hxxi_Menu $hxxi_menu)
    {

        $hxxi_menu->delete();

        return redirect()->route('hxxi.menus.index')
            ->with('success','Menu borrada correctamente');
    }
}
