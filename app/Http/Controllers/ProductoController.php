<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\validator;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
public function index()
    {
        //Selecionar todos los productos de la base de datos
        $productos = Producto::all();
        //Mostrar el catalogo de productos, llevandole la lista al producto
        return view('productos.index')
        ->with('productos', $productos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Seleccionar Marcas
        $marcas = Marca::all();
        //Seleccion de categorias
        $categorias = Categoria::all();
        //Mostrar la vista
        return view('productos.registro')
                ->with('marcas',$marcas)
                ->with('categorias',$categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        //Analizar la input data "imagen"

        
    

        //Reglas de validacion de campos
        $reglas = [
            "nombre"=>'required|alpha',
            "desc"=>'required|min:20|max:50',
            "precio"=>'numeric|required',
            "marca"=>'required|numeric',
            "categoria"=>'required|numeric',
            "imagen"=> 'required|image'
        ];
        $mensajes = [
            "required" => "El campo es obligatorio",
            "min"=>"Minimo 20 caracteres",
            "max"=>"Maximo 50 caracteres",
            "alpha" => "Solo letras",
            "numeric" => "Solo puede contener numeros",
            "image"=> "Solo se puede tipo imagen"
        ];
        //Crear objeto de validacion
        $validation = Validator::make($r->all(),$reglas,$mensajes);
        //Validar los datos
        if($validation->fails()){
            return redirect('productos/create')
            ->withErrors($validation)
            ->withInput();
        }
        else{
        //Acceder a propiedades del archivo cargado
        $archivo= $r->imagen;
        $nombre_archivo= $archivo->getClientOriginalName();
        //Establecer la ubicacion donde se almacenara el archivo
        $ruta=public_path()."/img/";
        //mover el archivo
        $archivo->move($ruta, $nombre_archivo);
        //Crear nuevo producto<<entity>>
        $p =new Producto;
        //Asignar valores a los atributos
        $p->nombre = $r->nombre;
        $p->descripcion = $r->desc;
        $p->imagen=$nombre_archivo;
        $p->precio = $r->precio;
        $p->marca_id = $r->marca;
        $p->categoria_id = $r->categoria;
        //Guardar en la bd
        $p->save();
        return redirect('productos/create')
            ->with('mensaje',"Producto registrado con exito");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($producto)
    {
        echo "Detalles de producto $producto";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($producto)
    {
        echo "form de actualizacion del prod $producto";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}