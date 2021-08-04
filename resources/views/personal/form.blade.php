<h1>{{ $modo }} Personal</h1>

@if (count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>

@endif

<div class="form-group">
    <label for="primer_nombre">Primer nombre</label>
        <input type="text" class="form-control" value="{{isset($personal->primer_nombre) ? $personal->primer_nombre:old('primer_nombre')}}" id="primer_nombre" name="primer_nombre">
    <br>
</div>
<div class="form-group">
    <label for="segundo_nombre">Segundo nombre</label>
        <input type="text" class="form-control" value="{{isset($personal->segundo_nombre) ? $personal->segundo_nombre:old('segundo_nombre')}}" id="segundo_nombre" name="segundo_nombre">

    <br>
</div>
<div class="form-group">
    <label for="primer_apellido">Primer apellido</label>
        <input type="text" class="form-control" value="{{isset($personal->primer_apellido) ? $personal->primer_apellido:old('primer_apellido')}}" id="primer_apellido" name="primer_apellido">
    <br>
</div>
<div class="form-group">
    <label for="segundo_apellido">Segundo apellido</label>
        <input type="text" class="form-control" value="{{isset($personal->segundo_apellido) ? $personal->segundo_apellido:old('segundo_apellido')}}" id="segundo_apellido" name="segundo_apellido">
    <br>
</div>
<div class="form-group">
    <label for="fecha_nacimiento">Fecha de nacimiento</label>
        <input type="date" class="form-control" value="{{isset($personal->fecha_nacimiento) ? $personal->fecha_nacimiento:old('fecha_nacimiento')}}" id="fecha_nacimiento" name="fecha_nacimiento">
    <br>
</div>
<div class="form-group">
    <label for="tipo">Tipo</label>
        <input type="text" class="form-control" value="{{isset($personal->tipo) ? $personal->tipo:old('tipo')}}" id="tipo" name="tipo">
    <br>
</div>
<div class="form-group">
    <label for="telefono">Telefono</label>
        <input type="tel" class="form-control" value="{{isset($personal->telefono) ? $personal->telefono:old('telefono')}}" id="telefono" name="telefono">
    <br>
</div>
<div class="form-group">
    <label for="direccion">Direccion</label>
        <input type="text" class="form-control" value="{{isset($personal->direccion) ? $personal->direccion:old('direccion')}}" id="direccion" name="direccion">
    <br>
</div>
<div class="form-group">
    <label for="foto">Foto</label>
    @if (isset($personal->foto))
        <img class="img-thumbnail img-fluid" style="width: 50px" src="{{ asset('storage') . '/' . $personal->foto }}"
            alt="">
    @endif
    <input type="file" class="form-control" value="" id="foto" name="foto">
    <br>
</div>
<input type="submit" class="btn btn-success" value="{{ $modo }}">
<a class="btn btn-danger" href="{{ url('personal') }}">Cancelar</a>
