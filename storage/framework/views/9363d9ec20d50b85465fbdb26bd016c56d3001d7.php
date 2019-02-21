<?php $__env->startSection('content'); ?>
    <div class="row">

                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Mã Đơn</th>
                                                <th>TT Khách Hàng</th>
                                                <th>Giá</th>
                                                <th>Ngày Đặt</th>
                                                <th>Trạng Thái</th>
                                                <th>Hành Động</th>
                                            </tr>
                                        </thead>
                                        <tbody><?php $index=1 ?>
                                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>

                                                <td><?php echo e($index++); ?></td>
                                                <td><?php echo e($item->order_number); ?></td>
                                                <td><?php echo e($item->customerInfo()); ?></td>
                                                <td><?php echo e($item->getTotal()); ?></td>
                                                <td><?php echo e($item->created_at); ?></td>
                                                <td><?php echo e($item->getStatus()); ?></td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Sửa">
                                                           <a href="<?php echo e($item->urlAdminEdit()); ?>"> <i class="zmdi zmdi-edit"></i></a>
                                                        </button>
                                                            <?php echo $__env->make('admin.order.component.btn_delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                    <div style="margin-left:15px;">
                                    </div>
                                </div>

                            </div>
        
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>