<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dulceria extends Model
{
    //
    protected $fillable = [
        'Nombre',
        'Precio',
        'Descripcion',
        'TipoAlimento',
        'Categoria',
        'Stock',
    ];
}
