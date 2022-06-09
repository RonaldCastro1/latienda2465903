@extends('layouts.menu')
@section('contenido')
    <div class="row">
        <h1>Catalogo de productos</h1>
    </div>
    @foreach($productos as $producto)
    <div class="card">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" width="500" height="400" 
      @if($producto->imagen=== null) 
      src="{{ asset('img/no_disponible.jpg')}}" 
      @else 
      src="{{ asset('img/'.$producto->imagen)}}"
      @endif 
      />
    </div>
    <div class="card-content grey darken-1">
      <span class="card-title activator black-text text-darken-4"><b>{{$producto->nombre}}</b><i class="material-icons right  white-text"><b>Detalles</b></i></span>
      <p><a href="{{url('productos/'.$producto->id)}}">Añadir a carrito</a></p>
    </div>
    <div class="card-reveal lighten-4 grey darken-1">
      <span class="card-title text-darken-4">{{$producto->nombre}}<i class="material-icons right  white-text">Cerrar</i></span>
      <ul>
      <li>Descripcion: {{$producto->desc}}</li>
      <li>Precio: {{$producto->precio}}</li>   
      <li>Categoria: {{$producto->categoria->nombre}}</li> 
      </ul>
    </div>
  </div>
    @endforeach
@endsection 