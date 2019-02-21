<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products\Product;
use App\Models\Category;
use App\Models\Products\ProductVariant;
use App\Models\Order;
use App\Models\Slide;


class AdminSearchController extends Controller
{
    public function getProduct(Request $request){
        $name = $request->product_name;
        $cate = $request->cateProduct;
        if (!$cate && $name) {
            $products = Product::has('category')->where('name', 'like', '%' . $name . '%')->get();
        }
        if($cate && !$name){
            $products = Product::has('category')->where('category_id', 'like', '%' . $cate . '%')->get();
        }
        if($name && $cate){
            $products = Product::has('category')->where('name', 'like', '%' . $name . '%')
                        ->where('category_id', 'like', '%' . $cate . '%')->get();
        }
        return view('admin.search.product')->with([
            'products' => $products,
        ]);
    }

    public function getCategory(Request $request){
        $name = $request->category;
        $categories = Category::where('name', 'like', '%' . $name . '%')->get();
        return view('admin.search.category')->with([
            'categories' => $categories,
        ]);
    }

    public function getSlide(Request $request){


    }

    public function getOrder(Request $request){
        $name = $request->customer_name;
        $order = $request->order;
        if (!$order && $name) {
            $orders = Order::where('customer_name', 'like', '%' . $name . '%')->get();
        }
        if ($order && !$name) {
            $orders = Order::where('order_status', 'like', '%' . $order . '%')->get();
        }
        if ($name && $order) {
            $orders = Order::where('customer_name', 'like', '%' . $name . '%')
                ->where('order_status', 'like', '%' . $order . '%')->get();
        }
        return view('admin.search.order')->with([
            'orders' => $orders,
        ]);

    }
}
