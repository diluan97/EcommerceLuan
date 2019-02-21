<!DOCTYPE html>
<html lang="en">
<head>
<title>Gà Hấp Nước Mắm</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta property="og:url"           content="http://2handshop.ga/san-pham/ga-ta-hap-nuoc-mam-nhi975392" />
<meta name="description" content="Dương Di Luân">
<meta property="og:type"          content="website" />
<meta property="og:description"   content="Chuyên Cung Cấp Các Loại Gà , Đặc Sản Gà Hấp Nước Mắm" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:image"         content="{{ asset('image/1548174686gà hấp nước mắm.jpg') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('sublime/styles/bootstrap4/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('sublime/plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" >
<link rel="stylesheet" type="text/css" href="{{ asset('sublime/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('sublime/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('sublime/plugins/OwlCarousel2-2.2.1/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('sublime/styles/main_styles.css')}}">
{{--  <link rel="stylesheet" type="text/css" href="{{ asset('sublime/styles/product.css')}}">  --}}
{{--  <link rel="stylesheet" type="text/css" href="{{ asset('sublime/styles/contact.css')}}">  --}}
<link rel="stylesheet" type="text/css" href="{{ asset('sublime/styles/product_responsive.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('sublime/styles/checkout_responsive.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('sublime/styles/categories_responsive.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('sublime/styles/cart_responsive.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('sublime/styles/responsive.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('sublime/styles/contact_responsive.css')}}">



</head>
<body>

<div class="super_container">

	<!-- Header -->

    @include('share.header')

	<!-- Menu -->
    @include('share.mobile')
    @include('share.btn_search')
	<!-- Home -->
    @yield('home')


	<!-- Ads -->
    @yield('ads')

	<!-- Products -->

	@yield('content')

	<!-- Ad -->



	<!-- Icon Boxes -->

	@yield('subscrible')

	<!-- Footer -->

	<div class="footer_overlay"></div>
	<footer class="footer">
		<div class="footer_background" style="background-image:url('{{asset('image/white-background-2.jpg')}}')"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="footer_content d-flex flex-lg-row flex-column align-items-center justify-content-lg-start justify-content-center">
						<div class="footer_logo"><a href="#"><img  style="width:40%" src="{{ asset('image/logoUser.png') }}" alt=""></a></div>
						<div class="copyright ml-auto mr-auto"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
 &copy;<script>document.write(new Date().getFullYear());</script> <i class="fa fa-heart-o" aria-hidden="true"></i></a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
						<div class="footer_social ml-lg-auto">
							<ul>
								<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
</div>

<script src="{{ asset('sublime/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{ asset('sublime/js/ajax.js')}}"></script>

<script src="{{ asset('sublime/styles/bootstrap4/popper.js')}}"></script>
<script src="{{ asset('sublime/styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{ asset('sublime/plugins/greensock/TweenMax.min.js')}}"></script>
<script src="{{ asset('sublime/plugins/greensock/TimelineMax.min.js')}}"></script>
<script src="{{ asset('sublime/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
<script src="{{ asset('sublime/plugins/greensock/animation.gsap.min.js')}}"></script>
<script src="{{ asset('sublime/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
<script src="{{ asset('sublime/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
<script src="{{ asset('sublime/plugins/Isotope/isotope.pkgd.min.js')}}"></script>
<script src="{{ asset('sublime/plugins/easing/easing.js')}}"></script>
<script src="{{ asset('sublime/plugins/parallax-js-master/parallax.min.js')}}"></script>
<script src="{{ asset('sublime/js/product.js')}}"></script>
<script src="{{ asset('sublime/js/custom.js')}}"></script>
{{--  <script src="{{ asset('sublime/js/categories.js')}}"></script>
<script src="{{ asset('sublime/js/checkout.js')}}"></script>
<script src="{{ asset('sublime/js/contact.js')}}"></script>  --}}
{{--  <script src="{{ asset('sublime/js/cart.js')}}"></script>  --}}
<script>
$(document).ready(function() {


    $('#product_name').keyup(function() {

        var query = $(this).val();

        if (query != '') {

            var _token = $('input[name="_token"]').val();

            $.ajax({
                url: "{{ route('search_ajax') }}",
                Method: "POST",
                data: {
                    query: query,
                    _token: _token
                },
                success: function(data) {
                    $('#product_list').fadeIn();
                    $('#product_list').html('');
                    var h4 = $('#product_list').append('<h4>Kết quả tham khảo :</h4>');
                    $('#product_list').append(h4, '<ul class="form-control" id="parent_list"></ul>');
                    $.each(data, function(i, val) {
                        $(document).find('#parent_list').append(
                            $('<li  style="color:black;cursor:pointer">').text(val.name)
                        );
                    });
                }

            });
            $(document).on('click', 'li', function() {

                $('#product_name').val($(this).text());

                $('#product_list').fadeOut(100);
            });
        }
    });

    $('.addToCart').click(function(){
            var id = $(this).attr('id');
            var image = $(this).parent().parent().find('.imageCart').attr('id');
            var qty = 1;
            var name = $(this).parent().parent().parent().find('.nameCart').attr('id');
            var price = $(this).parent().parent().find('.priceCart').attr('id');
            var size = $(this).parent().parent().parent().find('.nameCart').attr('name');
            $.ajax({
                    type : "POST",
                    url: "{{ route('cartAjax') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
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
    });
});
</script>

</body>
<div id="fb-root"></div>
<script async defer src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2&appId=2327294070882782&autoLogAppEvents=1"></script>

</html>
