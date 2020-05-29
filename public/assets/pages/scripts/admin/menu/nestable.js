$(document).ready(function (){
    $('#nestable').nestable().on('change',function(){
        const data = {
            menu: window.JSON.stringify($('#nestable').nestable('serialize')),
            _token: $('input[name=_token]').val()
        };
        $.ajax({
            url: '/admin/menu/guardar-orden',
            type: 'POST',
            dataType: 'JSON',
            data: data,
            success: function(respuesta){
            }
        });
    });
    $('#nestable').nestable('expandAll');

    $('.eliminar-menu').on('click',function (){
        event.preventDefault();
        const url= $(this).attr('href');
        swal({
            title: '¿Seguro que desea eliminar este registro?',
            text: "Esta acción no se puede deshacer",
            icon: 'warning',
            buttons: {
              cancel: "Cancelar",
              confirm: "Aceptar"
            },
          }).then((value)=>{
            if(value){
                document.getElementById('form-eliminar').submit();
            }
          });
    });

});