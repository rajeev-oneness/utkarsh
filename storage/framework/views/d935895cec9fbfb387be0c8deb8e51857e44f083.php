
<?php $__env->startSection('title'); ?> <?php echo e($pageTitle); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> <?php echo e($pageTitle); ?></h1>
            <p><?php echo e($subTitle); ?></p>
        </div>
    </div>
    <?php echo $__env->make('admin.partials.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    
                    <table class="table table-hover custom-data-table-style table-striped" id="">
                        <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Order Id</th>
                            <th>Order Date</th>
                            <th>Amount</th>
                            <!-- <th>Status</th> -->
                            <th>Payment Details</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            $slno =1;
                            $total_amount = 0;
                            ?>
                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($slno); ?></td>
                                    <td><?php echo e($products->unique_code); ?></td>
                                    <td><?php echo e(date("d/M/Y", strtotime($products->order_date_time))); ?></td>
                                    <td>Rs. <?php echo e($products->total_amount); ?></td>
                                    <td><?php echo e($products->transaction_id); ?></td>
                                
                            <?php 
                            $slno++;
                            $total_amount = $total_amount+$products->total_amount;
                             ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td colspan="3">Total Transactions</td>
                                <td colspan="2"><b><?php echo e($slno-1); ?></b></td>
                            </tr>
                            <tr>
                                <td colspan="3">Total Order Value</td>
                                <td colspan="2"><b>Rs. <?php echo e($total_amount); ?></b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/demo9tbi/utkarshelectricals.in/resources/views/admin/order/transaction_list.blade.php ENDPATH**/ ?>