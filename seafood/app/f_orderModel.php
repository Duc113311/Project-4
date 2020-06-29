<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class f_orderModel extends Model
{
    protected $table='f_order';
    protected $filter=[
        'id',
        'totail',
        'note',
        'id_customer',
        'name_cus',
        'address',
        'phone',
        'status',
        'date',
        'time'
      
    ];
}
