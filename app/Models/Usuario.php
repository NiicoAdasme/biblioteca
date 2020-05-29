<?php

namespace App\Models;

use App\Models\Admin\Rol;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Session;

class Usuario extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $table = "usuario";

    protected $fillable = ['usuario', 'nombre', 'password'];

    protected $guarded = ['id'];

    protected $remember_token = false;

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles(){
        return $this->belongsToMany(Rol::class, 'usuario_rol');
    }

    public function setSession($roles){

        if(count($roles) == 1){
            Session::put([
                'rol_id' => $roles[0]['id'],
                'rol_nombre' => $roles[0]['nombre'],
                'usuario' => $this->usuario,
                'usuario_id' => $this->id,
                'nombre_usuario' => $this->nombre
            ]);
        }
    }
}
