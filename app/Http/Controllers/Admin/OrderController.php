<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Products\Product;
use App\Http\Controllers\Controller;
use App\Models\Products\ProductVariant;
use App\Models\Products\ProductOrder;



class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orders = Order::orderBy('id', 'desc')->paginate(20);
        return view('admin.order.index')->with([
            'orders' => $orders,
            'key' => $request->key,
            'status_payment' => $request->status_payment,
            'order_status' => $request->order_status
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $query = Order::query();
        $key = $request->key;
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
        $orders = $query->paginate(20);
        return view('admin.order.index')->with([
            'orders' => $orders,
            'key' => $key,
            'order_status' => $order_status
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id)->load('products');
        $statuses = config('custom.order_status_display_be');
        $product = ProductOrder::with('order', 'product_variant')->where('order_id',$id)->get();
        foreach($product as $pro){
           $id =  $pro->product_variant->product_id;
           $products = Product::where('id',$id)->get();
        }
        // $variant = $product->product_variant;

        return view('admin.order.edit')->with(['item' => $order,
                                                'statuses' => $statuses,
                                                'product'  => $product,
                                                'products' => $products,
                                                'order'    => $order
                                                // 'variant'  => $variant
                                                 ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->order_status = $request->status;
        $order->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->products()->detach();
        $order->delete();
        return redirect()->back();
    }

}
