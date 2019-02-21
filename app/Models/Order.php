<?php

namespace App\Models;

use App\Helpers\BeautyLink;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\SearchTrait;

class Order extends Model
{
    use  BeautyLink, SearchTrait;
    public static $urlAdminEdit = 'admin_order.edit';
    public static $urlAdminShow = 'admin_order.show';
    public static $urlAdminDestroy = 'admin_order.destroy';
    public static $urlAdminUpdate = 'admin_order.update';

    protected $fillable = [
        'order_number',
        'note',
        'total',
        'customer_address',
        'order_status',
        'customer_name',
        'customer_phone',
        'customer_email',
        'order_status'
    ];



    public function products()
    {
        return $this->belongsToMany('App\Models\Products\ProductVariant', 'product_order', 'product_variant_id', 'order_id')->withPivot('amount');
    }
    public function product_variants()
    {
        return $this->belongsToMany('App\Models\Products\ProductVariant', 'product_order', 'order_id', 'product_variant_id')->withPivot('amount');
    }
    function productOrders()
    {
        return $this->hasMany('App\Models\Products\ProductOrder');
    }
    public static function filter($request)
    {
        $query = self::query();
        $key = $request->key;
        $status_payment = $request->status_payment;
        $order_status = $request->order_status;
        if ($key)
            $query->where('order_number', 'like', '%' . $key . '%')
            ->orWhere('customer_name', 'like', '%' . $key . '%')
            ->orWhere('customer_phone', 'like', '%' . $key . '%')
            ->orWhere('customer_email', 'like', '%' . $key . '%');
        if ($status_payment && $status_payment != 'all') {
            $query->whereStatusPayment($status_payment);
        }
        if ($order_status && $order_status != 'all') {
            $query->whereOrderStatus($order_status);
        }
        if ($request->start_date && $request->end_date) {
            $start_date = $request->start_date . " 00:00:00";
            $end_date = $request->end_date . " 23:59:59";
            $query->whereBetween('created_at', array($start_date, $end_date));
        }
        if ($request->product_id) {
            $id = $request->product_id;
            $query->whereHas('product_variants', function ($q) use ($id) {
                $q->where('product_variant_id', $id);
            });
        }
        return $query;
    }
    public function getTotal()
    {
        $symbol = ' VNÐ';
        $symbol_thousand = '.';
        $decimal_place = 0;
        $number = $this->total;
        $pledge_value = number_format($number, $decimal_place, '', $symbol_thousand);
        return $pledge_value . $symbol;
    }
    public function getStatus()
    {
        if ($this->order_status == config('custom.order_statuses.draff'))
            echo config('custom.order_status_display.D');
        elseif ($this->order_status == config('custom.order_statuses.waiting'))
            echo config('custom.order_status_display_be.W');
        elseif ($this->order_status == config('custom.order_statuses.delivered'))
            echo config('custom.order_status_display_be.De');
        elseif ($this->order_status == config('custom.order_statuses.new'))
            echo config('custom.order_status_display_be.N');
        elseif ($this->order_status == config('custom.order_statuses.processing'))
            echo config('custom.order_status_display_be.P');
    }
    public function customerInfo()
    {
        echo "<ul>
            <li>" . $this->customer_email . "</li>
            <li>" . $this->customer_name . "</li>
            <li>" . $this->customer_phone . "</li>
        </ul>";
    }

}
