<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table = 'product';

    protected $fillable = [
        'description','price'
    ];

    /**
     * ==============================================================================
     * relations
     * ================================================================================
     */
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function orderPurchase()
    {
        return $this->belongsToMany(
            PurchaseOrder::class,
            'order_product',
            'product_id',
            'purchase_order_id'
        )
            ->withPivot('count_product')
            ->withTimestamps();
    }


}
