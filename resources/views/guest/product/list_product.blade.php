@extends('layouts.guest.master');

@section('content')
    <div class="row" style="padding-top:120px">
        <div class="products">

		<div class="container">

			<div class="row">
				<div class="col">
                    @foreach($category as $cate)
                    <h1 style="color:black">{{ $cate->name }}</h1>
					<div class="product_grid">

                        <!-- Product -->
                        @foreach($products[$cate->id] as $item)
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
                                                <div class="product_price">
                                        <div class="row">
                                            <div class="col-sm-9" style="font-size:25px;" >{{ number_format($variant->price) }}vnđ</div>
                                            <div  class="col-sm-3">
                                                <i  id="addToCart"
                                                    style="font-size:30px;cursor:pointer"
                                                    class="fa fa-cart-plus"
                                                    onclick="addCart()"></i>
                                            </div>
                                        </div>
                                    </div>
                                            </div>
                                        </div>
                                    <input type="hidden" id="idCart" name="id" value="{{ $variant->id }}">
                            <input type="hidden" id="qtyCart" value="1">
                            <input type="hidden" id="nameCart" name="name" value="{{ $item->name }}">
                            <input type="hidden" id="sizeCart" name="size" value="{{ $variant->size }}">
                            <input type="hidden" id="priceCart" name="price" value="{{ $variant->price }}">
                            <input type="hidden" id="imageCart" name="image" value="{{ $variant->image }}">
                            @csrf
                                    @endif
                                @endif


                            @endforeach
                        @endforeach

                    </div>
                    @endforeach
				</div>
			</div>
		</div>
</div>
    </div>
    <script>
        function addCart(){

        var id = $('#idCart').val();
        alert(id);
        {{--  var name = $('#nameCart').val();
        var size = $('#sizeCart').val();
        var qty  = $('#qtyCart').val();
        var price = $('#priceCart').val();
        var image = $('#imageCart').val();
        var _token = $('input[name="_token"]').val();
        if(id){
            $.ajax({
                    type : "POST",
                    url: "{{ route('cartAjax') }}",
                    data: {
                        _token:_token,
                        id : id,
                        name : name,
                        qty : qty,
                        size : size,
                        price : price,
                        image : image,
                    },
                    success : function(data){
                        $.each(data,function(i ,val){
                            $(document).find('#amountCart').html(val).css('color','red');
                        })
                    }
                });
            }  --}}

    }
    </script>
@endsection
