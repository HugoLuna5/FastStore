<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_items';

    protected $fillable = [
      'precio',
      'cantidad',
      'idproducto',
      'order_id'
    ];

    public function order(){
        return $this->belongsTo('App\Model\Order');
    }

    public function producto(){
        return $this->belongsTo('App\Model\Producto', 'idproducto','idproducto');
    }


}
