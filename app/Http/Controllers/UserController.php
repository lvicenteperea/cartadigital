<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function edita(){

        return view('users.edita');
    }

    public function update(Request $request){
        $user = \Auth::user();
        $id   = \Auth::user()->id;

        $this->validate($request, [
            'nombre'    => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'nick'      => 'required|string|max:255|unique:users,nick,'.$id,
            'email'     => 'required|string|email|max:255|unique:users,email,'.$id
        ]);
        
        /*
        $imagen_path = $request->file('imagen_path');
        if($imagen_path){
            $imagen_path_nombre = time().$imagen_path->getClientOriginalName();

            Storage::disk('users')->put($imagen_path_nombre, File::get($imagen_path));
            $user->imagen = $imagen_path_nombre;
        }
        */

        $user->nombre      = $request->input('nombre');;
        $user->apellidos   = $request->input('apellidos');
        $user->nick        = $request->input('nick');
        $user->email       = $request->input('email');
        $user->id_empresa  = $request->input('id_empresa');
        $user->id_user_jefe= $request->input('id_user_jefe');
        $user->imagen      = $request->input('imagen');

        $user->update();

        return redirect()->route('dashboard')
                         ->with(['message'=>'Usuario actualizado correctamente']);
    }
}
