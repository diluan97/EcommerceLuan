<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products\Product;
use App\Models\Category;
use Validator;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category')->paginate(10);
        $category = Category::all();
        return view('admin.products.index')->with(['products' => $products,
                                                   'category' => $category]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $poducts = Product::Create();
        return redirect($poducts->urlAdminEdit());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit')->with(['item' => $product, 'categories' => $categories]);
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
        $item = Product::findOrFail($id);
        $categories = Category::all();
        $rule = [
            'name' => 'required',
            'short_description' => 'required|max:1000',
            'category_id' => 'required'

        ];
        $mess =[
            'name.required' => "Vui lòng nhập tên",
            'category_id.required' => "Vui lòng chọn danh mục",
            'short_description.required' => "Vui lòng nhập mô tả",
            'short_description.max' => "Mô tả  quá dài "
        ];
        $validator = Validator::make(Input::all(), $rule, $mess);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $item->name = $request->name;
            $item->slug = str_slug($request->name) . rand(100000, 999999);
            $item->short_description = $request->short_description;
            $item->hot = $request->hot;
            $item->category_id = $request->category_id;
            $item->save();
            if ($request->variant) {
                return redirect()->route('admin_product_variant.index', ['product_slug' => $item->slug]);
            } elseif ($request->publish) {
                $item->status = 1;
                $item->save();
            } else {
                $item->status = 0;
                $item->save();
            }
            $item->save();
            return redirect()->back()->with([
                'status' => 'Cập nhật dữ liệu thành công!',
                'categories' => $categories
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Product::findOrFail($id);
        $item->delete();
        return redirect()->route('admin_products.index')->with([
            'status' => 'Xóa dữ liệu thành công!',
        ]);
    }

}
