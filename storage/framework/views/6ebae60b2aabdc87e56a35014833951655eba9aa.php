;
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('sublime/styles/categories.css')); ?>">

<?php $__env->startSection('content'); ?>
<div class="products">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="product_grid">

                        <!-- Product -->
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

						    <div class="product">
                                <div class="product_image">
                                    <a href="<?php echo e(route('category_slug',$item->slug)); ?>">
                                    <img  style="height:220px" src="<?php echo e(asset('image/category/'.$item->image)); ?>" alt="">
                                    </a>
                                </div>
                                <div class="product_content">
                                    <div class="product_title"><a href="<?php echo e(route('category_slug',$item->slug)); ?>"><?php echo e($item->name); ?></a></div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>