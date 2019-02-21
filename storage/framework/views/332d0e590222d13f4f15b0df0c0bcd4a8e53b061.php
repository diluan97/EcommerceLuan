;
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('sublime/styles/product.css')); ?>">
<?php $__env->startSection('home'); ?>
<script type='text/javascript'>
     function submit()
      {
         document.forms["myform"].submit();
      }
</script>
<div class="home">
            <div class="home_container">
                <div class="home_background" style="background-image:url('<?php echo e(asset('image/product/'.$variant->image)); ?>')"></div>
                <div class="home_content_container">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="home_content">
                                    <div class="home_title"><?php echo e($item->name); ?><?php echo e($variant->getSizeGuest()); ?><span>.</span></div>
                                    <div class="home_text">
                                        <p><?php echo $item->short_description; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="product_details">
            <div class="container">
                <div class="row details_row">

                    <!-- Product Image -->
                    <div class="col-lg-6">
                        <div class="details_image">
                            <div class="details_image_large"><img src="<?php echo e(asset('image/product/'.$variant->image)); ?>" alt="">
                                <div class="product_extra product_sale"><a href=""><?php echo e($item->getHot()); ?></a></div>
                            </div>
                            
                        </div>
                    </div>

                    <!-- Product Content -->
                    <div class="col-lg-6">
                        <div class="details_content">
                            <div class="details_name"><?php echo e($item->name); ?> <?php echo e($variant->getSizeGuest()); ?></div>
                            
                            <div class="details_price"><?php echo e(number_format($variant->price)); ?> vnđ</div>

                            <!-- In Stock -->
                            <div class="in_stock_container">
                                <div class="availability">Tình Trạng:</div>
                                <span><?php echo e($variant->getAmount()); ?></span>
                            </div>
                            <div class="details_text">
                                <p><?php echo $item->short_description; ?></p>
                            </div>
                            <div>
                                <?php if(session()->has('success')): ?>
                        <div class="alert alert-info">
                            <?php echo e(session()->get('success')); ?>

                        </div>
                    <?php endif; ?>
                            </div>
                            <!-- Product Quantity -->
                            <form  id="myform" name="cart" method="POST" action="<?php echo e(route('them_vao_gio_hang')); ?>">
                                <?php echo csrf_field(); ?>
                                    <div class="product_quantity_container">
                                        <div class="product_quantity clearfix">
                                            <span>Qty</span>
                                            <input id="quantity_input" name='qty' type="text" min="1" pattern="[0-9]*" value="1">
                                            <div class="quantity_buttons">
                                                <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
                                                <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                                        </div>
                                    </div>
                                    


                                            <input type="hidden" name="id" value="<?php echo e($variant->id); ?>">
                                            <input type="hidden" name="name" value="<?php echo e($item->name); ?>">
                                            <input type="hidden" name="size" value="<?php echo e($variant->size); ?>">
                                            <input type="hidden" name="price" value="<?php echo e($variant->price); ?>">
                                            <input type="hidden" name="image" value="<?php echo e($variant->image); ?>">
                                            <div class="button cart_button">
                                                <a href="javascript:submit()" onclick="this.form['cart'].submit()">Thêm Vào Giỏ Hàng</a>
                                            </div>

                            </form>
                            </div>

                            <!-- Share -->
                            <div class="details_share" data-href="http://2handshop.ga/san-pham/<?php echo e($item->slug); ?>">
                                <span>Share:</span>
                                <ul>
                                    <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?<?php echo e($item->slug); ?>"
                                        href="http://2handshop.ga/san-pham/<?php echo e($item->slug); ?>"><i class="fa fa-facebook" aria-hidden="true"></i>
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
                            
                        </div>
                        <div class="description_text">
                            <p><?php echo $item->short_description; ?>.</p>
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
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $__currentLoopData = $item->product_variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($variant->image ): ?>
                                    <div class="product">
                                        <div class="product_image">
                                    <a href="<?php echo e(route('product',$item->slug)); ?>">
                                    <img style="height:220px" src="<?php echo e(asset('image/product/'.$variant->image)); ?>" alt="">

                                    </a>
                                </div>
                                        <div class="product_extra product_sale"><a href="categories.html"><?php echo e($item->getHot()); ?></a></div>
                                        <div class="product_content">
                                            <div class="product_title"><a href="<?php echo e(route('product',$item->slug)); ?>"><?php echo e($item->name); ?> <?php echo e($variant->getSizeGuest()); ?></a></div>
                                            <div class="product_price"><?php echo e(number_format($variant->price)); ?> vnđ</div>
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