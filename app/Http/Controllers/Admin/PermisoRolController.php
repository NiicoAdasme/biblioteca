<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Permiso;
use App\Models\Admin\Rol;
use Illuminate\Http\Request;

class PermisoRolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permisos =Permiso::orderBy('id')->get();
        $roles =Rol::orderBy('id')->pluck('nombre','id')->toArray();
        $permiso_rol =Permiso::with('roles')->get()->pluck('roles','id')->toArray();
        return view('admin.permiso-rol.index', compact('permisos','roles','permiso_rol'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        if($request->ajax()){
            $permiso= new Permiso();
            if($request->input('estado') == 1){
                $permiso->find($request->input('permiso_id'))->roles()
                ->attach($request->input('rol_id'));
                
            }else{
                $permiso->find($request->input('permiso_id'))->roles()->detach($request->input('rol_id'));
            }
        }else{
            abort(404);
        }
    }

   
}
