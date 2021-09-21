<!-- Form que tendra datos en comun con create y edit -->
<h1>{{$modo}} producto</h1>
@if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
    <ul>
        @foreach($errors->all() as $error)
              <li>
              {{$error}}
              </li> 
            @endforeach
    </ul>    
    </div>
@endif
<div class="form-group">
<label for="COD">COD</label>
<input type="text" class="form-control" name="COD" value="{{isset($productos->COD)?$productos->COD:old('COD')}}" id="COD">
<br>
</div>
<div class="form-group">
<label for="Nombre">Nombre</label>
<input type="text" class="form-control" name="Nombre" value="{{isset($productos->Nombre)?$productos->Nombre:old('Nombre')}}" id="Nombre">
<br>
</div>
<div class="form-group">
<label for="Descripción">Descripción</label>
<input type="text" class="form-control" name="Descripcion" value="{{isset($productos->Descripcion)?$productos->Descripcion:old('Descripcion')}}" id="Descripcion">
<br>
</div>
<div class="form-group">
<label for="Precio">Precio</label>
<input type="text" class="form-control" name="Precio" value="{{isset($productos->Precio)?$productos->Precio:old('Precio')}}" id="Precio">
<br>
</div>
<div class="form-group">
<label for="Cantidad">Cantidad</label>
<input type="text" class="form-control" name="Cantidad" value="{{isset($productos->Cantidad)?$productos->Cantidad:old('Cantidad')}}" id="Cantidad">
<br>
</div>
<input type="submit" value="{{$modo}} Datos" class="btn btn-success">
<a href="{{url('producto')}}" class="btn btn-dark">Productos</a>
<br>