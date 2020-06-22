<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Modelos\HXXI\Hxxi_Menu;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

// Todo esto modificado por el tema del validate
//use http\Env\Request;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Modelos\User;
//--------------------------



class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$menus = Hxxi_Menu::menus();

        $this->middleware('guest')->except('logout');

    }

    /**
     * El usuario ha sido autenticado y hago mis validaciones.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        $miUser = User::where('id_empresa','=',$request->input('id_aplicacion'))->find($user->id);
        if (isset($miUser->id) && $user->id == $miUser->id) {
            //return redirect()->intended($this->redirectPath());
            return redirect()->route('hxxi.dispositivos.index');
        }else{
            $this->logout($request);
            return redirect()->route('login')->withErrors(__('Error: Usuario de aplicación'));
        }
    }
}
