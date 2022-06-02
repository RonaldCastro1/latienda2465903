<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;

class Producto extends Model
{
    use HasFactory;

    //Relacion de producto con marca
    //toda relacion se expresa con una funcion
    public function categoria(){
        return $this->belongsto(Categoria::class);
    }

}
