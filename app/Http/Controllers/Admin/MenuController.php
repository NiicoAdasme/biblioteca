<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionMenu;
use App\Http\Requests\ValidacionMenuEditar;
use App\Models\Admin\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus= Menu::getMenu();
        return view('admin.menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        return view('admin.menu.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionMenu $request)
    {
        Menu::create($request->all());
        return redirect('admin/menu/crear')->with('mensaje','Menu creado correctamente');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        $menus= Menu::findOrFail($id);
        return view('admin.menu.editar', compact('menus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidacionMenuEditar $request, $id)
    {
        Menu::findOrFail($id)->update($request->all());
        //dd($request);

        return redirect('admin/menu')->with('mensaje','Menú actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar($id)
    {
        Menu::destroy($id);
        return redirect('admin/menu')->with('mensaje','Menú eliminado correctamente');
    }

    public function guardarOrden(Request $request){
        if($request->ajax()){
            $menu= new Menu;
            $menu->guardarOrden($request->menu);
            return response()->json(['respuesta' => 'ok' ]);
        }else{
            abort(404);
        }
    }
}
