<?php $__env->startSection('title'); ?> <?php echo e('Purchase Order'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
   <div class="fixed-row">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-file-text"></i> <?php echo e('Purchase Order'); ?></h1>
            <p><?php echo e('Purchase Order List'); ?></p>
        </div>
        <a href="<?php echo e(route('admin.vendor.purchase.order.create')); ?>" class="btn btn-primary pull-right">Add New</a>
    </div>
    </div>
    <?php echo $__env->make('admin.partials.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="alert alert-success" id="success-msg" style="display: none;">
        <span id="success-text"></span>
    </div>
    <div class="alert alert-danger" id="error-msg" style="display: none;">
        <span id="error-text"></span>
    </div>
    <div class="row section-mg row-md-body no-nav">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-striped" id="sampleTable">
                        <thead>
                            <tr>
                                <th> PO Number </th>
                                <th> Vendor Info </th>
                                <th> Ship To</th>
                                <th> View </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $purchaseOrder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>UTK-<?php echo e($order->id); ?></td>
                                    <td>
                                        <?php if($order->vendor): ?>
                                            <ul>
                                                <li>vendor Id : <?php echo e($order->vendor->id); ?></li>
                                                <li>vendor Name : <?php echo e($order->vendor->name); ?></li>
                                                <li>vendor Email : <?php echo e($order->vendor->email); ?></li>
                                            </ul>
                                        <?php else: ?>
                                            <?php echo e(('N/A')); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($order->ship_to); ?></td>
                                    <td><a href="<?php echo e(route('admin.vendor.purchase.order.view',[$order->id])); ?>">View</a></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <?php echo e($purchaseOrder->links()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('styles'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
    
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kaboi2pm1r04/public_html/utkarsh/resources/views/admin/vendor/purchase/list.blade.php ENDPATH**/ ?>