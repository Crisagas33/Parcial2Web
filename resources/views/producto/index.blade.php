<!-- Mostrar lista de productos -->
@extends('layouts.app')

@section('content')
<div class="container">

@if(Session::has('mensaje'))
    <div class="alert alert-success" role="alert">
{{Session::get('mensaje')}}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hiden="true">&times;</span>
</button> 
</div>
@endif

<a href="{{url('producto/create')}}" class="btn btn-success">Registrar Producto</a>
<br>
<br>
<table class="table table-dark table-hover">

    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>COD</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Opciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach( $productos as $producto )
        <tr>
            <td>{{$producto->id}}</td>
            <td>{{$producto->COD}}</td>
            <td>{{$producto->Nombre}}</td>  
            <td>{{$producto->Descripcion}}</td>
            <td>{{$producto->Precio}}</td>
            <td>{{$producto->Cantidad}}</td>
            <td>
            <a href="{{url('/producto/'.$producto->id.'/edit')}}" class="btn btn-warning">Editar</a>    
             | 
                <form action="{{url('/producto/'.$producto->id)}}" method="post" class="d-inline">
                @csrf
                {{method_field('DELETE')}}
                    <input type="submit" onclick="return confirm('¿Estás seguro que quieres borrarlo?')" value="Borrar" class="btn btn-danger">
                </form>
            </td>
        </tr>
        @endforeach 
    </tbody>

    <tfoot>
        <tr>
            <th>#</th>
        </tr>
    </tfoot>
</table>
{!! $productos->links() !!}
</div>
@endsection