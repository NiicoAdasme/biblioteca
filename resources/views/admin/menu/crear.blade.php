@extends("theme.$theme.layout")

@section('titulo')
  Crear Menú
@endsection

@section('contenido')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            @include('includes.form-error')
            @include('includes.form-mensaje')
            <!-- general form elements -->
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Crear Menú</h3>
                </div>
            <form action="{{route('guardar_menu')}}" role="form" method="POST" id="quickForm">
                    @csrf
                    <div class="card-body">
                        @include('admin.menu.form')
                    </div>
                    <div class="card-footer">
                        @include('includes.boton-form-crear')
                    </div>
                  </form>
            </div>
        </div>
    </div>
</div>
@endsection


