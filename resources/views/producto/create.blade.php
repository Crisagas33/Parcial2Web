<!-- Formulario creacion productos -->
@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{url('/producto')}}" method="post" class="btn btn-primary">
@csrf
@include('producto.form',['modo'=>'Registrar'])
</form>
</div>
@endsection