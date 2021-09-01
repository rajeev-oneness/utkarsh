
<?php $__env->startSection('title'); ?> <?php echo e($pageTitle); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> <?php echo e($pageTitle); ?></h1>
            <p><?php echo e($subTitle); ?></p>
        </div>
    </div>
    <?php echo $__env->make('admin.partials.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php
    $start_date = (isset($_GET['start_date']) && $_GET['start_date']!='')?$_GET['start_date']:'';
    $end_date = (isset($_GET['end_date']) && $_GET['end_date']!='')?$_GET['end_date']:'';
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form action="">
                    <table class="table table-hover custom-data-table-style table-striped" id="">
                        <tbody>
                            <tr>
                                <td>
                                    <input type="date" class="form-control" name="start_date" placeholder="Order Date" value="<?php echo e($start_date); ?>">
                                </td>
                                <td>
                                    <input type="date" class="form-control" name="end_date" placeholder="Order Date" value="<?php echo e($end_date); ?>">
                                </td>
                                <td>
                                    <button class="btn btn-primary" type="submit" id="btnSave"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    </form>
                    <table class="table table-hover custom-data-table-style table-striped" id="">
                        <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Order Id</th>
                            <th>Customer Details</th>
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
                                    <td><?php echo e($products->unique_code); ?><br>
                                     (<?php if($products->status==1): ?><?php echo e('New Order'); ?>

                                    <?php elseif($products->status==2): ?><?php echo e('Order Shipped'); ?>

                                    <?php elseif($products->status==3): ?><?php echo e('Order Completed'); ?>

                                    <?php elseif($products->status==4): ?><?php echo e('Order Modified'); ?>

                                    <?php elseif($products->status==5): ?><?php echo e('Payment Link Raised'); ?>

                                    <?php elseif($products->status==6): ?><?php echo e('Order Cancelled'); ?>

                                    <?php endif; ?>)</td>
                                    <td><?php echo e($products->name); ?><br><?php echo e($products->mobile); ?></td>
                                    <td><?php echo e(date("d/M/Y", strtotime($products->order_date_time))); ?></td>
                                    <td>Rs. <?php echo e($products->total_amount); ?></td>
                                    
                                    <td>
                                    <?php if($products->payment_mode==1): ?><?php echo e('Online Payment'); ?>

                                    <?php elseif($products->payment_mode==2): ?><?php echo e('With Wallet'); ?>

                                    <?php elseif($products->payment_mode==3): ?><?php echo e('COD'); ?>

                                    <?php endif; ?>
                                    <br/>
                                    Transaction Id: <br>
                                    <?php echo e($products->transaction_id); ?>

                                    </td>
                                
                            <?php 
                            $slno++;
                            $total_amount = $total_amount+$products->total_amount;
                             ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td colspan="4">Total Orders</td>
                                <td colspan="2"><b><?php echo e($slno-1); ?></b></td>
                            </tr>
                            <tr>
                                <td colspan="4">Total Order Value</td>
                                <td colspan="2"><b>Rs. <?php echo e($total_amount); ?></b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/demo9tbi/utkarshelectricals.in/resources/views/admin/order/date_wise_report.blade.php ENDPATH**/ ?>