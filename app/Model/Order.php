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
        return $this->hasOne('App\User','id','user_id');
    }

    public function items(){
        return $this->hasMany('App\Model\OrderItem','order_id','id');
    }

}
