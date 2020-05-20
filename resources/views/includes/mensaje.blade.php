@if(session("mensaje"))
    <div class="alert alert-danger alert-dismissible" data-auto-dismiss="3000" >
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i>{{session("mensaje")}}</h5>
    </div>    
@endif    