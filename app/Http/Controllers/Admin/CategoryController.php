<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Validator;
use Illuminate\Support\Facades\Input;

class CategoryController extends Controller
{


    /**
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(10);
        $category = Category::all();
        return view('admin.category.index')->with(['categories' => $categories,
                                                   'category'   => $category]);
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
        $item = Category::create([
            'context_type' => $request->context_type,
            'status' => 0
        ]);
        return redirect()->route('admin_category.edit', ['id' => $item->id]);
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
        $item = Category::findOrFail($id);
        return view('admin.category.edit', ['item' => $item]);
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
        $item = Category::findOrFail($id);

        $rule = [
            'name' => 'required',
            'description' => 'required|sometimes|max:1000'

        ];
        $validator = Validator::make(Input::all(), $rule);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $item->name = $request->name;
            $item->slug = str_slug($request->name) . rand(100000, 999999);
            $item->parent_id = 0;
            $item->description = $request->description;
            $item->context_type = $request->name;
            if ($request->hasFile('image')) {
                $file = $request->image;
                $new_image_name = time() . $file->getClientOriginalName();
                $item->image = $new_image_name;
                $file->move('image/category', $new_image_name);
            }
            $item->save();
            if ($request->publish) {
                $item->status = 1;
                $item->save();
            } else {
                $item->status = 0;
                $item->save();
            }
            return redirect()->back()->with(['stt' => 'Cập nhật thành công']);
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
        $item = Category::findOrFail($id);
        $item->delete();
        return redirect()->route('admin_category.index')->with(['success' => 'Cập nhật thành công']);
    }
}
