@extends('layouts.menu')
@section('contenido')
<div class="row">
    <h1>{{$producto->nombre}}</h1>
</div>
<div class="row">
    <div class="col s8">
        <div class="row">
            <img width="500" height="400" 
                @if(is_null($producto->imagen)) 
                src="{{ asset('img/no_disponible.jpg')}}" 
                @else 
                src="{{asset('img/'.$producto->imagen)}}"
                @endif 
            />
        </div>
        <div class="row">
            <li>Descripcion: {{$producto->desc}}</li>
            <li>Categoria: {{$producto->categoria->nombre}}</li>
            <li>Precio: {{$producto->precio}}</li>
            <li>Marca: {{$producto->marca->nombre}}</li>
        </div>
   
    </div>
    <div class="col s4">
        <form method="POST" action="{{route('carrito.store')}}">
            @csrf
            <div class="row">
                <h4>Añadir al carrito</h4>
            </div>
            <div class="row">
            <div class="col s4 input-field">
                <select name="cantidad" id="cantidad">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
                <label for="cantidad">Cantidad</label>
            </div>
            </div>
            <div class="row">
            <button class="btn waves-effect #f57c00 grey" type="submit">
                <div class="material-icons right">
                    Añadir
                </div>
            </button>
        </div>
        <input type="hidden" name="prod_id" value="{{$producto->id}}">
        <input type="hidden" name="prod_name" value="{{$producto->name}}">
        </form>
    </div>
</div>
@endsection