<?php

namespace App\Http\Controllers\Guest;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;


class ContactController extends Controller
{
    public function getContact(){
        return view('guest.contact.index');
    }

    public function postContact(Request $request){
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'subject' =>'required',
            'message' => 'required'

        ];
        $message = [
            'email.required' => 'Email là trường bắt buộc',
            'email.email' => 'Email không đúng định dạng',
            'name.required' => 'Vui lòng Điền Họ Tên ',
            'phone.required' => 'Vui Lòng Điền Số Điện Thoại',
            'subject.required' => "Vui Lòng Điền Tiêu Đề",
            'message.required' => "Vui Lòng Điền Nội Dung"
        ];
        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();


        } else {
            $contact = new Contact;
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->phone = $request->phone;
            $contact->subject = $request->subject;
            $contact->message = $request->message;
            $contact->save();
            return redirect()->back()->with([
                'success' => " Gửi Thông Tin Liên Lạc Thành Công ",
            ]);
        }
    }
}
