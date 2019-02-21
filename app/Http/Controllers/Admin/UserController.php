<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Validator;
use Hash;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user.index')->with([
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator =
            Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|confirmed',
            ],
            [
                'name.required' => 'Vui lòng nhập tên cho người dùng.',
                'email.required' => 'Vui lòng nhập email của người dùng.',
                'email.email' => 'Email vừa nhập không hợp lệ.',
                'email.unique' => 'Email đã tồn tại.',
                'password' => 'Vui lòng nhập mật khẩu.',
                'password.confirmed' => 'Nhập lại mật khẩu không đúng',
                'password.min' => 'Mật khẩu có ít nhất 6 ký tự',
                'phone.required' => 'Vui lòng nhập số điện thoại cho người dùng',
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'middleware_token' => md5(Carbon::now() . rand(0000, 9999)),
            ]);
            return redirect()->route('admin_users.index');
        }
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
        $item = User::findOrFail($id);
        return view('admin.user.edit', compact('item'));
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
        $user = User::findOrFail($id);

        $validator =
            Validator::make(
            $request->all(),
            [
                'name' => 'required',
                // 'phone' => 'required|min:10|max:12'
            ],
            [
                'name.required' => 'Vui lòng nhập tên cho thành viên',
                // 'phone.required' => 'Vui lòng nhập số điện thoại cho người dùng',
                // 'phone.min' => 'Số điện thoại ít nhất 10 số',
                // 'phone.max' => 'Số điện thoại tối đa là 10 số',
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $user->name = $request->name;
            $user->role = $request->role;

            $user->save();
            return redirect()->back()->with('success', 'Lưu dữ liệu thành công');
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
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back();
    }
}
