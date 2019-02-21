<?php

namespace App\Http\Controllers\Guest;

use Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products\ProductVariant;

class CartController extends Controller
{

    /*Lấy thông tin sản phẩm ra giỏ hàng */
    public function getListCart(){
        $cartItem = Cart::content();

        return view('guest.cart.index')->with([
            'carts' => $cartItem,
        ]);
    }
    /*Lưu thông tin sản phẩm vào giỏ hàng */
    public function postSingleCart(Request $request){
        Cart::add([
            'id'     => $request->id,
            'name'   => $request->name,
            'qty'    => $request->qty,
            'price'  => $request->price,
            'options' => [
                'image' => $request->image,
                'size'  => $request->size
            ],
        ]);
        return redirect()->route('gio_hang')->with([
            'success' => 'Sản Phẩm Vừa Được Thêm Vào Giỏ Hàng']);
    }
    /* Xoá Tất Cả  Sản Phẩm khỏi giỏ hàng */
    public function getDeleteCart(){
        Cart::destroy();
        return redirect()->back()->with([
            'success' => "Bạn Vừa Dừng Việc Mua Hàng !"
        ]);
    }
    /*Xoá 1 Sản phẩm khỏi giỏ hàng*/
    public function getDeleteSingleProduct($id){
        Cart::remove($id);
        return redirect()->back()->with([
            'success' => "1 Sản Phẩm Vừa Bị Xoá Khỏi Giỏ Hàng !"
        ]);
    }
    /* Lưu 1 sản phẩm  không muốn mua */
    public function saveSingleProduct($id){
        $item = Cart::get($id);
        Cart::remove($id);

        $re_add = Cart::instance('ProductVariant')->search(function($cartItem,$rowId){
            return $rowId === $id;
        });
        if($re_add->isNotEmpty()){
            return redirect()->back()->with('success', '1 Sản phẩm đã cập nhật giá');
        }
        Cart::instance('ProductVariant')->add([
            'id' => $item->id,
            'name' => $item->name,
            'qty' => $item->qty,
            'price' => $item->price,
            'options' => [
                'image' => $item->options['image'],
                'size' => $item->options['size']
            ],
        ])->associate('App\Models\Product\ProductVariant');
        return redirect()->back()->with([
            'success' => "1 Sản Phẩm Được Lưu Lại "
        ]);
    }
    /*Xoá Sản Phẩm đã lưu */
    public function getDeleteSingleProductSave($id){
        Cart::instance('ProductVariant')->remove($id);
        return back()->with('success', 'Bạn Vừa Xóa 1 Sản Phẩm Được Lưu');
    }
    /*Lấy Lại Sản Phẩm Đã Lưu Lên Lại  Giỏ Hàng */
    public function getProductSaveInCart($id){
        $item = Cart::instance('ProductVariant')->get($id);
        Cart::remove($id);
        $re_add = Cart::instance('default')->search(
            function ($cartItem, $rowId) use ($id) {
                return $rowId === $id;
            }
        );
        if ($re_add->isNotEmpty()) {
            return redirect()->back()->with('success', '1 Sản Phẩm Được Cập Nhật');
        }
        Cart::instance('default')->add([
            'id' => $item->id,
            'name' => $item->name,
            'qty' => $item->qty,
            'price' => $item->price,
            'options' => [
                'image' => $item->options['image'],
                'size' => $item->options['size']
            ],
        ])->associate('App\Models\Product\ProductVariant');
        return redirect()->back()->with([
            'success' => "1 Sản Phẩm Trở Lại Giỏ Hàng "
        ]);
    }
    public function postUpDate(Request $request){
        $item = Cart::get($id);
        Cart::update($rowId, $request->qty);
        return redirect()->back()->with('success', '1 Sản phẩm đã cập nhật giá');
    }
}
