<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'subtotal',
        'envio',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo('App\Model\User');
    }

    public function order_items(){
        return $this->hasMany('App\Model\OrderItem');
    }

}
