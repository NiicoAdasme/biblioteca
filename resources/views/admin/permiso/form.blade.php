<div class="form-group">
    <label for="nombre" class="requerido">Nombre</label>
<input type="text" name="nombre" class="form-control" id="nombre" placeholder="Ingrese Nombre"  value="{{old('nombre',$permiso->nombre ?? '')}}">
</div>

<div class="form-group">
    <label for="slug" class="requerido">Slug</label>
    <input type="text" name="slug" class="form-control" id="slug" placeholder="Ingrese Slug"  value="{{old('url',$permiso->slug ?? '')}}">
</div>
