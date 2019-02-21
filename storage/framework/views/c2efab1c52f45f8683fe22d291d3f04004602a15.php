<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="col-lg-12">
            <div class="card">
                <?php if(Session::has('status')): ?>
                <div class="alert alert-info" role="alert">
                    <span class="invalid-feedback" style="display:block;">
                                        <strong><?php echo e(Session::get('status')); ?></strong></span>
                </div>
                    <?php endif; ?>
                <form action="<?php echo e(route('admin_users.store')); ?>" method="POST" class="form-horizontal"  enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <div class="card-body card-block">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="hf-email" class=" form-control-label">Tên</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="name" id="name" value="<?php echo e(old('name')); ?>" placeholder="Vui lòng diền tên" class="form-control">
                                <span class="invalid-feedback" style="display:block;">
                            <?php if($errors->has('name')): ?>
                            <div class="alert alert-success" role="alert">
                                <span class="invalid-feedback" style="display:block;">
                                <strong><?php echo e($errors->first('name')); ?></strong></span>
                            </div>
                            <?php endif; ?>
                        </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="hf-email" class=" form-control-label">Email</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="email" id="email" value="<?php echo e(old('email')); ?>" placeholder="Vui lòng diền tên" class="form-control">
                                <span class="invalid-feedback" style="display:block;">
                            <?php if($errors->has('email')): ?>
                            <div class="alert alert-success" role="alert">
                                <span class="invalid-feedback" style="display:block;">
                                <strong><?php echo e($errors->first('email')); ?></strong></span>
                            </div>
                            <?php endif; ?>
                        </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="hf-email" class=" form-control-label">Password</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="password" name="password" id="password"  placeholder="Vui lòng điền mật khẩu" class="form-control">
                                <span class="invalid-feedback" style="display:block;">
                            <?php if($errors->has('password')): ?>
                            <div class="alert alert-success" role="alert">
                                <span class="invalid-feedback" style="display:block;">
                                <strong><?php echo e($errors->first('password')); ?></strong></span>
                            </div>
                            <?php endif; ?>
                        </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="hf-email" class=" form-control-label">Password Confirm</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="password" name="password_confirmation" id="password_confirmation"  placeholder="Vui lòng điền lại mật khẩu" class="form-control">
                                <span class="invalid-feedback" style="display:block;">
                        </div>
                    </div>
                    <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="hf-email" class=" form-control-label">Quyền</label>
                            </div>
                            <div class="col-12 col-md-9">
                               <select name="role"  id="selectLg" class="form-control-lg form-control">
                                <option value="1">Admin</option>
                                <option value="0">Bình Thường</option>
                                </select>

                        </div>
                    </div>
            </div>

            <input type="submit" class="btn btn-primary" name="publish" value="Lưu">
        </div>
    </div>
</div>
</form>
</div>
</div>
</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>