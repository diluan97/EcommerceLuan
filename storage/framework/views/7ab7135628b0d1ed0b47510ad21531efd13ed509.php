<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-10">
            <div class="overview-wrap">
            <h1 class="title-1 col-md-12"><span class="role user">Danh dách biến thể của <?php echo e($product->name); ?></span></h1>
        </div>
    </div>
        <div class="col-md-2">
            <form method="post" action="<?php echo e(route('admin_product_variant.store',['product_slug' => $product->slug])); ?>">
                <?php echo e(csrf_field()); ?>

                <input type="submit" class="btn btn-accent" value="Thêm mới" />
            </form>
        </div>
    </div>
    <div class="row">

                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên sản phẩm</th>
                                                <th>Số lượng</th>
                                                <th>Giá</th>
                                                <th>Trạng Thái</th>
                                                <th>Hành Động</th>
                                            </tr>
                                        </thead>
                                        <tbody><?php $index=1 ?>
                                            <?php $__currentLoopData = $variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>

                                                <td><?php echo e($index++); ?></td>
                                                <td><?php echo e($item->getName()); ?></td>
                                                <td><?php echo e($item->amount); ?></td>
                                                <td><?php echo e($item->price); ?></td>
                                                <td><?php echo e($item->getStatus()); ?></td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Sửa">
                                                           <a href="<?php echo e($item->urlAdminEdit($product->slug)); ?>"> <i class="zmdi zmdi-edit"></i></a>
                                                        </button>
                                                            <?php echo $__env->make('admin.product_variant.component.btn_delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
        
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>