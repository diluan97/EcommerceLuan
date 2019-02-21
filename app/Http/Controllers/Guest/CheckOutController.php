<?php

namespace App\Http\Controllers\Guest;

use Cart;
use Validator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Helpers\MakeOrderNumber;
use App\Models\Order;
use App\Events\CheckoutEvent;
use App\Models\Products\Product;
use App\Models\Products\ProductVariant;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

class CheckOutController extends Controller
{
    public function getCheckOut(){
        $cartInfo = Cart::content();
        return view('guest.cart.checkout')->with([
            'cartInfo' => $cartInfo
        ]);
    }

    public function postCheckOut(Request $request){


        $check = [
            'customer_email' => 'required|email',
            'customer_name' => 'required',
            'customer_phone' => 'required|max:10',
            'customer_address' => 'required|max:50',
        ];
        $mess = [
            'customer_email.required' => 'Vui lòng nhập Email',
            'customer_email.email' => 'Vui lòng nhập đúng định dạng email',
            'customer_name.required' => 'Vui Lòng Nhập Tên',
            'customer_phone.required' => 'Vui lòng nhập số điện thoại',
            'customer_phone.max' => 'Số điện thoại tối đa 10 số ',
            'customer_address.required' => 'Vui Lòng Nhập Địa Chỉ Giao Hàng',
        ];
        $validator = Validator::make($request->all(), $check, $mess);
        if ($validator->fails()) {
            return redirect()->route('check_out')->withErrors($validator)->withInput();
        } else {
            $order = Order::create([
                'order_number' => MakeOrderNumber::makeOrderNumber(),
                'total' => str_replace(',', '', Cart::subtotal()),
                // 'user_id'           => 1,
                'customer_email' => $request->customer_email,
                'customer_phone' => $request->customer_phone,
                'customer_name' => $request->customer_name,
                'customer_address' => $request->customer_address,
                'note' => $request->note,
                'order_status' => config('custom.order_statuses.new')
            ]);
            $cartInfor = Cart::content();
            if (count($cartInfor) > 0) {
                $arr_id = [];
                foreach ($cartInfor as $key => $item) {
                    $qty = $this->checkAmount($item->id, $item->qty);
                    $array[$key] = [
                        'order_id' => $order->id,
                        'product_variant_id' => $item->id,
                        'amount' => $qty
                    ];
                    // HistoryImportProduct::updateOrCreateExportInDate($item->id, $qty);
                    // $this->updateAmount($item->id,$item->qty);
                    $order->product_variants()->sync($array);
                }
            }
            Cart::destroy();
            event(new CheckoutEvent($order, $request->customer_email, $request->customer_name));
            return view('guest.checkout_success.thankyou');
        }
    }
    public function checkAmount($id, $qty)
    {
        $variant = ProductVariant::find($id);
        $order = $variant->countAmountOrderWaiting();
        $stock = $variant->amount - $order;
        if ($qty <= $stock)
            return $qty;
        return $stock;
    }
}
