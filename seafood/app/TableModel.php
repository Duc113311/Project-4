<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TableModel extends Model
{
    protected $table='tbl_table';
    protected $filter=[
        'id',
        'name_table',
        'number_people',
        'status'
       
    ];
}
