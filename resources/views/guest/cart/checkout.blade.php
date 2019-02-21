@extends('layouts.guest.master');
<link rel="stylesheet" type="text/css" href="{{ asset('sublime/styles/checkout.css')}}">

@section('content')
<script type='text/javascript'>
     function submit()
      {
         document.forms["checkout_form"].submit();
      }
</script>
<div class="checkout">
		<div class="container">
			<div class="row">

				<!-- Billing Info -->
				<div class="col-lg-6">
					<div class="billing checkout_section">
                        @if(session()->has('success'))
                        <div class="alert alert-info">
                            {{ session()->get('success') }}
                        </div>
                    @endif
						<div class="section_title">Địa Chỉ Thanh Toán</div>
						<div class="section_subtitle">Vui Lòng Điền Đầy Đủ Thông Tin</div>
						<div class="checkout_form_container">
							<form action="{{ route('thanh_toan') }}" method="POST" id="checkout_form" name="checkout" class="checkout_form">
                                @csrf
                                <div>
									<!-- Email -->
									<label for="checkout_name">Tên Khách Hàng*</label>
                                    <input type="phone" id="checkout_email" name="customer_name" class="checkout_input" required="required" value="{{ old('customer_name') }}">
                                    @if ($errors->has('customer_name'))
                                        <div class="alert alert-success" role="alert">
                                            <span class="invalid-feedback" style="display:block;">
                                            <strong>{{ $errors->first('customer_name') }}</strong></span>
                                        </div>
                                    @endif
								</div>
                                <div>
									<!-- Phone no -->
									<label for="checkout_phone">Số Điện Thoại*</label>
                                    <input type="phone" id="checkout_phone" name="customer_phone" class="checkout_input" required="required" value="{{ old('customer_phone') }}">
                                    @if ($errors->has('customer_phone'))
                                        <div class="alert alert-success" role="alert">
                                            <span class="invalid-feedback" style="display:block;">
                                            <strong>{{ $errors->first('customer_phone') }}</strong></span>
                                        </div>
                                    @endif
								</div>
								<div>
									<!-- Email -->
									<label for="checkout_email">Email*</label>
                                    <input type="phone" id="checkout_email" name="customer_email" class="checkout_input" required="required" value="{{ old('customer_email') }}">
                                    @if ($errors->has('customer_email'))
                                        <div class="alert alert-success" role="alert">
                                            <span class="invalid-feedback" style="display:block;">
                                            <strong>{{ $errors->first('customer_email') }}</strong></span>
                                        </div>
                                    @endif
								</div>
								<div>
									<!-- Address -->
                                    <label for="checkout_address">Địa Chỉ Giao Hàng*</label>
                                    <textarea class="checkout_input" name="customer_address" id="checkout_address" cols="30" rows="10">{{ old('customer_address') }}</textarea>
                                    @if ($errors->has('customer_address'))
                                        <div class="alert alert-success" role="alert">
                                            <span class="invalid-feedback" style="display:block;">
                                            <strong>{{ $errors->first('customer_address') }}</strong></span>
                                        </div>
                                    @endif
									{{--  <input type="text" id="checkout_address" name="customer_address" class="checkout_input" required="required">  --}}
								</div>
                                <div>
									<!-- Note -->
                                    <label for="checkout_address">Ghi Chú</label>
                                    <textarea class="checkout_input" name="note" id="checkout_address" cols="30" rows="10"></textarea>
									{{--  <input type="text" id="checkout_address" name="customer_address" class="checkout_input" required="required">  --}}
								</div>


								{{--  <div class="checkout_extra">
									<div>
										<input type="checkbox" id="checkbox_terms" name="regular_checkbox" class="regular_checkbox" checked="checked">
										<label for="checkbox_terms"><img src="images/check.png" alt=""></label>
										<span class="checkbox_title">Terms and conditions</span>
									</div>
									<div>
										<input type="checkbox" id="checkbox_account" name="regular_checkbox" class="regular_checkbox">
										<label for="checkbox_account"><img src="images/check.png" alt=""></label>
										<span class="checkbox_title">Create an account</span>
									</div>
									<div>
										<input type="checkbox" id="checkbox_newsletter" name="regular_checkbox" class="regular_checkbox">
										<label for="checkbox_newsletter"><img src="images/check.png" alt=""></label>
										<span class="checkbox_title">Subscribe to our newsletter</span>
									</div>
                                </div>  --}}
                                <div class="button order_button" style="width:100%" >
                                    <a href="javascript:submit()"  onclick="this.form['checkout'].submit()">Tiến Hành Thanh Toán</a>
                                    {{--  <button style="width:100%" class="button order_button" type="Submit">Tiến Hành Thanh Toán</button>  --}}
                                </div>
							</form>
						</div>
					</div>
				</div>

				<!-- Order Info -->

				<div class="col-lg-6">
					<div class="order checkout_section">
						<div class="section_title">Đơn Hàng Của Bạn</div>
						<div class="section_subtitle">Danh Sách Đơn Hàng</div>

						<!-- Order details -->
						<div class="order_list_container">
							<div class="order_list_bar d-flex flex-row align-items-center justify-content-start">
								<div class="order_list_title">Sản Phẩm</div>
								<div class="order_list_value ml-auto">Giá Tiền</div>
							</div>
							<ul class="order_list">
                                @foreach($cartInfo as $item)
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="order_list_title"><h4>{{ $item->name }}</h4></div>
									<div class="order_list_value ml-auto">{{ number_format(($item->price)*($item->qty)) }} vnđ</div>
								</li>
                                @endforeach()
                                <li class="d-flex flex-row align-items-center justify-content-start">
									<div class="order_list_title">Tổng Tiền</div>
									<div class="order_list_value ml-auto">{{ Cart::subtotal()}} vnđ</div>
								</li>
							</ul>
						</div>

						{{--  <!-- Payment Options -->
						<div class="payment">
							<div class="payment_options">
								<label class="payment_option clearfix">Paypal
									<input type="radio" name="radio">
									<span class="checkmark"></span>
								</label>
								<label class="payment_option clearfix">Cach on delivery
									<input type="radio" name="radio">
									<span class="checkmark"></span>
								</label>
								<label class="payment_option clearfix">Credit card
									<input type="radio" name="radio">
									<span class="checkmark"></span>
								</label>
								<label class="payment_option clearfix">Direct bank transfer
									<input type="radio" checked="checked" name="radio">
									<span class="checkmark"></span>
								</label>
							</div>
						</div>  --}}

						<!-- Order Text -->
						<div class="order_text">Chúng Tôi Sẽ Áp Dụng Ship Cod (Lấy Tiền Khi Nhận Hàng) Với Tất Cả Đơn Hàng
                                    Quí Khách Sẽ Nhận Hàng Trong 1 tiếng Đối Với Các Đơn Hàng Nội Thành
                                    Tối Đa 2 tiếng Đối Với Các Đơn Hàng Ngoại Thành</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
