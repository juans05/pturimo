<?php

namespace WSPturismo\Http\Controllers\Auth;

use WSPturismo\Entities\Persona;
use WSPturismo\User;
use Validator;
use WSPturismo\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $usuario= User::create([
            'email' => $data['email'],
            'estado' => 'Enable',
            'password' => bcrypt($data['password']),
        ]);

        return  Persona::create([
            'nombre'=>$data['nombre'],
            'apellido'=>$data['apellido'],
            'celular'=>'',
            'fechanacimiento'=>'',
            'nroidentidad'=>'',
            'pais'=>'',
            'rol'=>'turista',
            'telefono'=>'turista',
            'tipoidentidad'=>'turista',
            'agencia_id'=>0,
            'user_id'=>$usuario->id,
            'attachment_id'=>'null',
        ]);
    }
}
