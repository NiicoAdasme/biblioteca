@extends("theme.$theme.layout")

@section('titulo')
  Crear Permiso
@endsection

@section('contenido')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            @include('includes.form-mensaje')
            @include('includes.form-error')
            <!-- general form elements -->
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Crear Permiso</h3>
                    <div class="card-tools">
                      <a href="{{route('permiso')}}" class="btn btn-block btn-info btn-sm">
                        <i class="fa fa-fw fa-reply-all"></i>Volver
                      </a>
                  </div>
                </div>
                <form action="{{route('guardar_permiso')}}" role="form" method="POST" id="quickForm" autocomplete="off">
                  @csrf
                  <div class="card-body">
                      @include('admin.permiso.form')
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
            required: true,
            maxlength: 50
          },
          slug: {
            required: true,
            maxlength: 50
          } 
        },
        messages: {
          nombre: {
            required: "Por favor ingrese un nombre",
            maxlength: "El maximo de caracteres es 50"
          },
          slug:{
            required: "Por favor ingresa un slug",
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