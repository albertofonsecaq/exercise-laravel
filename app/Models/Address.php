<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public $table = 'address';

    protected $fillable = [
        'description','user_id'
    ];

    /**
     * =================================================================
     * Relations
     * ====================================================================
     */
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function purchaseOrder()
    {
        return $this->hasOne(PurchaseOrder::class,'addres_id','id');
    }

}
