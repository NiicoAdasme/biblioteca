@extends("theme.$theme.layout")

@section('titulo')
    Menú - Rol
@endsection

@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            @include('includes.mensaje')
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Menú - Rol</h3>
                </div>
                <div class="card-body table-responsive p-0" style="height: 1400px;">
                    @csrf
                    <table class="table table-bordered table-hover text-nowrap          table-striped table-head-fixed" id="tabla-data" >
                        <thead>                  
                          <tr>
                            <th>Menú</th>
                            @foreach ($roles as $id => $nombre)
                                <th class="text-center">{{$nombre}}</th>
                            @endforeach
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($menus as $key => $menu)
                                @if ($menu["menu_id"] != 0)
                                  @break
                                @endif
                                <tr>
                                    <td class="font-weight-bold pl-0"><i class="fa fa-arrows-alt"></i>{{$menu["nombre"]}}</td>
                                    @foreach ($roles as $id => $nombre)
                                    <td class="text-center">
                                        <input type="checkbox"
                                        name="menu_rol[]" 
                                        class="menu_rol form-check-input" 
                                        data-menuid="{{$menu["id"]}}" 
                                        value="{{$id}}"
                                        {{in_array($id,array_column($menusrols[$menu["id"]], "id"))? "checked" : ""}}>
                                    </td>    
                                  @endforeach
                                </tr>
                                @foreach ($menu["submenu"] as $key => $hijo)
                                    <tr>
                                      <td class="pl-2"><i class="fa fa-arrow-right"></i>{{$hijo["nombre"]}}</td>
                                        @foreach ($roles as $id => $nombre)
                                          <td class="text-center">
                                            <input type="checkbox" name="menu_rol[]" class="menu_rol form-check-input" data-menuid="{{$hijo["id"]}}" value="{{$id}}" {{in_array($id,array_column($menusrols[$hijo["id"]], "id"))? "checked" : ""}}>
                                          </td>
                                        @endforeach
                                    </tr>
                                    @foreach ($hijo["submenu"] as $key => $hijo2)
                                        <tr>
                                            <td class="pl-4"><i class="fa fa-arrow-right"></i>{{$hijo2["nombre"]}}</td>
                                            @foreach ($roles as $id => $nombre)
                                                <td class="text-center">
                                                <input type="checkbox" name="menu_rol[]" class="menu_rol form-check-input" data-menuid="{{$hijo2["id"]}}" value="{{$id}}" {{in_array($id,array_column($menusrols[$hijo2["id"]], "id"))? "checked" : ""}}>
                                                </td>
                                            @endforeach
                                        </tr>
                                        @foreach ($hijo2["submenu"] as $key => $hijo3)
                                            <tr>
                                                <td class="pl-5"><i class="fa fa-arrow-right"></i>{{$hijo3["nombre"]}}</td>
                                                @foreach ($roles as $id => $nombre)
                                                    <td class="text-center">
                                                        <input type="checkbox" name="menu_rol[]" class="menu_rol form-check-input" data-menuid="{{$hijo3["id"]}}" value="{{$id}}" {{in_array($id,array_column($menusrols[$hijo3["id"]], "id"))? "checked" : ""}}>
                                                    </td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    @endforeach
                                @endforeach
                            @endforeach
                          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="{{asset("assets/js/funciones.js")}}"></script>
<script src="{{asset("assets/pages/scripts/admin/menu-rol/checkbox.js")}}"></script>
@endsection