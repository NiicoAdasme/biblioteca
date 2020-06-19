@extends("theme.$theme.layout")

@section('titulo')
    Permiso - Rol
@endsection

@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            @include('includes.mensaje')
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Permiso - Rol</h3>
                </div>
                <div class="card-body table-responsive p-0" style="height: 1400px;">
                    @csrf
                    <table class="table table-bordered table-hover text-nowrap          table-striped table-head-fixed" id="tabla-data" >
                        <thead>                  
                          <tr>
                            <th>Permisos</th>
                            @foreach ($roles as $id => $nombre)
                                <th class="text-center">{{$nombre}}</th>
                            @endforeach
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($permisos as $key => $permiso)
                                <tr>
                                    <td class="font-weight-bold pl-3">
                                        <i class="fa fa-arrows-alt pr-1"></i>
                                        {{$permiso["nombre"]}}
                                    </td>
                                  @foreach ($roles as $id => $nombre)
                                    <td class="text-center">
                                        <input type="checkbox"
                                        name="permiso_rol[]" 
                                        class="permiso_rol form-check-input" 
                                        data-permisoid="{{$permiso["id"]}}" 
                                        value="{{$id}}"
                                        {{in_array($id,
                                        array_column($permiso_rol[$permiso["id"]], "id"))? "checked" : ""}}>
                                    </td>    
                                    @endforeach
                                </tr>
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
<script src="{{asset("assets/pages/scripts/admin/permiso-rol/checkbox.js")}}"></script>
@endsection