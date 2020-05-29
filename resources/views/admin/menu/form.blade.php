<div class="form-group">
    <label for="nombre" class="requerido">Nombre</label>
<input type="text" name="nombre" class="form-control" id="nombre" placeholder="Ingrese Nombre"  value="{{old('nombre',$menus->nombre ?? '')}}">
</div>

<div class="form-group">
    <label for="url" class="requerido">URL</label>
    <input type="text" name="url" class="form-control" id="url" placeholder="Ingrese URL"  value="{{old('url',$menus->url ?? '')}}">
</div>

<div class="form-group">
    <label for="icono" class="requerido">Icono</label>
    <input type="text" name="icono" class="form-control" id="icono" placeholder="Ingrese Icono" value="{{old('icono',$menus->icono ?? '')}}">
</div>