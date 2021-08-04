@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{url('/personal/')}}" method="post" enctype="multipart/form-data">
@csrf
@include('personal.form',['modo'=>'Crear'])
</form>
</div>
@endsection