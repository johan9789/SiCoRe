<?php
namespace App\Http\Controllers;

use Illuminate\Auth\Guard as Auth;
use Illuminate\Routing\Redirector as Redirect;
use Illuminate\Http\Request;

class AuthController extends Controller {
    public $auth;
    private $redirect;

    public function __construct(Auth $auth, Redirect $redirect){
        $this->auth = $auth;
        $this->redirect = $redirect;
    }

    public function getLogin(){
        return view('login');
    }

    public function postLogin(Request $request){
        $usuario = $request->get('usuario');
        $contrasena = $request->get('contrasena');

        if($this->auth->attempt(['usuario' => $usuario, 'password' => $contrasena], true)){
            return $this->redirect->to('');
        } else {
            return $this->redirect->back()->with('mensaje', 'Usuario y/o contraseña incorrectos.');
        }
    }

    public function logout(){
        $this->auth->logout();
        return $this->redirect->to('login');
    }

}