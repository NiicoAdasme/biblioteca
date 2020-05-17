<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    protected $table = "usuario";

    protected $fillable = ['usuario', 'nombre', 'password'];

    protected $guarded = ['id'];

    protected $remember_token = false;
}
