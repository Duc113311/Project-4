<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsFoodModel extends Model
{
    protected $table='news_food';
    protected $primaryKey='id';
    protected $filter=[];
}
