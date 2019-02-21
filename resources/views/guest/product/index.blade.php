@extends('layouts.guest.master');
<link rel="stylesheet" type="text/css" href="{{ asset('sublime/styles/product.css')}}">
@section('home')
<script type='text/javascript'>
     function submit()
      {
         document.forms["myform"].submit();
      }
</script>
<div class="home">
            <div class="home_container">
                <div class="home_background" style="background-image:url('{{asset('image/product/'.$variant->image)}}')"></div>
                <div class="home_content_container">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="home_content">
                                    <div class="home_title">{{ $item->name }}{{ $variant->getSizeGuest() }}<span>.</span></div>
                                    <div class="home_text">
                                        <p>{!! $item->short_description !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('content')
<div class="product_details">
            <div class="container">
                <div class="row details_row">

                    <!-- Product Image -->
                    <div class="col-lg-6">
                        <div class="details_image">
                            <div class="details_image_large"><img src="{{ asset('image/product/'.$variant->image) }}" alt="">
                                <div class="product_extra product_sale"><a href="">{{ $item->getHot() }}</a></div>
                            </div>
                            {{--  <div class="details_image_thumbnails d-flex flex-row align-items-start justify-content-between">
                                <div class="details_image_thumbnail active" data-image="images/details_1.jpg"><img src="images/details_1.jpg" alt=""></div>
                                <div class="details_image_thumbnail" data-image="images/details_2.jpg"><img src="images/details_2.jpg" alt=""></div>
                                <div class="details_image_thumbnail" data-image="images/details_3.jpg"><img src="images/details_3.jpg" alt=""></div>
                                <div class="details_image_thumbnail" data-image="images/details_4.jpg"><img src="images/details_4.jpg" alt=""></div>
                            </div>  --}}
                        </div>
                    </div>

                    <!-- Product Content -->
                    <div class="col-lg-6">
                        <div class="details_content">
                            <div class="details_name">{{ $item->name }} {{ $variant->getSizeGuest() }}</div>
                            {{--  <div class="details_discount">$890</div>  --}}
                            <div class="details_price">{{ number_format($variant->price) }} vnđ</div>

                            <!-- In Stock -->
                            <div class="in_stock_container">
                                <div class="availability">Tình Trạng:</div>
                                <span>{{ $variant->getAmount() }}</span>
                            </div>
                            <div class="details_text">
                                <p>{!! $item->short_description !!}</p>
                            </div>
                            <div>
                                @if(session()->has('success'))
                        <div class="alert alert-info">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                            </div>
                            <!-- Product Quantity -->
                            <form  id="myform" name="cart" method="POST" action="{{ route('them_vao_gio_hang') }}">
                                @csrf
                                    <div class="product_quantity_container">
                                        <div class="product_quantity clearfix">
                                            <span>Qty</span>
                                            <input id="quantity_input" name='qty' type="text" min="1" pattern="[0-9]*" value="1">
                                            <div class="quantity_buttons">
                                                <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
                                                <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                                        </div>
                                    </div>
                                    {{--  <div class="button cart_button">

                                            <a href=""javascript:submit();"">Thêm Vào Giỏ Hàng</a>
                                        </form>
                                    </div>  --}}


                                            <input type="hidden" name="id" value="{{ $variant->id }}">
                                            <input type="hidden" name="name" value="{{ $item->name }}">
                                            <input type="hidden" name="size" value="{{ $variant->size }}">
                                            <input type="hidden" name="price" value="{{ $variant->price }}">
                                            <input type="hidden" name="image" value="{{ $variant->image }}">
                                            <div class="button cart_button">
                                                <a href="javascript:submit()" onclick="this.form['cart'].submit()">Thêm Vào Giỏ Hàng</a>
                                            </div>

                            </form>
                            </div>

                            <!-- Share -->
                            <div class="details_share" data-href="http://2handshop.ga/san-pham/{{ $item->slug }}">
                                <span>Share:</span>
                                <ul>
                                    <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?{{$item->slug  }}"
                                        href="http://2handshop.ga/san-pham/{{ $item->slug }}"><i class="fa fa-facebook" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row description_row">
                    <div class="col">
                        <div class="description_title_container">
                            <div class="description_title">Thông Tin</div>
                            {{--  <div class="reviews_title"><a href="#">Reviews <span>(1)</span></a></div>  --}}
                        </div>
                        <div class="description_text">
                            <p>{!! $item->short_description !!}.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="products">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <div class="products_title">Sản Phẩm Khác</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">

                        <div class="product_grid">

                            <!-- Product -->
                            @foreach($products as $item)
                                @foreach($item->product_variants as $variant)
                                @if($variant->image )
                                    <div class="product">
                                        <div class="product_image">
                                    <a href="{{ route('product',$item->slug) }}">
                                    <img style="height:220px" src="{{ asset('image/product/'.$variant->image) }}" alt="">

                                    </a>
                                </div>
                                        <div class="product_extra product_sale"><a href="categories.html">{{ $item->getHot() }}</a></div>
                                        <div class="product_content">
                                            <div class="product_title"><a href="{{ route('product',$item->slug) }}">{{ $item->name }} {{ $variant->getSizeGuest() }}</a></div>
                                            <div class="product_price">{{ number_format($variant->price) }} vnđ</div>
                                        </div>

                                    </div>

                                    @endif
                                @endforeach
                            @endforeach


                            {{--  <!-- Product -->
                            <div class="product">
                                <div class="product_image"><img src="images/product_2.jpg" alt=""></div>
                                <div class="product_extra product_sale"><a href="categories.html">Sale</a></div>
                                <div class="product_content">
                                    <div class="product_title"><a href="product.html">Smart Phone</a></div>
                                    <div class="product_price">$520</div>
                                </div>
                            </div>

                            <!-- Product -->
                            <div class="product">
                                <div class="product_image"><img src="images/product_3.jpg" alt=""></div>
                                <div class="product_content">
                                    <div class="product_title"><a href="product.html">Smart Phone</a></div>
                                    <div class="product_price">$710</div>
                                </div>
                            </div>

                            <!-- Product -->
                            <div class="product">
                                <div class="product_image"><img src="images/product_4.jpg" alt=""></div>
                                <div class="product_content">
                                    <div class="product_title"><a href="product.html">Smart Phone</a></div>
                                    <div class="product_price">$330</div>
                                </div>
                            </div>  --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
