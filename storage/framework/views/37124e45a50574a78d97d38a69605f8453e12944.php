<?php $__env->startSection('content'); ?>

<div class="row">
        <div class="col-md-12">
                                <div class="card">

                                    <div class="card-body card-block">
                                        <form action="<?php echo e(route('search_orders')); ?>" method="get" class="">
                                            <?php echo csrf_field(); ?>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="col-md-6">
                                                    <input type="text" id="username" name="customer_name" placeholder="Tên Khách Hàng" class="form-control">
                                                    </div>
                                                    <h1>||</h1>

                                                    <div class="col-md-5">
                                                        <div class="col-12">
                                                            <select name="order" id="SelectLm" class="form-control">
                                                                <option value=""></option>
                                                                <?php $__currentLoopData = config('custom.order_status_display_be'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($key); ?>"><?php echo e($item); ?></option>
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
    </div>
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
                                    <?php echo e($orders->links()); ?>

                                    </div>
                                </div>

                            </div>
        
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>