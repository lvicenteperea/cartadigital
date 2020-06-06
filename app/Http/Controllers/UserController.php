<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use App\Modelos\Emp_Empresa;
use App\User;

use Hash;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    /**
    * Llamamos a la pantalla de perfil de usuario con los datos de usuario conectado
    */
    public function perfil(){

        $user = \Auth::user();
        
        return view('users.perfil', ['user' => $user]);
    }

    /**
    * Llamamos al formulario de edición del usuario
    */
    public function edita(){
        $usuario  = \Auth::user();
        $empresas = Emp_Empresa::all();
        $jefes    = User::all();

        return view('users.edita', ['usuario'=>$usuario, 'jefes'=>$jefes, 'empresas'=>$empresas]);
    }

    /**
    * Modificamos el registro en la BBDD con lo que se haya introducido en el formulario
    */
    public function update(Request $request){
        $user = \Auth::user();
        $id   = \Auth::user()->id;

        // ************************  Validación de variables    *****************************
        $this->validate($request, [
            'nombre'    => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'nick'      => 'required|string|max:255|unique:users,nick,'.$id,
            'email'     => 'required|string|email|max:255|unique:users,email,'.$id
        ]);

        // *************************   Asignación de variables    *****************************
        $user->nombre      = $request->input('nombre');;
        $user->apellidos   = $request->input('apellidos');
        $user->nick        = $request->input('nick');
        $user->email       = $request->input('email');
        $user->id_empresa  = $request->input('id_empresa')[0];
        $user->id_user_jefe= $request->input('id_user_jefe')[0];
        
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
     */
    public function updatePwd(Request $request){
        $rules = [
            'mypassword' => 'required',
            'password' => 'required|confirmed|min:6|max:18',
        ];
        
        $messages = [
            'mypassword.required' => 'El campo es requerido',
            'password.required' => 'El campo es requerido',
            'password.confirmed' => 'Los passwords no coinciden',
            'password.min' => 'El mínimo permitido son 6 caracteres',
            'password.max' => 'El máximo permitido son 18 caracteres',
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return redirect('user/password')->withErrors($validator);
        }
        else{
            if (Hash::check($request->mypassword, Auth::user()->password)){
                $user = new User;
                $user->where('email', '=', Auth::user()->email)
                     ->update(['password' => bcrypt($request->password)]);
                return redirect('user')->with('status', 'Password cambiado con éxito');
            }
            else
            {
                return redirect('user/password')->with('message', 'Credenciales incorrectas');
            }
        }        
    }



}
