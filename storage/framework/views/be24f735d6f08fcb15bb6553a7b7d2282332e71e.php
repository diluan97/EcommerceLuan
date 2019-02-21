;
<?php $__env->startSection('content'); ?>


<div class="products">

		<div class="container">
                                    <h2 style="padding-top:20px">Bạn Đang Xem : <?php echo e($categories->name); ?></h2>

			<div class="row">
				<div class="col">
					<div class="product_grid">
                        <!-- Product -->

                        <?php $__currentLoopData = $product_cate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <?php $__currentLoopData = $item->product_variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($variant): ?>
                                    <?php if($variant->status == 1 ): ?>
                                        <div class="product">
                                            <div class="product_image">
                                    <a href="<?php echo e(route('product',$item->slug)); ?>">
                                    <img style="height:220px" src="<?php echo e(asset('image/product/'.$variant->image)); ?>" alt="">

                                    </a>
                                </div>
                                            <div class="product_extra product_sale"><a href="categories.html"><?php echo e($item->getHot()); ?></a></div>
                                            <div class="product_content">
                                                <div class="product_title"><a href="<?php echo e(route('product',$item->slug)); ?>"><?php echo e($item->name); ?> <?php echo e($variant->getSizeGuest()); ?></a></div>
                                                <div class="product_price"><?php echo e(number_format($variant->price)); ?>vnđ</div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
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