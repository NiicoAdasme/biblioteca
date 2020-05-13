$(document).ready(function(){

  // FORMULARIO ELIMINAR ROL
  $("#data-tabla").on('submit', '.form-eliminar',function(){
    event.preventDefault();
    const form= $(this);
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
        ajaxRequest(form);
      }
    });
  });
  
  // ENVIO DE FORMULARIO CON AJAX
  function ajaxRequest(form){
    $.ajax({
        url: form.attr('action'),
        type: 'POST',
        data: form.serialize(),
        success: function(respuesta){
            if(respuesta.mensaje == 'ok'){
                form.parents('tr').remove();
                Biblioteca.notificaciones('El registro fue eliminado correctamente','Biblioteca','success');
            }else{
              Biblioteca.notificaciones('El registro no pudo ser eliminado debido a que hay recursos utilizandolo','Biblioteca','error');
            }
        },
        error: function(){

        }
    });
  }  

});