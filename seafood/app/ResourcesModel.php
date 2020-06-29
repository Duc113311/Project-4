<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResourcesModel extends Model
{
    protected $table='resources';
    protected $filter=[
        'id',
        'name_res',
        'idparent',
        'image'
    ];
}
