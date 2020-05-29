<?php

namespace App\Http\Controllers\Auth;

use App\Models\Usuario;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::RAIZ;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'nombre' => ['required', 'string', 'max:255'],
            'usuario' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
        ]);
    }

    
    protected function create(array $data)
    {
        $usuario= Usuario::create([
            'nombre' => $data['nombre'],
            'usuario' => $data['usuario'],
            'password' => Hash::make($data['password']),
        ]);

        
        $id_ultimo_usuario= Usuario::orderBy('id','desc')->take(1)->get('id')->toArray();
        //$user= Usuario::find($id_ultimo_usuario[0]["id"]);
        //$user->roles()->attach(2,1);
        DB::table('usuario_rol')->insert([
            'rol_id' => 2,
            'usuario_id' => $id_ultimo_usuario[0]["id"],
            'estado' => 1
        ]);
        return $usuario;
    }
}
