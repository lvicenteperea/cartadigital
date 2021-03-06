<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Modelos\Emp\Emp_Empresa;
use App\Modelos\HXXI\Hxxi_Aplicacion;
use App\Modelos\User;


class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    /**
    * Llamamos a la pantalla de perfil de usuario con los datos de usuario conectado
    */
    public function perfil(){

        $user = Auth::user();

        return view('users.perfil', ['user' => $user]);
    }

    /**
    * Llamamos al formulario de edición del usuario
    */
    public function edita(){
        $usuario      = Auth::user();
        $empresas     = Emp_Empresa::all();
        $jefes        = User::all();
        $aplicaciones = Hxxi_Aplicacion::all();

        return view('users.edita', ['usuario'=>$usuario, 'jefes'=>$jefes, 'empresas'=>$empresas, 'aplicaciones'=>$aplicaciones]);
    }

    /**
    * Modificamos el registro en la BBDD con lo que se haya introducido en el formulario
    */
    public function update(Request $request){
        $user = Auth::user();
        $id   = Auth::user()->id;

        // ************************  Validación de variables    *****************************
        $this->validate($request, [
            'nombre'    => 'required|string|min:3|max:255',
            'apellidos' => 'required|string|min:3|max:255',
            'nick'      => 'required|string|min:5|max:255|unique:hxxi_users,nick,'.$id,
            'email'     => 'required|string|email|max:255|check_dns|unique:hxxi_users,email,'.$id,
        ]);

        // *************************   Asignación de variables    *****************************
        $user->nombre      = $request->input('nombre');;
        $user->apellidos   = $request->input('apellidos');
        $user->nick        = $request->input('nick');
        $user->email       = $request->input('email');
        $user->id_empresa  = $request->input('id_empresa')[0];
        $user->id_user_jefe= $request->input('id_user_jefe')[0];
        $user->id_aplicacion= $request->input('id_aplicacion')[0];

        $imagen_path = $request->file('imagen_path');
        if($imagen_path){
            $imagen_path_nombre = time().$imagen_path->getClientOriginalName();

            Storage::disk('users')->put($imagen_path_nombre, File::get($imagen_path));
            $user->imagen = $imagen_path_nombre;
        }

        // **************************** UPDATE    *****************************
        $user->update();

        // **************************  Redirección   *****************************
        return redirect()->route('user.perfil')
                         ->with(['message'=>'Usuario actualizado correctamente']);
    }

    /**
    * Visualiza la imagen que se corresponda al nombre de fichero enviado
    * y lo recoge del directorio de imagenes de usuarios
    */
    public function getImagen($NombFic = null){
        if($NombFic && !empty($NombFic) ){
            $file = Storage::disk('users')->get($NombFic);
        }else{
            $file = Storage::disk('users')->get('user_sin_imagen.png');
        }

        return new Response($file, 200);
    }

    /**
     *
     * Modificación de la PWD del usuario conectado.
     *
     * http://jquery-manual.blogspot.com/2015/11/14-tutorial-de-laravel-5-update.html
     * La acción updatePassword primero valida los atributos del formularios,
     * si la validación falla el usuario es redireccionado nuevamente al
     * formulario con los mensajes de error, si pasa la validación primero
     * comprobamos si el atributo "mypassword" coincide con el actual password
     * del usuario, de ser así, actualizamos el password del usuario y lo
     * redireccionamos a "user" con un "status", de lo contrario, lo
     * redireccionamos nuevamente al formulario con un mensaje flash "message"
     * con un error indicando que sus credenciales son incorrectas.
     *
     * mi_pwd --> app/Providers/ValidacionesProvider.php
     *
     */
    public function updatePwd(Request $request){

        $rules = [
            'mypassword' => 'required',
            'password' => 'required|confirmed|min:6|max:18|mi_pwd',
        ];

        $messages = [
            'mypassword.required' => 'El campo es requerido',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return redirect()->route('user.edita')->withErrors($validator);
        }
        else{
            if (Hash::check($request->mypassword, Auth::user()->password)){
                $user = new User;
                $user->where('email', '=', Auth::user()->email)
                     ->update(['password' => bcrypt($request->password)]);

                return redirect()->route('user.perfil')->with('message', 'Password cambiado con éxito');
            }
            else
            {
                return redirect()->route('user.edita')
                                 ->with('message', 'Credenciales incorrectas');
            }
        }
    }



}
