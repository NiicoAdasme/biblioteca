@extends("theme.$theme.layout")

@section('titulo')
  Permiso
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Permisos</h3>
              <div class="card-tools">
                <a href="{{route('crear_permiso')}}" class="btn btn-block btn-success btn-sm">
                  <i class="fa fa-fw fa-plus-circle"></i>Nuevo Permiso
                </a>
              </div>
            </div>
            <div class="card-body table-responsive p-0" style="height: 1400px;">
                <table class="table table-bordered table-hover text-nowrap table-striped table-head-fixed">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">ID</th>
                      <th>Nombre</th>
                      <th>Slug</th>
                      <th style="width: 10px"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($permisos as $permiso)
                        <tr>
                            <td>{{$permiso->id}}</td>
                            <td>{{$permiso->nombre}}</td>
                            <td>{{$permiso->slug}}</td>
                            <td></td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
        </div>
    </div>
</div>
@endsection
