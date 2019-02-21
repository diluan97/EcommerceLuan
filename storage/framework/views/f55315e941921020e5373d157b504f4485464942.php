;

<?php $__env->startSection('content'); ?>
    <div class="row" style="padding-top:120px">
        <div class="products">

		<div class="container">

			<div class="row">
				<div class="col">
                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <h1 style="color:black"><?php echo e($cate->name); ?></h1>
					<div class="product_grid">

                        <!-- Product -->
                        <?php $__currentLoopData = $products[$cate->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                                <div class="product_price">
                                        <div class="row">
                                            <div class="col-sm-9" style="font-size:25px;" ><?php echo e(number_format($variant->price)); ?>vnđ</div>
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
                                    <input type="hidden" id="idCart" name="id" value="<?php echo e($variant->id); ?>">
                            <input type="hidden" id="qtyCart" value="1">
                            <input type="hidden" id="nameCart" name="name" value="<?php echo e($item->name); ?>">
                            <input type="hidden" id="sizeCart" name="size" value="<?php echo e($variant->size); ?>">
                            <input type="hidden" id="priceCart" name="price" value="<?php echo e($variant->price); ?>">
                            <input type="hidden" id="imageCart" name="image" value="<?php echo e($variant->image); ?>">
                            <?php echo csrf_field(); ?>
                                    <?php endif; ?>
                                <?php endif; ?>


                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
			</div>
		</div>
</div>
    </div>
    <script>
        function addCart(){

        var id = $('#idCart').val();
        alert(id);
        

    }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>