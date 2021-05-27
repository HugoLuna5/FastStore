<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
    protected $primaryKey = 'idcategoria';

    protected $fillable = [
      'nombre',
      'codigo',
      'descripcion'
    ];
}
