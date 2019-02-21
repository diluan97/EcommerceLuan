<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\SearchTrait;

class ProductOrder extends Model
{
    protected $table = 'product_order';
    protected $fillable = [
        'order_id',
        'amount',
        'product_variant_id',
    ];

    function product()
    {
        return $this->belongsTo('App\Models\Products\Product');
    }
    function product_variant()
    {
        return $this->belongsTo('App\Models\Products\ProductVariant');
    }
    function order()
    {
        return $this->belongsTo('App\Models\Order');
    }
}
