<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('paises',function(){
    $paises = [
        "Colombia"=>[
            "Capital"=>"Bogota",
            "Moneda"=>"Peso",
            "Poblacion"=>"51 Millones hab.",
            "Ciudades"=>[
                "Medellin",
                "Barranquilla",
                "Cali"
            ]
        ],"Peru"=>[
            "Capital"=>"Lima",
            "Moneda"=>"Sol",
            "Poblacion"=>"32 Millones hab.",
            "Ciudades"=>[
                "Trujillo",
                "Arequipa"
            ]
        ],"Paraguay"=>[
            "Capital"=>"Asuncion",
            "Moneda"=>"Guarany",
            "Poblacion"=>"7 Millones hab.",
            "Ciudades"=>[
                "Luque"
                ]
        ],"Chile"=>[
            "Capital"=>"Santiago de Chile",
            "Moneda"=>"Peso",
            "Poblacion"=>"19 Millones hab.",
            "Ciudades"=>[
                "Santiago de Chile"
                ]
        ],"Panama"=>[
            "Capital"=>"Ciudad de Panama",
            "Moneda"=>"Balboa",
            "Poblacion"=>"4 Millones hab.",
            "Ciudades"=>[
                "Ciudad de panama"
                ]
        ]
    ];
    return view('paises')->with("paises",$paises);
});
// Codigo de Ronald
Route::get('prueba', function(){
    return view('layouts.menu');
});
Route::get('prueba', function(){
    return view('productos.new');
});
//rutas rest - resource
Route::resource('productos', ProductoController::class);

Route::resource('carrito', CartController::class,[
    'only'=>[
        'store', 'index', 'destroy'
    ]
]
);