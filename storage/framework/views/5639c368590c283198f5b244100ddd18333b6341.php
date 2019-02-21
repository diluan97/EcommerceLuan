<?php $__env->startSection('content'); ?>

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
                                        <?php if($categories->count()): ?>
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
                                        <?php else: ?>
                                            Không Tìm Thấy Danh Mục Nào
                                        <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>