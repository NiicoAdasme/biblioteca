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
                    <div class="card-tools">
                      <a href="{{route('menu')}}" class="btn btn-block btn-info btn-sm">
                        <i class="fa fa-fw fa-reply-all"></i>Volver
                      </a>
                  </div>
                </div>
              <form action="{{route('guardar_menu')}}" role="form" method="POST" id="quickForm" autocomplete="off">
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

@section('scripts')
<script type="text/javascript"> 
    $(document).ready(function () {
      $.validator.setDefaults({
        submitHandler: function (form) {
          //alert( "Form successful submitted!" );
          //var $form = $('quickForm');
          form.submit();
        }
      });
      $('#quickForm').validate({
        rules: {
          nombre: {
            required: true
          },
          url: {
            required: true,
            maxlength: 50
          },
          icono: {
            required: true,
            maxlength: 50
          },
        },
        messages: {
          nombre: {
            required: "Por favor ingrese un nombre"
          },
          url: {
            required: "Por favor ingrese una URL",
            maxlength: "El maximo de caracteres es 50"
          },
          icono: {
              required: "Por favor ingrese un icono",
              maxlength: "El maximo de caracteres es 50"
          }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
</script>
@endsection

