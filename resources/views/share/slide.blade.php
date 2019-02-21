<div class="home">
		<div class="home_slider_container">

			<!-- Home Slider -->
			<div class="owl-carousel owl-theme home_slider">

                <!-- Slider Item -->
                @foreach($slide as $item)
				<div class="owl-item home_slider_item">
					<div class="home_slider_background"  style="background-image:url('{{asset('image/slide/'.$item->image)}}')"></div>
					<div class="home_slider_content_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
										<div class="home_slider_title">{{ $item->logan }}</div>
										<div class="home_slider_subtitle">{{ $item->info }}</div>
										<div class="button button_light home_button"><a href="{{ route('category') }}">Mua Hàng Ngay</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
                </div>
                @endforeach

			</div>

			<!-- Home Slider Dots -->

			<div class="home_slider_dots_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_slider_dots">
								<ul id="home_slider_custom_dots" class="home_slider_custom_dots">
									<li class="home_slider_custom_dot active">01.</li>
									<li class="home_slider_custom_dot">02.</li>
									<li class="home_slider_custom_dot">03.</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
