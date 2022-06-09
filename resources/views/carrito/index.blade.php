@extends('layouts.menu')
@section('contenido')
@if(!session('cart'))
<p>Variable no existente</p>
@else
<div class="row">
    <h4>{{session('cart')[0]["name"]}}
        {{session('cart')[0]["cantidad"]}}
    </h4>
</div>
<form method="POST" action="{{route('carrito.destroy',1)}}">
    @csrf
    @method('DELETE')
    <button class="btn waves-effect #f57c00 grey" type="submit">
        <div class="material-icons right">
          Eliminar carrito
        </div>
    </button>
</form>
@endif
@endsection