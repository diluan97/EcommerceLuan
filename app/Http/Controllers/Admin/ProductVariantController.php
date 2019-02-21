<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products\Product;
use App\Models\Products\ProductVariant;
use App\Models\Category;
use Validator;
use Illuminate\Support\Facades\Input;

class ProductVariantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $product = Product::whereSlug($slug)->firstOrFail();
        $variants = $product->product_variants;
        return view('admin.product_variant.index')->with([
            'variants' => $variants,
            'product' => $product,
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
    public function store(Request $request,$slug)
    {
        $product = Product::whereSlug($slug)->firstOrFail();
        if (count($product->product_variants) > 0) {
            $latest_variant = $product->product_variants()->latest()->first();
            $variant = ProductVariant::create([
                'product_id' => $product->id,
                'position' => $latest_variant->position + 1
            ]);
        } else {
            $variant = ProductVariant::create([
                'product_id' => $product->id
            ]);
        }
        return redirect($variant->urlAdminEdit($slug));
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
    public function edit($slug,$id)
    {
        $variant = ProductVariant::findOrFail($id);
        $product = Product::whereSlug($slug)->firstOrFail();
        return view('admin.product_variant.edit')->with([
            'item' => $variant,
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$slug, $id)
    {
        $item = ProductVariant::findOrFail($id);
        $rule = [
            'price' => 'required|max:20|regex:/^-?[0-9]+(?:\.[0-9]{1,2})?$/',
            'amount' => 'required|integer|between:1,10000',

        ];
        $validator = Validator::make(Input::all(), $rule);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $item->size = $request->size;
            $item->price = $request->price;
            $item->amount = $request->amount;
            if ($request->hasFile('image')) {
                $file = $request->image;
                $new_image_name = time() . $file->getClientOriginalName();
                $item->image = $new_image_name;
                $file->move('image/product', $new_image_name);
            }
            // $item->position = $request->position;

            if ($request->publish) $item->status = 1;
            if ($request->draff) $item->status = 0;
            $item->save();
            return redirect()->route('admin_product_variant.index', ['product_slug' => $slug])->with(['status' => 'Cập nhật dữ liệu thành công!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug,$id)
    {
        $item = Product::findOrFail($id);
        $item->delete();
        return redirect()->route('admin_product_variant.index')->with([
            'status' => 'Xóa dữ liệu thành công!',
        ]);
    }

    public function sortPosition(Request $request, $id)
    {
        $item = ProductVariant::findOrFail($id);
        $item->position = $request->position;
        $item->save();
        return redirect()->back();
    }
}
