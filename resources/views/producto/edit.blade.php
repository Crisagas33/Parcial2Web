<!-- Editar productos -->
@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{url('/producto/'.$productos->id)}}" method="post"  class="btn btn-primary">
@csrf
{{method_field('PATCH')}}
@include('producto.form',['modo'=>'Actualizar'])
</form>
</div>
@endsection
