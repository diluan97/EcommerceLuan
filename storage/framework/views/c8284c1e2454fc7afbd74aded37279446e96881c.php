<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="col-lg-12">
            <?php if(session()->has('success')): ?>
                        <div class="alert alert-info">
                            <?php echo e(session()->get('success')); ?>

                        </div>
                    <?php endif; ?>
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Chỉnh Sửa Thông Tin Đơn Hàng : <?php echo e($item->order_number); ?></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Tên Khách Hàng</td>
                                                <td><?php echo e($item->customer_name); ?></td>

                                            </tr>
                                            <tr>
                                                <td>Ngày Đặt</td>
                                                <td><?php echo e($item->created_at); ?></td>

                                            </tr>
                                            <tr>
                                                <td>Số Điện Thoại</td>
                                                <td><?php echo e($item->customer_phone); ?></td>

                                            </tr>
                                            <tr>
                                                <td>Địa Chỉ</td>
                                                <td><?php echo e($item->customer_address); ?></td>

                                            </tr>
                                            <tr>
                                                <td>Ghi Chú</td>
                                                <td><?php echo e($item->note); ?></td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
        </div>
        <div class="col-md-12">
                                        <!-- DATA TABLE-->
                                        <div class="table-responsive m-b-40">
                                            <table class="table table-borderless table-data3">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Tên Sản Phẩm</th>
                                                        <th>Số Lượng </th>
                                                        <th>Đơn Giá</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $index = 1; ?>
                                                        <?php $__currentLoopData = $order->product_variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td><?php echo e($index); ?></td>
                                                            <td><?php echo e($product->getName()); ?></td>
                                                            <td><?php echo e($product->pivot->amount); ?></td>
                                                            <td><?php echo e($product->getPrice()); ?></td>

                                                        </tr>
                                                        <?php $index++ ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><b>Tổng Giá</b></td>
                                                        <td><?php echo e($order->getTotal()); ?>vnđ </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- END DATA TABLE                  -->
        </div>
        <form action="<?php echo e($item->urlAdminUpdate()); ?>"   method="POST">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-md-12">
                    <input type="hidden" name="_method" value="PUT" /> <?php echo e(csrf_field()); ?>

                    <label class="" for="">Tình Trạng Đơn Hàng :</label>
                    <select class="form-control-sm form-control " name="status" <?php if($item->order_status ==  config('custom.order_statuses.delivered')): ?> disabled <?php endif; ?>>
                        <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>" <?php if($item->order_status == $key): ?> selected <?php endif; ?>><?php echo e($status); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <button class="btn btn-info" type="submit">Lưu</button>
            </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>
</div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>