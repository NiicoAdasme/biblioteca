@if(session("mensaje"))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i>{{session("mensaje")}}</h5>
    </div>
@endif    
