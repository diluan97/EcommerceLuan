<?php $__env->startSection('content'); ?>

<div class="row">
        <div class="col-md-10">
                                <div class="card">

                                    <div class="card-body card-block">
                                        <form action="<?php echo e(route('search_products')); ?>" method="get" class="">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="col-md-6">
                                                    <input type="text" id="username" name="product_name" placeholder="Tên Sản Phẩm" class="form-control">
                                                    </div>
                                                    <h1>||</h1>

                                                    <div class="col-md-4">
                                                        <div class="col-12">
                                                            <select name="cateProduct" id="SelectLm" class="form-control">
                                                                <option value=""></option>
                                                                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                                <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-success btn-sm">Tìm Kiếm</button>

                                                </div>
                                            </div>
                                            <div class="form-actions form-group">

                                            </div>
                                        </form>
                                    </div>
                                </div>
        </div>
        <div class="col-md-2">
            <div class="card">
                                    <div class="card-body card-block">
                                        <form method="post" action="<?php echo e(route('admin_products.store')); ?>" class="">
                                            <?php echo e(csrf_field()); ?>

                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="submit" class="btn btn-info" value="Thêm mới" />
                                                </div>
                                            </div>
                                            <div class="form-actions form-group">

                                            </div>
                                        </form>
                                    </div>
                                </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên</th>
                                                <th>Danh Mục</th>
                                                <th>Tình Trạng</th>
                                                <th>Trạng Thái</th>
                                                <th>Hành Động</th>
                                            </tr>
                                        </thead>
                                        <tbody><?php $index=1 ?>
                                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>

                                                <td><?php echo e($index++); ?></td>
                                                <td><?php echo e($item->name); ?></td>
                                                <td><?php echo e($item->category['name']); ?></td>
                                                <td><?php echo e($item->getHot()); ?></td>
                                                <td><?php echo e($item->getStatus()); ?></td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Sửa">
                                                           <a href="<?php echo e($item->urlAdminEdit()); ?>"> <i class="zmdi zmdi-edit"></i></a>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Thêm Biến Thể">
                                                            <a href="<?php echo e(route('admin_product_variant.index',['product_slug' => $item->slug])); ?>">
                                                                <i class="fa fa-plus-square"></i>
                                                            </a>
                                                        </button>
                                                            <?php echo $__env->make('admin.products.component.btn_delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </tbody>

                                    </table>
                                    <?php echo e($products->links()); ?>

                                </div>
                            </div>
        
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>