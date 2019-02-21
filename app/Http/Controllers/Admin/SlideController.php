<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slide;
use Validator;
use Illuminate\Support\Facades\Input;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slide::paginate(10);
        return view('admin.slider.index')->with(['sliders' => $sliders]);
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
        $item = Slide::create([
            'status' => 0,
            'logan' => "Aaaaaaa"
        ]);
        return redirect()->route('admin_slide.edit', ['id' => $item->id]);
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
        $item = Slide::findOrFail($id);

        return view('admin.slider.edit', ['item' => $item]);
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
        $item = Slide::findOrFail($id);
        $rule = [
            'name' => 'required',
            'logan'=> 'required',
            'info' => 'required'

        ];
        $validator = Validator::make(Input::all(), $rule);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $item->name = $request->name;
            $item->logan = $request->logan;
            $item->info  = $request->info;
            $item->slug = str_slug($request->name) . rand(100000, 999999);
            if ($request->hasFile('image')) {
                $file = $request->image;
                $new_image_name = time() . $file->getClientOriginalName();
                $item->image = $new_image_name;
                $file->move('image/slide', $new_image_name);
            }
            $item->save();
            if ($request->publish) {
                $item->status = 1;
                $item->save();
            } else {
                $item->status = 0;
                $item->save();
            }
            return redirect()->back()->with(['status' => 'Cập nhật thành công']);
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
        $item = Slide::findOrFail($id);
        $item->delete();
        return redirect()->route('admin_slide.index')->with(['success' => 'Cập nhật thành công']);
    }
}
