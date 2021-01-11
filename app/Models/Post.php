<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $table = 'post';

    protected $fillable = [
        'userId','id','title','body'
    ];
}
