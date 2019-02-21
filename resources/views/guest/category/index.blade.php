@extends('layouts.guest.master');
<link rel="stylesheet" type="text/css" href="{{ asset('sublime/styles/categories.css')}}">

@section('content')
<div class="products">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="product_grid">

                        <!-- Product -->
                        @foreach($categories as $item)

						    <div class="product">
                                <div class="product_image">
                                    <a href="{{ route('category_slug',$item->slug) }}">
                                    <img  style="height:220px" src="{{ asset('image/category/'.$item->image) }}" alt="">
                                    </a>
                                </div>
                                <div class="product_content">
                                    <div class="product_title"><a href="{{ route('category_slug',$item->slug) }}">{{ $item->name }}</a></div>
                                </div>
                            </div>
                        @endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
