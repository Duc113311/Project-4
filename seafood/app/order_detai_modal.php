<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_detai_modal extends Model
{
    protected $table='order_detail';
    protected $filter=[
        'id',
        'id_order',
        'id_category',
        'qty',
        'price'
      
    ];
}
