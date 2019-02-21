<div class="menu menu_mm trans_300">
		<div class="menu_container menu_mm">
			<div class="page_menu_content">

				<div class="page_menu_search menu_mm">
					<form action="#">
						<input type="search" required="required" class="page_menu_search_input menu_mm" placeholder="Search for products...">
					</form>
				</div>
				<ul class="page_menu_nav menu_mm">
					<li class="page_menu_item has-children menu_mm">
						<a href="index.html">Trang Chủ<i class="fa fa-angle-down"></i></a>
						<ul class="page_menu_selection menu_mm">
							<li class="page_menu_item menu_mm"><a href="{{ route('category') }}">Danh Mục Món Ăn<i class="fa fa-angle-down"></i></a></li>
							<li class="page_menu_item menu_mm"><a href="{{ route('list_product') }}">Sản Phẩm<i class="fa fa-angle-down"></i></a></li>
							<li class="page_menu_item menu_mm"><a href="{{ route('gio_hang') }}">Giỏ Hàng<i class="fa fa-angle-down"></i></a></li>
							<li class="page_menu_item menu_mm"><a href="{{ route('thanh_toan') }}">Thanh Toán<i class="fa fa-angle-down"></i></a></li>
							<li class="page_menu_item menu_mm"><a href="{{ route('lien-he') }}">Liên Hệ<i class="fa fa-angle-down"></i></a></li>
						</ul>
					</li>
					<li class="page_menu_item has-children menu_mm">
						<a href="categories.html">Danh Mục Món Ăn<i class="fa fa-angle-down"></i></a>
						<ul class="page_menu_selection menu_mm">
                            @foreach($categories as $item)
							<li class="page_menu_item menu_mm"><a href="{{ route('category_slug',$item->slug) }}">{{ $item->name }}<i class="fa fa-angle-down"></i></a></li>
							@endforeach
						</ul>
					</li>
					{{--  <li class="page_menu_item menu_mm"><a href="index.html">Accessories<i class="fa fa-angle-down"></i></a></li>  --}}
					{{--  <li class="page_menu_item menu_mm"><a href="#">Offers<i class="fa fa-angle-down"></i></a></li>  --}}
					<li class="page_menu_item menu_mm"><a href="{{ route('lien-he') }}">Liên Hệ<i class="fa fa-angle-down"></i></a></li>
				</ul>
			</div>
		</div>

		<div class="menu_close"><i class="fa fa-times" aria-hidden="true"></i></div>

		<div class="menu_social">
			<ul>
				<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
			</ul>
		</div>
	</div>
