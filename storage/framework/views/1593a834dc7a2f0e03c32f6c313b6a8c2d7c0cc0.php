 <?php $__env->startSection('content'); ?>
<div class="row">

</div>

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
                <form action="<?php echo e($item->urlAdminUpdate()); ?>" method="POST" class="form-horizontal">
                    <input type="hidden" name="_method" value="PUT"> <?php echo csrf_field(); ?>

                    <div class="card-body card-block">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="hf-email" class=" form-control-label">Tên</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="name" id="name" value="<?php echo e(old('name', $item->name)); ?>" placeholder="Vui lòng diền tên" class="form-control">
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
                            <label for="selectLg" class=" form-control-label">Danh Mục</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="hot"  id="selectLg" class="form-control-lg form-control">
                                <?php $__currentLoopData = config('custom.hot_display'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $hot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($key); ?>" <?php if($key == $item->hot): ?> selected <?php endif; ?>><?php echo e($hot); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select> <?php if($errors->has('hot')): ?>
                            <div class="alert alert-success" role="alert">
                                <span class="invalid-feedback" style="display:block;">
                                <strong><?php echo e($errors->first('hot')); ?></strong></span>
                            </div>
                            <?php endif; ?>
                        </div>

                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="selectLg" class=" form-control-label">Danh Mục</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="category_id"  id="selectLg" class="form-control-lg form-control">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($cate->id); ?>" <?php if($cate->id == $item->category_id): ?> selected <?php endif; ?>><?php echo e($cate->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select> <?php if($errors->has('category_id')): ?>
                            <div class="alert alert-success" role="alert">
                                <span class="invalid-feedback" style="display:block;">
                                <strong><?php echo e($errors->first('category_id')); ?></strong></span>
                            </div>
                            <?php endif; ?>
                        </div>

                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="hf-password" class=" form-control-label">Mô Tả Ngắn</label>
                        </div>
                        <div class="col-12 col-md-9">

                            <textarea class="ckeditor" name="short_description" cols="80" rows="10"><?php echo e(old('short_description',$item->short_description)); ?></textarea>
                            <?php if($errors->has('short_description')): ?>
                            <div class="alert alert-success" role="alert">
                                <span class="invalid-feedback" style="display:block;">
                                <strong><?php echo e($errors->first('short_description')); ?></strong></span>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
            </div>
                <input type="submit" class="btn btn-primary" name="publish" value="Hiển Thị Trên Web ">
                <input type="submit" class="btn btn-warning" name="draff" value="Chưa Hiển Thị">
                <input type="submit" class="btn btn-info" name="variant" value="Thêm Biến Thể">
        </div>
    </div>
    </form>
</div>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>