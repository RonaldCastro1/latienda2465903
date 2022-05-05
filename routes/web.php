<?php

use Illuminate\Support\Facades\Route;

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
//primera ruta
Route::get('Hola',function(){
    echo "hola 2465903";
});

//Ruta de arreglos
Route::get('arreglo', function(){
    $estudiantes = [ 
        "CA" => 1, 
        "JO" => true, 
        "AN" => 1.78
    ];
    echo "<pre>";
    var_dump($estudiantes);
    echo "</pre>";
//recorrer el arreglo
foreach($estudiantes as $e){
    echo $e."<hr />";
};
//agregar elementos en php
$estudiantes["RO"]="Ronald";
    var_dump($estudiantes);
});


Route::get('paises', function(){
    $paises = [
        "Colombia" => [
            "capital" => "Bogota",
            "moneda" => "Peso colombiano",
            "poblacion" => 51,
            "ciudades" => [
                "medellin",
                "cali",
                "barranquilla"
            ]
        ],
        "Peru" => [
            "capital" => "Lima",
            "moneda" => "Sol",
            "poblacion" => 32,
            "ciudades" => [
                "arequipa",
                "trujillo"
            ]
        ],
        "Paraguay" => [
            "capital" => "Asuncion",
            "moneda" => "Guarani",
            "poblacion" => 7,
            "ciudades" => [
                "luque"
        ],
        "Brazil" => [
            "capital" => "Brasilia",
            "moneda" => "Real brasileño",
            "poblacion" => 212,
            "ciudades" => [
                "arequipa",
                "trujillo"
            ]
        ],
        "Mexico" => [
            "capital" => "Ciudad de mexico",
            "moneda" => "Peso mexicano",
            "poblacion" => 128,
            "ciudades" => [
                "arequipa",
                "trujillo"
            ]
        ]
      ]
    ];
    return view ('paises')-> with("paises", $paises);
    
});
