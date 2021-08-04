@extends('layouts.app')

@section('content')
    <div class="container">

            @if (Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ Session::get('mensaje') }}
                <button class="close" type="button" data-dismiss="alert" arial-label="Close">
                    <span aria-hidden="true">&times;</span> 
                </button>
            </div>
            @endif
        <a class=" btn btn-success" style="margin: 15px 0" href="{{ url('personal/create') }}">Agregar personal</a>
        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Primer Nombre</th>
                    <th>Segundo Nombre</th>
                    <th>Primer Apellido</th>
                    <th>Segundo Apellido</th>
                    <th>Fecha Nacimiento</th>
                    <th>Tipo</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                    <th>Foto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($personals as $personal)
                    <tr>
                        <td>{{ $personal->id }}</td>
                        <td>{{ $personal->primer_nombre }}</td>
                        <td>{{ $personal->segundo_nombre }}</td>
                        <td>{{ $personal->primer_apellido }}</td>
                        <td>{{ $personal->segundo_apellido }}</td>
                        <td>{{ $personal->fecha_nacimiento }}</td>
                        <td>{{ $personal->tipo }}</td>
                        <td>{{ $personal->telefono }}</td>
                        <td>{{ $personal->direccion }}</td>
                        <td><img class="img-thumbnail img-fluid" style="width: 50px"
                                src="{{ asset('storage') . '/' . $personal->foto }}" alt=""></td>
                        <td>
                            <a class="btn btn-warning" style="margin-bottom: 5px"
                                href="{{ url('/personal/' . $personal->id . '/edit') }}">Editar</a>
                            <form action="{{ url('/personal/' . $personal->id) }}" method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres Borrar?')"
                                    value="Borrar">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $personals->links() !!}
    </div>
@endsection
