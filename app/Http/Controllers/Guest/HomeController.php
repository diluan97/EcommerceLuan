<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products\Product;
use App\Models\Category;
use App\Models\Products\ProductVariant;
use App\Models\Slide;
use Cart;

class HomeController extends Controller
{


    public function addToCartAjax(Request $request){
        Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'qty' => $request->qty,
            'price' => $request->price,
            'options' => [
                'image' => $request->image,
                'size' => $request->size
            ],
        ]);
        $carts = Cart::content();
        $amount = Cart::instance('default')->count();
        $data = [
            'TongQyt' => $amount
        ];
        return response()->json($data,200);
        return response()->json($carts,200);
        // return $amount;
    }

    public function search(Request $request){
        $name = $request->product_name;
        // $products = Product::has('category')->search($name)->whereStatus(1)->get();
        $products = Product::has('category')->where('name','like','%'.$name.'%')->whereStatus(1)->get();
        // dd($products);
        return view('guest.search.search')->with([
            'products' => $products,
            'product_name' => $name,
        ]);
    }
    public function searchAjax(Request $request){
        $name = $request->get('query');
        if($name){
            $products  = Product::where('name', 'LIKE', "%{$name}%")->whereStatus(1)->get();
        }
        return response()->json($products,200);


    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slide1 = Slide::find(1)->first();
        $img1 = $slide1->image;
        $slide2 = Slide::where('id',2)->first();
        $img2 = $slide2->image;
        $products = Product::with('product_variants')->whereStatus(1)->inRandomOrder(8)->get();
        // dd($products);
        return view('guest.home.home')->with([
            'products'=>$products,
            'img1'     => $img1,
            'img2'     => $img2
            ]);
    }
    public function getDetailsProduct($slug){
        $products = Product::with('product_variants')->whereStatus(1)->orderByRaw('RAND()')->take(4)->get();
        $details = Product::with('product_variants')->whereStatus(1)->where('slug',$slug)->first();
        $variant = $details->product_variants->first();
        $image = $variant->image;
        return view('guest.product.index')->with([
            'item' => $details,
            'variant' => $variant,
            'products'=> $products
        ]);
    }
    public function getListProduct()
    {
        $category = Category::whereStatus(1)->get();
        $products = array();
        foreach($category as $cate){
        $products[$cate->id] = Product::with('product_variants')->whereStatus(1)->where('category_id',$cate->id)->inRandomOrder(4)->get();
        // $details = Product::with('product_variants')->where('slug', $slug)->first();

        // return $products;
        }
        return view('guest.product.list_product')->with([
            'products' => $products,
            'category' => $category,
        ]);
    }
    public function thankYou(){
        return view('guest.checkout_success.thankyou');
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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
