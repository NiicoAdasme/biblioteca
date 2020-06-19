<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionPermiso;
use App\Http\Requests\ValidacionPermisoEditar;
use App\Models\Admin\Permiso;
use Illuminate\Http\Request;

class PermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permisos= Permiso::orderBy('id')->get();
        return view('admin.permiso.index', compact('permisos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        return view('admin.permiso.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionPermiso $request)
    {
        Permiso::create($request->all());
        return redirect('admin/permiso')->with('mensaje','Permiso creado correctamente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        $permiso= Permiso::findOrFail($id);
        return view('admin.permiso.editar', compact('permiso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidacionPermisoEditar $request, $id)
    {
        Permiso::findOrFail($id)->update($request->all());
        return redirect('admin/permiso')->with('mensaje','Permiso actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request,$id)
    {
        if($request->ajax()){
            if(Permiso::destroy($id)){
                return response()->json(['mensaje'=> 'ok']);
            }else{
                return response()->json(['mensaje'=> 'ng']);
            }
        }else{
            abort(404);
        }
    }
}
