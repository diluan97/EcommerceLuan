@extends('layouts.guest.master');
@section('content')


<div class="products">

		<div class="container">
                                    <h2 style="padding-top:20px">Bạn Đang Xem : {{ $categories->name }}</h2>

			<div class="row">
				<div class="col">
					<div class="product_grid">
                        <!-- Product -->

                        @foreach($product_cate as $item)

                            @foreach ($item->product_variants as $variant)
                                @if($variant)
                                    @if($variant->status == 1 )
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
                                    @endif
                                @endif


                            @endforeach
                        @endforeach

					</div>
				</div>
			</div>
		</div>
</div>
@endsection
