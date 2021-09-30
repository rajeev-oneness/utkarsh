<?php $__env->startSection('title'); ?> <?php echo e('Vendor Create'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="app-title">
        <div>
            <!-- <h1><i class="fa fa-tags"></i> <?php echo e(''); ?></h1> -->
        </div>
    </div>
    <br><br>
    <?php echo $__env->make('admin.partials.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title"><?php echo e('Purchase Order'); ?> <span class="float-right">UTK-<?php echo e($order->id); ?></span></h3>
                <hr>
                <div class="tile-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Vendor</label>
                            <?php if($order->vendor): ?>
                                <input type="text" name="" class="form-control" value="<?php echo e($order->vendor->name); ?>" readonly="">
                            <?php endif; ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label" for="ship_to"> Ship to<span class="m-l-5 text-danger"> *</span></label>
                            <textarea name="ship_to" placeholder="Ship to" class="form-control" readonly=""><?php echo e($order->ship_to); ?></textarea>
                            <?php $__errorArgs = ['ship_to'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <hr><h3>Items</h3>
                        <?php  $total = 0; ?>
                        <?php $__currentLoopData = $order->purchase_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label>Items</label>
                                    <input type="text" class="form-control" value="<?php echo e($items->product->name); ?>" readonly>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Quantity</label>
                                    <input type="text" class="form-control" value="<?php echo e($items->quantity); ?>" readonly>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Unit Price</label>
                                    <input type="text" class="form-control unitPrice" value="<?php echo e(number_format($items->product->inprice,2)); ?>" readonly>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Price</label>
                                    <input type="text" class="form-control overAllPrice" value="<?php echo e(number_format($items->product->inprice * $items->quantity,2)); ?>" readonly>
                                </div>
                            </div>
                            <?php  $total += ($items->product->inprice * $items->quantity); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="row">
                            <div class="form-group col-md-8">
                                <h3>Total : <?php echo e(number_format($total,2)); ?></h3>
                            </div>
                            <div class="form-group col-md-4"></div>
                        </div>
                    </div>
                </div>
                <center><button class="printthepage">Print</button></center>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">
        $(document).on('click','.printthepage',function(){
            window.print();return false;
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kaboi2pm1r04/public_html/utkarsh/resources/views/admin/vendor/purchase/order/view.blade.php ENDPATH**/ ?>