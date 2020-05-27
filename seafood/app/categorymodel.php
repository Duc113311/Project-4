<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categorymodel extends Model
{
    protected $table='tbl_category';
    protected $filter=[
        'id',
        'name_menu',
        'idparent',
        'image',
        'desc_food',
        'price'
    ];
}
