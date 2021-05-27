<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $primaryKey = 'idproducto';

    protected $table = 'productos';

    protected $fillable = [
      'nombre',
      'codigo',
      'descripcion',
      'imagen',
      'color',
      'precio',
      'idestado',
      'idcategoria'
    ];

    public function categoria(){
        return $this->hasOne('App\Model\Categoria','idcategoria', 'idcategoria');
    }
}
