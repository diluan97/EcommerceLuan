<?php $__env->startSection('content'); ?>
<div class="row">
        <div class="col-md-10"> </div>
        <div class="col-md-1">
            <form method="get" action="<?php echo e(route('admin_users.create')); ?>">
                <?php echo e(csrf_field()); ?>

                <input type="submit" class="btn btn-accent" value="Thêm mới" />
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>Tên </th>
                                                <th>Email</th>
                                                <th>Chức Vụ</th>
                                                <th>Chức Năng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>

                                                <td><?php echo e($item->name); ?></td>
                                                <td><?php echo e($item->email); ?></td>
                                                <td><?php echo e($item->getRole()); ?></td>
                                                <td>

                                                    <div class="table-data-feature">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Sửa">
                                                           <a href="<?php echo e($item->urlAdminEdit()); ?>"> <i class="zmdi zmdi-edit"></i></a>
                                                        </button>
                                                            <?php echo $__env->make('admin.user.component.btn_del', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

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