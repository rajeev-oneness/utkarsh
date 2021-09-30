<?php $__env->startSection('title'); ?> <?php echo e('Vendor Assign Item'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> <?php echo e('Assign vendor Items'); ?></h1>
        </div>
    </div>
    <?php echo $__env->make('admin.partials.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title"><?php echo e('Assign Vendor Items'); ?></h3>
                <hr>
                <form action="<?php echo e(route('admin.vendor.product.assign.post')); ?>" method="POST" role="form" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="tile-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="control-label" for="vendor"> <span class="m-l-5 text-danger"> *</span></label>
                                <select class="form-control" name="vendor" id="vendor" onchange="getVendorProductListandItemsToAssign(this)">
                                    <option value="" hidden="">Select Vendor</option>
                                    <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($vendor->id); ?>"><?php echo e($vendor->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['vendor'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group col-md-6" id="multipleProductSelection" style="display:none;">
                                <label class="control-label" for="products">Select Product <span class="m-l-5 text-danger"> *</span></label>
                                <select class="form-control" name="products[]" id="productMultipleSelection" multiple="" required>
                                    <option value="" selected="" hidden="">Select Product</option>
                                </select>
                                <?php $__errorArgs = ['products'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Assign</button>
                        &nbsp;&nbsp;&nbsp;
                        <!--<a class="btn btn-secondary" href="<?php echo e(route('admin.blog.index')); ?>"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>-->
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">
        function getVendorProductListandItemsToAssign(data)
        {
            $.ajax({
                url : '<?php echo e(route('admin.vendor.product.assign.list')); ?>',
                type : 'GET',
                dataType : 'JSON',
                data : {vendorId : data.value},
                success:function(response){
                    console.log(response);
                    var options = '<option value="" selected="" hidden="">Select Product</option>';
                    $.each(response.product, function(key,value){
                        options += '<option value="'+value.id+'" ';
                        $.each(response.vendorItem, function(vendorKey,vendorValue) {
                            if(vendorValue.productId == value.id){
                                options += 'selected';return;
                            }
                        });
                        options += '>('+value.id+') '+value.name+'</option>';
                    });
                    $('#productMultipleSelection').empty().append(options);
                    $('#multipleProductSelection').show();
                }
            });
        }
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kaboi2pm1r04/public_html/utkarshelectricals.in/resources/views/admin/vendor/assignItem.blade.php ENDPATH**/ ?>