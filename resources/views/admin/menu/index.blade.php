@extends("theme.$theme.layout")

@section('titulo')
    Menús
@endsection

@section('styles')
    <link  href="{{asset("assets/js/jquery-nestable/jquery.nestable.css")}}" type="text/css" rel="stylesheet">
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @include('includes.mensaje')
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Menús</h3>
                <div class="card-tools">
                    <a href="{{route('crear_menu')}}" class="btn btn-block btn-success btn-sm float-right">
                      <i class="fa fa-fw fa-plus-circle"></i>Nuevo Menú
                    </a>
                </div>
            </div>
            <div class="box-body">
                @csrf
                <div class="dd" id="nestable">
                    <ol class="dd-list">
                        @foreach ($menus as $key => $item)
                            @if($item['menu_id'] != 0)
                                @break
                            @endif
                            @include('admin.menu.menu-item', ['item' => $item])
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{asset('assets/pages/scripts/admin/menu/nestable.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/jquery-nestable/jquery.nestable.js')}}" type="text/javascript"></script>
    <script src="{{asset("assets/js/funciones.js")}}"></script>
    <script src="{{asset("assets/js/alertas.js")}}"></script>
    <script src="{{asset("assets/js/dismissAlert.js")}}"></script>

@endsection