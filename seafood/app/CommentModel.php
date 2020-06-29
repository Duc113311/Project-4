<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentModel extends Model
{
    protected $table='f_comment';
    protected $primaryKey='id';
    protected $filter=[];
}
