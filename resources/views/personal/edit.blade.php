@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{url('/personal/'.$personal->id)}}" method="post" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}
@include('personal.form', ['modo'=>'Editar'])
</form>
</div>
@endsection