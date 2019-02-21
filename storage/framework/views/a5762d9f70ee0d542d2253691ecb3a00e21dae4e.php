;
<?php echo $__env->make('share.slide', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('ads'); ?>
<div class="avds">
		<div class="avds_container d-flex flex-lg-row flex-column align-items-start justify-content-between">
			<div class="avds_small">
				<div class="avds_background" style="background-image:url('<?php echo e(asset('image/slide/'.$img1)); ?>')"></div>
				<div class="avds_small_inner">
					<div class="avds_discount_container">
						<img src="images/discount.png" alt="">
						<div>
							<div class="avds_discount">
								<div><span></span></div>
								<div></div>
							</div>
						</div>
					</div>
					<div class="avds_small_content">
						<div class="avds_title">Các Món Gà</div>
						<div class="avds_link"><a href="<?php echo e(route('list_product')); ?>">Mua Ngay</a></div>
					</div>
				</div>
			</div>
			<div class="avds_large">
				<div class="avds_background" style="background-image:url('<?php echo e(asset('image/slide/'.$img2)); ?>')"></div>
				<div class="avds_large_container">
					<div class="avds_large_content">
						<div class="avds_title">Các Loại Hải Sản</div>
						<div class="avds_text">Chuyên cung cấp hải sản tươi sống và tất cả các loại ốc tươi sống.</div>
						<div class="avds_link avds_link_large"><a href="<?php echo e(route('category')); ?>">Mua Ngay</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="products">
		<div class="container">
			<div class="row">
				<div class="col">

					<div class="product_grid">

                        <!-- Product -->
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = $item->product_variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <?php if($item->status = 1): ?>

						    <div class="product">

                                <div class="product_image">
                                    <a href="<?php echo e(route('product',$item->slug)); ?>"><img style="height:220px" src="<?php echo e(asset('image/product/'.$variant->image)); ?>" alt="">
                                    </a>
                                </div>
                                <div class="product_extra product_sale"><a href="categories.html"><?php echo e($item->getHot()); ?></a></div>
                                <div class="product_content">
                                    <div class="product_title">
                                        <a href="<?php echo e(route('product',$item->slug)); ?>"><?php echo e($item->name); ?> <?php echo e($variant->getSizeGuest()); ?></a>
                                        <input type="hidden" id='<?php echo e($item->name); ?>' class="nameCart">
                                    </div>
                                    <div class="product_price">
                                        <div class="row nameCart" id="<?php echo e($item->name); ?>" name="<?php echo e($variant->size); ?>" >
                                            <div class="col-sm-9 priceCart" style="font-size:25px;"  id="<?php echo e($variant->price); ?>" ><?php echo e(number_format($variant->price)); ?>vnđ</div>
                                            <input class="token" type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                            <div  class="col-sm-3 imageCart" id="<?php echo e($variant->image); ?>">
                                                <i  id="<?php echo e($variant->id); ?>"  style="font-size:30px;cursor:pointer"
                                                    class="addToCart fa fa-cart-plus" >
                                                </i>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

					</div>
				</div>
			</div>
		</div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>