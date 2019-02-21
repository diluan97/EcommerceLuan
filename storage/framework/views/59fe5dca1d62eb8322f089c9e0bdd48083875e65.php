;
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('sublime/styles/cart.css')); ?>">

<?php $__env->startSection('content'); ?>
<div class="cart_info" style="border-bottom:1px solid gray;padding-top:130px">

		<div class="container">
			<div class="row">
				<div class="col">
                    <?php if(session()->has('success')): ?>
                        <div class="alert alert-info">
                            <?php echo e(session()->get('success')); ?>

                        </div>
                    <?php endif; ?>
					<!-- Column Titles -->
					<div class="cart_info_columns clearfix">
                        <div class="cart_info_col cart_info_col_product">Sản Phẩm (<?php echo e(count($carts)); ?>)</div>

						<div class="cart_info_col cart_info_col_price">Giá - Size</div>
						<div class="cart_info_col cart_info_col_quantity">Số Lượng</div>
						<div class="cart_info_col cart_info_col_total">Số Tiền</div>
					</div>
				</div>
			</div>
			<div class="row cart_items_row">
				<div class="col">

                    <!-- Cart Item -->
                    <?php $count = 1; ?>
                    <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

					<div class="cart_item d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
						<!-- Name -->
						<div class="cart_item_product d-flex flex-row align-items-center justify-content-start">
							<div class="cart_item_image">
								<div><img style="width:170px;height:150px" src="<?php echo e(asset('image/product/'.$item->options->image)); ?>" alt=""></div>
							</div>
							<div class="cart_item_name_container">
								<div class="cart_item_name"><a href=""><?php echo e($item->name); ?></a></div>
                                <div class="cart_item_edit">
                                    <form id"formxoa" name="del-cart" method='POST' action="<?php echo e(route('xoa_san_pham',$item->rowId)); ?>">
                                    <?php echo csrf_field(); ?>
                                    <?php echo e(method_field('DELETE')); ?>

                                        <button style="background:none;border:0px" type="submit">Xoá Sản Phẩm</button>
                                    </form>
                                    </br>
                                    <form  id="formluu" name="save-cart" method="POST" action="<?php echo e(route('luu_san_pham',$item->rowId)); ?>">
                                    <?php echo csrf_field(); ?>
                                    <button style="background:none;border:0px" type="submit">Lưu Sản Phẩm</button>
                                    </form>
                                </div>
							</div>
						</div>
						<!-- Price -->
						<div class="cart_item_price"><?php echo e(number_format($item->price)); ?> vnđ -
                            <?php if($item->options->size == 1 ): ?>
                                Nhỏ
                            <?php else: ?>
                                Lớn
                            <?php endif; ?>

                        </div>
						<!-- Quantity -->
						<div class="cart_item_quantity">
							<div class="product_quantity_container">
								<div class="product_quantity clearfix">
									<span>Qty</span>
                                    <input id="quantity_input" name='qty' type="text" pattern="[0-9]*" value="<?php echo e($item->qty); ?>">

									<div class="quantity_buttons" id="quantity_input">
										<div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
										<div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
									</div>
								</div>
							</div>
						</div>
						<!-- Total -->
                        <div class="cart_item_total"><?php echo e(number_format(($item->price)*($item->qty))); ?> vnđ</div>
                            
                    </div>
                    <?php $count++ ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

				</div>
			</div>
			<div class="row row_cart_buttons">
				<div class="col">
					<div class="cart_buttons d-flex flex-lg-row flex-column align-items-start justify-content-start">
						<div class="button continue_shopping_button"><a href="<?php echo e(route('list_product')); ?>">Tiếp Tục Mua Hàng</a></div>
						<div class="cart_buttons_right ml-lg-auto">
                            <div class="button clear_cart_button"><a href="<?php echo e(route('xoa_gio_hang')); ?>">Xoá Giỏ Hàng</a></div>

    						</div>
					</div>
				</div>
			</div>
			<div class="row row_extra">
				<div class="col-lg-4">

					<!-- Delivery -->
					<div class="delivery">
						<div class="section_title">Phương Thức Giao Hàng</div>
						<div class="section_subtitle">Hiện tại chưa áp dụng vào thanh toán</div>
						<div class="delivery_options">
							<label class="delivery_option clearfix">Giao hàng trong 1h
								<input type="radio" name="radio">
								<span class="checkmark"></span>
								<span class="delivery_price">Hiện tại chưa áp dụng vào thanh toán</span>
							</label>
							<label class="delivery_option clearfix">Giao hàng Tiêu Chuẩn
								<input type="radio" name="radio">
								<span class="checkmark"></span>
								<span class="delivery_price">Hiện tại chưa áp dụng vào thanh toán</span>
							</label>
							
						</div>
					</div>

					<!-- Coupon Code -->
					<div class="coupon">
						<div class="section_title">Khuyến Mãi</div>
						<div class="section_subtitle">Hiện Tại Không Có Chương Trình Khuyến Mãi</div>
						
					</div>
				</div>

				<div class="col-lg-6 offset-lg-2">
					<div class="cart_total">
						<div class="section_title">Thông tin giỏ hàng</div>
						<div class="section_subtitle">Thông Tin Chình Thức Thanh Toán </div>
						<div class="cart_total_container">
							<ul>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="cart_total_title">Số Tiền</div>
									<div class="cart_total_value ml-auto"><?php echo e(Cart::subtotal()); ?> vnđ</div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="cart_total_title">Giao Hàng</div>
									<div class="cart_total_value ml-auto">Liên hệ</div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="cart_total_title">Tổng Tiền</div>
									<div class="cart_total_value ml-auto"><?php echo e(Cart::subtotal()); ?> vnđ</div>
								</li>
							</ul>
						</div>
						<div class="button checkout_button" style="width:100%"><a href="<?php echo e(route('thanh_toan')); ?>">Tiến Hành Thanh Toán</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <div class="cart_info">
        <div class="container">
            <div class="row">
				<div class="col">
					<!-- Column Titles -->
					<div class="cart_info_columns clearfix">
                        <div class="cart_info_col cart_info_col_product">Sản Phẩm</div>
						<div class="cart_info_col cart_info_col_price">Giá - Size</div>
						<div class="cart_info_col cart_info_col_quantity">Số Lượng</div>
						<div class="cart_info_col cart_info_col_total">Số Tiền</div>
					</div>
				</div>
			</div>
        <div class="row cart_items_row">
				<div class="col">
                    <h2>Sản Phẩm Lưu trữ <?php echo e(Cart::instance('ProductVariant')->count()); ?></h2>
                    <h5>Chú Ý : sản phẩm lưu trữ sẽ không được thanh toán</h5>
                    <!-- Cart Item -->
                    <?php $__currentLoopData = Cart::instance('ProductVariant')->content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="cart_item d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
						<!-- Name -->
						<div class="cart_item_product d-flex flex-row align-items-center justify-content-start">
							<div class="cart_item_image">
								<div><img style="width:170px;height:150px" src="<?php echo e(asset('image/product/'.$item->options->image)); ?>" alt=""></div>
							</div>
							<div class="cart_item_name_container">
								<div class="cart_item_name"><a href=""><?php echo e($item->name); ?></a></div>
                                <div class="cart_item_edit">
                                    <form method='POST' action="<?php echo e(route('xoa_luu_san_pham',$item->rowId)); ?>">
                                    <?php echo csrf_field(); ?>
                                    <?php echo e(method_field('DELETE')); ?>

                                    <button style="background:none;border:0px" type="submit">Xoá Sản Phẩm</button>
                                    
                                    </form>
                                    </br>
                                    <form method='POST' action="<?php echo e(route('lay_san_pham_luu_vao_cart',$item->rowId)); ?>">
                                    <?php echo csrf_field(); ?>
                                    <button style="background:none;border:0px" type="submit">Mua Lại Sản Phẩm</button>
                                    
                                    </form>
                                    
                                </div>
							</div>
						</div>
						<!-- Price -->
						<div class="cart_item_price"><?php echo e(number_format($item->price)); ?> vnđ -
                            <?php if($item->options->size == 1 ): ?>
                                Nhỏ
                            <?php else: ?>
                                Lớn
                            <?php endif; ?>

                        </div>
						<!-- Quantity -->
						<div class="cart_item_quantity">
							<div class="product_quantity_container">
								<div class="product_quantity clearfix">
									<span>Qty</span>
									<input id="quantity_input" name='qty' type="text" pattern="[0-9]*" value="<?php echo e($item->qty); ?>">
									<div class="quantity_buttons">
										<div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
										<div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
									</div>
								</div>
							</div>
						</div>
						<!-- Total -->
						<div class="cart_item_total"><?php echo e(number_format(($item->price)*($item->qty))); ?> vnđ</div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

				</div>
			</div>
            </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>