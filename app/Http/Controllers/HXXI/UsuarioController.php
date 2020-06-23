<?php

namespace App\Http\Controllers\HXXI;

use App\Http\Controllers\Controller;

use App\Modelos\HXXI\Hxxi_Users;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Hxxi_Users::orderBy('id', 'ASC')->paginate(5);

        return view('hxxi.usuarios.index',compact('usuarios'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        return view('hxxi.usuarios.crear');
    }


    /**
     * validaciones y cargar objeto.
     *
     */
    public function valida_carga(Request $request, Hxxi_Users $usuario)
    {
        $request->validate(['id_aplicacion'=>'required|int',
            'id_user_jefe'=>'required|int',
            'id_empresa' => 'required|int',
            'role' => 'required|min:3|max:20',
            'nombre' => 'required|min:3|max:100',
            'apellidos' => 'required|min:3|max:200',
            'nick'      => 'required|string|min:5|max:100|unique:hxxi_users,nick,'.$usuario->id,
            'email'     => 'required|string|email|max:255|check_dns|unique:hxxi_users,email,'.$usuario->id,
            'password' => 'required|password',
            'imagen' => 'required|min:3|max:255',
        ]);

        $usuario->id_aplicacion = $request->input('id_aplicacion');
        $usuario->id_user_jefe = $request->input('id_user_jefe');
        $usuario->id_empresa = $request->input('id_empresa');
        $usuario->role = $request->input('role');
        $usuario->nombre = $request->input('nombre');
        $usuario->apellidos = $request->input('apellidos');
        $usuario->nick = $request->input('nick');
        $usuario->email = $request->input('email');
        $usuario->password = $request->input('password');
        $usuario->imagen = $request->input('imagen');

        return $usuario;

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        /*
        $request->validate(['id_aplicacion'=>'required|int',
                            'id_user_jefe'=>'required|int',
                            'id_empresa' => 'required|int',
                            'role' => 'required|min:3|max:20',
                            'nombre' => 'required|min:3|max:100',
                            'apellidos' => 'required|min:3|max:200',
                            'nick' => 'required|min:3|max:100',
                            'email'=>'required|min:3|max:255',
                            'password' => 'required|password',
                            'imagen' => 'required|min:3|max:255',
                           ]);

        $usuario = new Hxxi_Users();
        $usuario->id_aplicacion = $request->input('id_aplicacion');
        $usuario->id_user_jefe = $request->input('id_user_jefe');
        $usuario->id_empresa = $request->input('id_empresa');
        $usuario->role = $request->input('role');
        $usuario->nombre = $request->input('nombre');
        $usuario->apellidos = $request->input('apellidos');
        $usuario->nick = $request->input('nick');
        $usuario->email = $request->input('email');
        $usuario->password = $request->input('password');
        $usuario->imagen = $request->input('imagen');
        */

        $usuario = new Hxxi_Users();
        $usuario = $this->valida_carga($request, $usuario);
        $usuario->save();

        return redirect()->route('hxxi.usuarios.index')
            ->with('success','Usuario creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  $id de Usuario
     * @return \Illuminate\Http\Response
     */
    public function mostrar($id)
    {

        $usuario = Hxxi_Users::find($id);

        return view('hxxi.usuarios.mostrar',['hxxi_usuario' => $usuario]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modelos\HXXI\Hxxi_Users  $hxxi_usuario
     * @return \Illuminate\Http\Response
     */
    public function editar(Hxxi_Users $hxxi_usuario)
    {
        return view('hxxi.usuarios.editar',compact('hxxi_usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modelos\HXXI\Hxxi_Users  $hxxi_usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hxxi_Users $hxxi_usuario)
    {

        $hxxi_usuario = $this->valida_carga($request, $hxxi_usuario);

        $hxxi_usuario->update();

        return redirect()->route('hxxi.usuarios.index')
            ->with('message','Usuario modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modelos\HXXI\Hxxi_Users  $hxxi_usuario
     * @return \Illuminate\Http\Response
     */
    public function delete(Hxxi_Users $hxxi_usuario)
    {

        $hxxi_usuario->delete();

        return redirect()->route('hxxi.usuarios.index')
            ->with('success','Usuario borrado correctamente');
    }
}
