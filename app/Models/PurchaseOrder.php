<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    public $table = 'purchase_order';

    protected $fillable = [
        'code','user_id','addres_id'
    ];

    /**
     * ===================================================================
     * Relations
     * ===================================================================
     */
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(
            Product::class,
            'order_product',
            'purchase_order_id',
            'product_id'
        )
            ->withPivot('count_product')
            ->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function address()
    {
        return $this->belongsTo(Address::class,'addres_id','id');
    }
}
