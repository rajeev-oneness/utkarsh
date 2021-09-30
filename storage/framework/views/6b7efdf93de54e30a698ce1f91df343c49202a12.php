<?php $__env->startSection('title'); ?> <?php echo e($pageTitle); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="fixed-row">
        <div class="app-title">
            <div class="active-wrap">
                <h1><i class="fa fa-tags"></i> <?php echo e($pageTitle); ?></h1>
                <div class="form-group">
                    <button class="btn btn-primary" type="button" id="btnSave"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Products</button>
                    <a class="btn btn-secondary" href="<?php echo e(route('admin.products.index')); ?>"><i style="vertical-align: baseline;" class="fa fa-chevron-left"></i>Back</a>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('admin.partials.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row section-mg row-md-body no-nav">
        <div class="col-md-12 mx-auto">
            <div class="tile">
                <form action="<?php echo e(route('admin.products.importsave')); ?>" method="POST" role="form" enctype="multipart/form-data" id="form1">
                    <?php echo csrf_field(); ?>
                    <div class="tile-body form-body">
                        <div class="form-group">
                            <label class="control-label" for="file">File <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control <?php $__errorArgs = ['file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="file" name="file" id="file" value="<?php echo e(old('file')); ?>"/>
                            <?php $__errorArgs = ['file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Products</button>
                        <a class="btn btn-secondary" href="<?php echo e(route('admin.products.index')); ?>"><i style="vertical-align: baseline;" class="fa fa-chevron-left"></i>Back</a>
                    </div>

                    <p><a href="<?php echo e(asset('/csv/test_csv.csv')); ?>" target="_blank">Download Sample File Here</a></p>

                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
    $(document).ready(function(){
        $("#btnSave").on("click",function(){
            $('#form1').submit();
        })
    })
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\utkarsh\resources\views/admin/product/import.blade.php ENDPATH**/ ?>