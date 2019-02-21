;
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('sublime/styles/checkout.css')); ?>">

<?php $__env->startSection('content'); ?>
<script type='text/javascript'>
     function submit()
      {
         document.forms["checkout_form"].submit();
      }
</script>
<div class="checkout">
		<div class="container">
			<div class="row">

				<!-- Billing Info -->
				<div class="col-lg-6">
					<div class="billing checkout_section">
                        <?php if(session()->has('success')): ?>
                        <div class="alert alert-info">
                            <?php echo e(session()->get('success')); ?>

                        </div>
                    <?php endif; ?>
						<div class="section_title">Địa Chỉ Thanh Toán</div>
						<div class="section_subtitle">Vui Lòng Điền Đầy Đủ Thông Tin</div>
						<div class="checkout_form_container">
							<form action="<?php echo e(route('thanh_toan')); ?>" method="POST" id="checkout_form" name="checkout" class="checkout_form">
                                <?php echo csrf_field(); ?>
                                <div>
									<!-- Email -->
									<label for="checkout_name">Tên Khách Hàng*</label>
                                    <input type="phone" id="checkout_email" name="customer_name" class="checkout_input" required="required" value="<?php echo e(old('customer_name')); ?>">
                                    <?php if($errors->has('customer_name')): ?>
                                        <div class="alert alert-success" role="alert">
                                            <span class="invalid-feedback" style="display:block;">
                                            <strong><?php echo e($errors->first('customer_name')); ?></strong></span>
                                        </div>
                                    <?php endif; ?>
								</div>
                                <div>
									<!-- Phone no -->
									<label for="checkout_phone">Số Điện Thoại*</label>
                                    <input type="phone" id="checkout_phone" name="customer_phone" class="checkout_input" required="required" value="<?php echo e(old('customer_phone')); ?>">
                                    <?php if($errors->has('customer_phone')): ?>
                                        <div class="alert alert-success" role="alert">
                                            <span class="invalid-feedback" style="display:block;">
                                            <strong><?php echo e($errors->first('customer_phone')); ?></strong></span>
                                        </div>
                                    <?php endif; ?>
								</div>
								<div>
									<!-- Email -->
									<label for="checkout_email">Email*</label>
                                    <input type="phone" id="checkout_email" name="customer_email" class="checkout_input" required="required" value="<?php echo e(old('customer_email')); ?>">
                                    <?php if($errors->has('customer_email')): ?>
                                        <div class="alert alert-success" role="alert">
                                            <span class="invalid-feedback" style="display:block;">
                                            <strong><?php echo e($errors->first('customer_email')); ?></strong></span>
                                        </div>
                                    <?php endif; ?>
								</div>
								<div>
									<!-- Address -->
                                    <label for="checkout_address">Địa Chỉ Giao Hàng*</label>
                                    <textarea class="checkout_input" name="customer_address" id="checkout_address" cols="30" rows="10"><?php echo e(old('customer_address')); ?></textarea>
                                    <?php if($errors->has('customer_address')): ?>
                                        <div class="alert alert-success" role="alert">
                                            <span class="invalid-feedback" style="display:block;">
                                            <strong><?php echo e($errors->first('customer_address')); ?></strong></span>
                                        </div>
                                    <?php endif; ?>
									
								</div>
                                <div>
									<!-- Note -->
                                    <label for="checkout_address">Ghi Chú</label>
                                    <textarea class="checkout_input" name="note" id="checkout_address" cols="30" rows="10"></textarea>
									
								</div>


								
                                <div class="button order_button" style="width:100%" >
                                    <a href="javascript:submit()"  onclick="this.form['checkout'].submit()">Tiến Hành Thanh Toán</a>
                                    
                                </div>
							</form>
						</div>
					</div>
				</div>

				<!-- Order Info -->

				<div class="col-lg-6">
					<div class="order checkout_section">
						<div class="section_title">Đơn Hàng Của Bạn</div>
						<div class="section_subtitle">Danh Sách Đơn Hàng</div>

						<!-- Order details -->
						<div class="order_list_container">
							<div class="order_list_bar d-flex flex-row align-items-center justify-content-start">
								<div class="order_list_title">Sản Phẩm</div>
								<div class="order_list_value ml-auto">Giá Tiền</div>
							</div>
							<ul class="order_list">
                                <?php $__currentLoopData = $cartInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="order_list_title"><h4><?php echo e($item->name); ?></h4></div>
									<div class="order_list_value ml-auto"><?php echo e(number_format(($item->price)*($item->qty))); ?> vnđ</div>
								</li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <li class="d-flex flex-row align-items-center justify-content-start">
									<div class="order_list_title">Tổng Tiền</div>
									<div class="order_list_value ml-auto"><?php echo e(Cart::subtotal()); ?> vnđ</div>
								</li>
							</ul>
						</div>

						

						<!-- Order Text -->
						<div class="order_text">Chúng Tôi Sẽ Áp Dụng Ship Cod (Lấy Tiền Khi Nhận Hàng) Với Tất Cả Đơn Hàng
                                    Quí Khách Sẽ Nhận Hàng Trong 1 tiếng Đối Với Các Đơn Hàng Nội Thành
                                    Tối Đa 2 tiếng Đối Với Các Đơn Hàng Ngoại Thành</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>