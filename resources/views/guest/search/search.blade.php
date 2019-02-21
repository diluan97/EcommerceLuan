@extends('layouts.guest.master');

@section('content')
    <div class="row" style="padding-top:120px">
        <div class="products">

		<div class="container">
            @if(!$products->count())
                            <h2>Không Có Sản Phẩm Nào Tên : <strong>{{ $product_name }}</strong> </h2>
                            @else
                            <br>
                            <h2>Kết Quả Tìm Kiếm :<strong>{{ $product_name }}</strong></h2>
			<div class="row">
				<div class="col">
                    <h1 style="color:black"></h1>
					<div class="product_grid">

                        <!-- Product -->
                        @foreach($products as $item)
                        @foreach ($item->product_variants as $variant)
						    <div class="product">
                                <div class="product_image">
                                    <a href="{{ route('product',$item->slug) }}">
                                    <img style="height:220px" src="{{ asset('image/product/'.$variant->image) }}" alt="">

                                    </a>
                                </div>
                                <div class="product_extra product_sale"><a href="categories.html">{{ $item->getHot() }}</a></div>
                                <div class="product_content">
                                    <div class="product_title"><a href="{{ route('product',$item->slug) }}">{{ $item->name }} {{ $variant->getSizeGuest() }}</a></div>
                                    <div class="product_price">{{ number_format($variant->price) }}vnđ</div>
                                </div>
                            </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>

            </div>
            @endif
		</div>
        </div>
            </div>
@endsection
