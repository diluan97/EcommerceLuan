<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-10">
                                <div class="card">
                                    <div class="card-body card-block">
                                        <form action="<?php echo e(route('search_categories')); ?>" method="get" class="">
                                           <?php echo csrf_field(); ?>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <select name="category" id="SelectLm" class="form-control">
                                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                                <option value="<?php echo e($item->name); ?>"><?php echo e($item->name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
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
                                        <form method="post" action="<?php echo e(route('admin_category.store')); ?>" class="">
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
                                                <th>Tên Danh Mục</th>
                                                <th>Thông Tin </th>
                                                <th>Trạng Thái</th>
                                                <th>Chức Năng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>

                                                <td><?php echo e($item->name); ?></td>
                                                <td><?php echo substr($item->description,0,100); ?>...</td>
                                                <td><?php echo e($item->getStatus()); ?></td>
                                                <td>

                                                    <div class="table-data-feature">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Sửa">
                                                           <a href="<?php echo e($item->urlAdminEdit()); ?>"> <i class="zmdi zmdi-edit"></i></a>
                                                        </button>
                                                            <?php echo $__env->make('admin.category.component.btn_delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

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