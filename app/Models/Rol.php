<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    public $table = 'roles';

    protected $fillable = [
        'name'
    ];

    //==================================
    /**
     * Relations
     */
    //============================================
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany(User::class,'role_id','id');
    }
}
