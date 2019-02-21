<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products\Product;
use App\Models\Products\ProductVariant;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::whereStatus(1)->get();
        return view('guest.category.index')->with(['categories' => $categories]);
    }
    public function getProductByCate($slug){
        $categories = Category::where('slug',$slug)->whereStatus(1)->first();
        $product_cate = Product::with('product_variants')->whereStatus(1)->where('category_id',$categories->id)->get();
        return view('guest.category.list_product_by_cate')->with([
            'product_cate' => $product_cate,
            'categories' => $categories,
        ]);
    }
}
