<?php $__env->startSection('title'); ?> <?php echo e('Vendor Create'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> <?php echo e('New vendor'); ?></h1>
        </div>
    </div>
    <?php echo $__env->make('admin.partials.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title"><?php echo e('Vendor Items'); ?></h3>
                <hr>
                <form action="<?php echo e(route('admin.vendor.purchase.order.save')); ?>" method="POST" role="form" enctype="multipart/form-data">
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
                            <div class="form-group col-md-6">
                                <label class="control-label" for="ship_to"> Ship to<span class="m-l-5 text-danger"> *</span></label>
                                <textarea name="ship_to" placeholder="Ship to" class="form-control"></textarea>
                                <?php $__errorArgs = ['ship_to'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <hr>
                        <h3>Items</h3>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>Items</label>
                                <select name="items[]" class="vendorItems form-control" required=""><option value="" selected="" hidden="">Select Product</option></select>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Quantity</label>
                                <input type="text" name="quantity[]" class="form-control" required="">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Unit Price</label>
                                <input type="text" class="form-control" class="form-control unitPrice" readonly="">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Price</label>
                                <input type="text" class="form-control" class="form-control overAllPrice" readonly="">
                            </div>
                            <div class="form-group col-md-1">
                                <label></label>
                                <a href="javascript:void(0)" class="addMoreRow">+</a>
                            </div>
                        </div>
                        <div id="newRowtoBeInsertHere"></div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="<?php echo e(route('admin.blog.index')); ?>"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">
        var options = '<option value="" selected="" hidden="">Select Product</option>';
        function getVendorProductListandItemsToAssign(data)
        {
            $.ajax({
                url : '<?php echo e(route('admin.vendor.purchase.order.create')); ?>',
                type : 'GET',
                dataType : 'JSON',
                data : {vendorId : data.value},
                success:function(response){
                    console.log(response);
                    options = '<option value="" selected="" hidden="">Select Product</option>';
                    $.each(response.vendorItem, function(key,value){
                        options += '<option value="'+value.id+'" ';
                        options += '>('+value.id+') '+value.product.name+'</option>';
                    });
                    $('.vendorItems').empty().append(options);
                }
            });
        }

        $(document).on('click','.addMoreRow',function(){
            $('.addMoreRow').addClass('removeRow text-danger').text('X');
            $('.removeRow').removeClass('addMoreRow');
            var newRow = '<div class="row"><div class="form-group col-md-3"><label>Items</label><select name="items[]" class="vendorItems form-control" required="">'+options+'</select></div><div class="form-group col-md-2"><label>Quantity</label><input type="text" name="quantity[]" class="form-control" required=""></div><div class="form-group col-md-3"><label>Unit Price</label><input type="text" class="form-control" class="form-control unitPrice" readonly=""></div><div class="form-group col-md-3"><label>Price</label><input type="text" class="form-control" class="form-control overAllPrice" readonly=""></div><div class="form-group col-md-1"><label></label><a href="javascript:void(0)" class="addMoreRow">+</a></div></div>';
            $('#newRowtoBeInsertHere').append(newRow);
        });

        $(document).on('click','.removeRow',function(){
            var thisClicked = $(this);
            thisClicked.closest('.row').remove();
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/WorkArea/Oneness/utkarsh/resources/views/admin/vendor/purchase/create.blade.php ENDPATH**/ ?>