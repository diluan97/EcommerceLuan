<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\BeautyLink;
use App\Helpers\SearchTrait;

class Product extends Model
{
    use BeautyLink, SearchTrait;
    public static $urlAdminEdit = 'admin_products.edit';
    public static $urlAdminShow = 'admin_products.show';
    public static $urlAdminDestroy = 'admin_products.destroy';
    public static $urlAdminUpdate = 'admin_products.update';

    protected $fillable = [
        'name',
        'slug',
        'status',
        'short_description',
        'category_id',
    ];
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    public function product_variants()
    {
        return $this->hasMany('App\Models\Products\ProductVariant');
    }
    public function orders(){
        return $this->belongsToMany('App\Models\Order','product_order', 'product_order', 'product_variant_id', 'order_id');
    }
    public function productOrders()
    {
        return $this->hasMany('App\Models\Products\ProductOrder');
    }
    public function getStatus()
    {
        if ($this->status == 1) {
            echo "Hoạt Động";
        } else {
            echo "Chưa Hiển Thị Trên Web";
        }
    }
    public function getHot(){
        if($this->hot == 0){
            echo config('custom.hot_display.0');
        }else if($this->hot == 1){
            echo config('custom.hot_display.1');
        }else{
            echo config('custom.hot_display.2');
        }
    }

    // public function updateStatusVariants()
    // {
    //     if ($this->hasVariants()) {
    //         foreach ($this->product_variants as $variant) {
    //             $variant->status = $this->status;
    //             $variant->save();
    //         }
    //     }
    // }
}
