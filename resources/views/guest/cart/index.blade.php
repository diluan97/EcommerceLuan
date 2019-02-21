@extends('layouts.guest.master');
<link rel="stylesheet" type="text/css" href="{{ asset('sublime/styles/cart.css')}}">

@section('content')
<div class="cart_info" style="border-bottom:1px solid gray;padding-top:130px">

		<div class="container">
			<div class="row">
				<div class="col">
                    @if(session()->has('success'))
                        <div class="alert alert-info">
                            {{ session()->get('success') }}
                        </div>
                    @endif
					<!-- Column Titles -->
					<div class="cart_info_columns clearfix">
                        <div class="cart_info_col cart_info_col_product">Sản Phẩm ({{ count($carts) }})</div>

						<div class="cart_info_col cart_info_col_price">Giá - Size</div>
						<div class="cart_info_col cart_info_col_quantity">Số Lượng</div>
						<div class="cart_info_col cart_info_col_total">Số Tiền</div>
					</div>
				</div>
			</div>
			<div class="row cart_items_row">
				<div class="col">

                    <!-- Cart Item -->
                    <?php $count = 1; ?>
                    @foreach($carts as $item)

					<div class="cart_item d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
						<!-- Name -->
						<div class="cart_item_product d-flex flex-row align-items-center justify-content-start">
							<div class="cart_item_image">
								<div><img style="width:170px;height:150px" src="{{ asset('image/product/'.$item->options->image) }}" alt=""></div>
							</div>
							<div class="cart_item_name_container">
								<div class="cart_item_name"><a href="">{{ $item->name }}</a></div>
                                <div class="cart_item_edit">
                                    <form id"formxoa" name="del-cart" method='POST' action="{{ route('xoa_san_pham',$item->rowId) }}">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                        <button style="background:none;border:0px" type="submit">Xoá Sản Phẩm</button>
                                    </form>
                                    </br>
                                    <form  id="formluu" name="save-cart" method="POST" action="{{ route('luu_san_pham',$item->rowId) }}">
                                    @csrf
                                    <button style="background:none;border:0px" type="submit">Lưu Sản Phẩm</button>
                                    </form>
                                </div>
							</div>
						</div>
						<!-- Price -->
						<div class="cart_item_price">{{ number_format($item->price) }} vnđ -
                            @if($item->options->size == 1 )
                                Nhỏ
                            @else
                                Lớn
                            @endif

                        </div>
						<!-- Quantity -->
						<div class="cart_item_quantity">
							<div class="product_quantity_container">
								<div class="product_quantity clearfix">
									<span>Qty</span>
                                    <input id="quantity_input" name='qty' type="text" pattern="[0-9]*" value="{{ $item->qty }}">

									<div class="quantity_buttons" id="quantity_input">
										<div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
										<div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
									</div>
								</div>
							</div>
						</div>
						<!-- Total -->
                        <div class="cart_item_total">{{ number_format(($item->price)*($item->qty)) }} vnđ</div>
                            {{--  <div class="cart_item_total">{{ Cart::total(($item->price),($item->qty)) }} vnđ</div>  --}}
                    </div>
                    <?php $count++ ?>
                    @endforeach

				</div>
			</div>
			<div class="row row_cart_buttons">
				<div class="col">
					<div class="cart_buttons d-flex flex-lg-row flex-column align-items-start justify-content-start">
						<div class="button continue_shopping_button"><a href="{{ route('list_product') }}">Tiếp Tục Mua Hàng</a></div>
						<div class="cart_buttons_right ml-lg-auto">
                            <div class="button clear_cart_button"><a href="{{ route('xoa_gio_hang') }}">Xoá Giỏ Hàng</a></div>

    						</div>
					</div>
				</div>
			</div>
			<div class="row row_extra">
				<div class="col-lg-4">

					<!-- Delivery -->
					<div class="delivery">
						<div class="section_title">Phương Thức Giao Hàng</div>
						<div class="section_subtitle">Hiện tại chưa áp dụng vào thanh toán</div>
						<div class="delivery_options">
							<label class="delivery_option clearfix">Giao hàng trong 1h
								<input type="radio" name="radio">
								<span class="checkmark"></span>
								<span class="delivery_price">Hiện tại chưa áp dụng vào thanh toán</span>
							</label>
							<label class="delivery_option clearfix">Giao hàng Tiêu Chuẩn
								<input type="radio" name="radio">
								<span class="checkmark"></span>
								<span class="delivery_price">Hiện tại chưa áp dụng vào thanh toán</span>
							</label>
							{{--  <label class="delivery_option clearfix">Personal pickup
								<input type="radio" checked="checked" name="radio">
								<span class="checkmark"></span>
								<span class="delivery_price">Free</span>
							</label>  --}}
						</div>
					</div>

					<!-- Coupon Code -->
					<div class="coupon">
						<div class="section_title">Khuyến Mãi</div>
						<div class="section_subtitle">Hiện Tại Không Có Chương Trình Khuyến Mãi</div>
						{{--  <div class="coupon_form_container">
							<form action="#" id="coupon_form" class="coupon_form">
								<input type="text"  class="coupon_input" required="required">
								<button class="button coupon_button"><span>Apply</span></button>
							</form>
						</div>  --}}
					</div>
				</div>

				<div class="col-lg-6 offset-lg-2">
					<div class="cart_total">
						<div class="section_title">Thông tin giỏ hàng</div>
						<div class="section_subtitle">Thông Tin Chình Thức Thanh Toán </div>
						<div class="cart_total_container">
							<ul>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="cart_total_title">Số Tiền</div>
									<div class="cart_total_value ml-auto">{{ Cart::subtotal() }} vnđ</div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="cart_total_title">Giao Hàng</div>
									<div class="cart_total_value ml-auto">Liên hệ</div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="cart_total_title">Tổng Tiền</div>
									<div class="cart_total_value ml-auto">{{ Cart::subtotal() }} vnđ</div>
								</li>
							</ul>
						</div>
						<div class="button checkout_button" style="width:100%"><a href="{{ route('thanh_toan') }}">Tiến Hành Thanh Toán</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <div class="cart_info">
        <div class="container">
            <div class="row">
				<div class="col">
					<!-- Column Titles -->
					<div class="cart_info_columns clearfix">
                        <div class="cart_info_col cart_info_col_product">Sản Phẩm</div>
						<div class="cart_info_col cart_info_col_price">Giá - Size</div>
						<div class="cart_info_col cart_info_col_quantity">Số Lượng</div>
						<div class="cart_info_col cart_info_col_total">Số Tiền</div>
					</div>
				</div>
			</div>
        <div class="row cart_items_row">
				<div class="col">
                    <h2>Sản Phẩm Lưu trữ {{ Cart::instance('ProductVariant')->count() }}</h2>
                    <h5>Chú Ý : sản phẩm lưu trữ sẽ không được thanh toán</h5>
                    <!-- Cart Item -->
                    @foreach(Cart::instance('ProductVariant')->content() as $item)
					<div class="cart_item d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
						<!-- Name -->
						<div class="cart_item_product d-flex flex-row align-items-center justify-content-start">
							<div class="cart_item_image">
								<div><img style="width:170px;height:150px" src="{{ asset('image/product/'.$item->options->image) }}" alt=""></div>
							</div>
							<div class="cart_item_name_container">
								<div class="cart_item_name"><a href="">{{ $item->name }}</a></div>
                                <div class="cart_item_edit">
                                    <form method='POST' action="{{ route('xoa_luu_san_pham',$item->rowId) }}">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button style="background:none;border:0px" type="submit">Xoá Sản Phẩm</button>
                                    {{--  <a href="{{ route('xoa_san_pham',$item->rowId) }}">Lưu Sản Phẩm</a>  --}}
                                    </form>
                                    </br>
                                    <form method='POST' action="{{ route('lay_san_pham_luu_vao_cart',$item->rowId) }}">
                                    @csrf
                                    <button style="background:none;border:0px" type="submit">Mua Lại Sản Phẩm</button>
                                    {{--  <a href="{{ route('xoa_san_pham',$item->rowId) }}">Lưu Sản Phẩm</a>  --}}
                                    </form>
                                    {{--  <a href="#">Lưu Sản Phẩm</a></div>  --}}
                                </div>
							</div>
						</div>
						<!-- Price -->
						<div class="cart_item_price">{{ number_format($item->price) }} vnđ -
                            @if($item->options->size == 1 )
                                Nhỏ
                            @else
                                Lớn
                            @endif

                        </div>
						<!-- Quantity -->
						<div class="cart_item_quantity">
							<div class="product_quantity_container">
								<div class="product_quantity clearfix">
									<span>Qty</span>
									<input id="quantity_input" name='qty' type="text" pattern="[0-9]*" value="{{ $item->qty }}">
									<div class="quantity_buttons">
										<div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
										<div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
									</div>
								</div>
							</div>
						</div>
						<!-- Total -->
						<div class="cart_item_total">{{ number_format(($item->price)*($item->qty)) }} vnđ</div>
                    </div>
                    @endforeach

				</div>
			</div>
            </div>
    </div>

@endsection
