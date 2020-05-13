var Biblioteca = function (){
    return {
        notificaciones: function(mensaje, titulo, tipo){
            toastr.options= {
                closeButton: true,
                newestOnTop: true,
                positionClass: 'toast-top-right',
                preventDuplicates: true,
                timeOut: '3000'
            };
            if(tipo == 'error'){
                toastr.error(mensaje,titulo);
            }else if(tipo == 'success'){
                toastr.success(mensaje,titulo);
            }else if(tipo == 'info'){
                toastr.info(mensaje,titulo);
            }else if(tipo == 'warning'){
                toastr.warning(mensaje,titulo);
            }
        },
        sweetAlert: function(mensaje, tipo){
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
      
            Toast.fire({
                icon: tipo,
                title: mensaje
            })
        }
    }
}();