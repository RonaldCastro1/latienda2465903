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
      src="{{asset('img/no_disponible.jpg')}}" 
      @else src="{{asset('img/'.$producto->imagen)}}"
      @endif 
      />
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">{{$producto->nombre}}<i class="material-icons right">Ver detalles ...</i></span>
      <p><a href="#">This is a link</a></p>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">{{$producto->nombre}}<i class="material-icons right">close</i></span>
      <ul>
      <li>Descripcion: {{$producto->desc}}</li>
      <li>Precio: {{$producto->precio}}</li>   
      <li>Categoria: {{$producto->categoria_id}}</li> 
      </ul>
    </div>
  </div>
    @endforeach
@endsection 