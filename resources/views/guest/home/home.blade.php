@extends('layouts.guest.master');
@include('share.slide')
@section('ads')
<div class="avds">
		<div class="avds_container d-flex flex-lg-row flex-column align-items-start justify-content-between">
			<div class="avds_small">
				<div class="avds_background" style="background-image:url('{{asset('image/slide/'.$img1)}}')"></div>
				<div class="avds_small_inner">
					<div class="avds_discount_container">
						<img src="images/discount.png" alt="">
						<div>
							<div class="avds_discount">
								<div><span></span></div>
								<div></div>
							</div>
						</div>
					</div>
					<div class="avds_small_content">
						<div class="avds_title">Các Món Gà</div>
						<div class="avds_link"><a href="{{ route('list_product') }}">Mua Ngay</a></div>
					</div>
				</div>
			</div>
			<div class="avds_large">
				<div class="avds_background" style="background-image:url('{{asset('image/slide/'.$img2)}}')"></div>
				<div class="avds_large_container">
					<div class="avds_large_content">
						<div class="avds_title">Các Loại Hải Sản</div>
						<div class="avds_text">Chuyên cung cấp hải sản tươi sống và tất cả các loại ốc tươi sống.</div>
						<div class="avds_link avds_link_large"><a href="{{ route('category') }}">Mua Ngay</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('content')
    <div class="products">
		<div class="container">
			<div class="row">
				<div class="col">

					<div class="product_grid">

                        <!-- Product -->
                        @foreach($products as $item)
                            @foreach ($item->product_variants as $variant)

                            @if($item->status = 1)

						    <div class="product">

                                <div class="product_image">
                                    <a href="{{ route('product',$item->slug) }}"><img style="height:220px" src="{{ asset('image/product/'.$variant->image) }}" alt="">
                                    </a>
                                </div>
                                <div class="product_extra product_sale"><a href="categories.html">{{ $item->getHot() }}</a></div>
                                <div class="product_content">
                                    <div class="product_title">
                                        <a href="{{ route('product',$item->slug) }}">{{ $item->name }} {{ $variant->getSizeGuest() }}</a>
                                        <input type="hidden" id='{{ $item->name }}' class="nameCart">
                                    </div>
                                    <div class="product_price">
                                        <div class="row nameCart" id="{{ $item->name }}" name="{{ $variant->size }}" >
                                            <div class="col-sm-9 priceCart" style="font-size:25px;"  id="{{ $variant->price }}" >{{ number_format($variant->price) }}vnđ</div>
                                            <input class="token" type="hidden" name="_token" value="{!! csrf_token() !!}">
                                            <div  class="col-sm-3 imageCart" id="{{ $variant->image }}">
                                                <i  id="{{ $variant->id }}"  style="font-size:30px;cursor:pointer"
                                                    class="addToCart fa fa-cart-plus" >
                                                </i>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                            @endforeach

					</div>
				</div>
			</div>
		</div>
    </div>


@endsection
