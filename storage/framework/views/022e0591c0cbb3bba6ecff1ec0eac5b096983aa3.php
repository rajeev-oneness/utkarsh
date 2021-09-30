<?php $__env->startSection('title'); ?> Dashboard <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php
$users = App\Models\User::where('is_deleted','0')->where('type',1)->get();
$delivery_boys = App\Models\User::where('is_deleted','0')->where('type',2)->get();
$new_orders = App\Models\Booking::where('is_deleted','0')->where('status',1)->get();
$shipped_orders = App\Models\Booking::where('is_deleted','0')->where('status',2)->get();
$completed_orders = App\Models\Booking::where('is_deleted','0')->where('status',3)->get();
$cancelled_orders = App\Models\Booking::where('is_deleted','0')->where('status',4)->get();
$order_result = DB::select("select sum(total_amount) as total_amount from bookings where status in (1,2,3)");
$active_products = App\Models\Booking::where('is_deleted','0')->where('is_active',1)->get();

$latest_orders = App\Models\Booking::where('is_deleted','0')->get();
?>
    <div class="fixed-row">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-tags"></i> Dashboard</h1>
            </div>
            
        </div>
    </div>
    <div class="row section-mg row-md-body no-nav">
        <div class="col-md-6 col-lg-3">
            <div class="widget-small primary coloured-icon">
                <i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                    <h4>No Of Customers</h4>
                    <p><b><?php echo e(count($users)); ?> </b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small primary coloured-icon">
                <i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                    <h4>Delivery Boys</h4>
                    <p><b><?php echo e(count($delivery_boys)); ?> </b></p>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 col-lg-3">
            <div class="widget-small warning coloured-icon">
                <i class="icon fa fa-files-o fa-3x"></i>
                <div class="info">
                    <h4>New Orders</h4>
                    <p><b><?php echo e(count($new_orders)); ?> </b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small warning coloured-icon">
                <i class="icon fa fa-files-o fa-3x"></i>
                <div class="info">
                    <h4>Shipped Orders</h4>
                    <p><b><?php echo e(count($shipped_orders)); ?> </b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small warning coloured-icon">
                <i class="icon fa fa-files-o fa-3x"></i>
                <div class="info">
                    <h4>Completed Orders</h4>
                    <p><b><?php echo e(count($completed_orders)); ?> </b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small warning coloured-icon">
                <i class="icon fa fa-files-o fa-3x"></i>
                <div class="info">
                    <h4>Cancelled Orders</h4>
                    <p><b><?php echo e(count($cancelled_orders)); ?> </b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small danger coloured-icon">
                <i class="icon fa fa-star fa-3x"></i>
                <div class="info">
                    <h4>Order Value</h4>
                    <p><b>Rs. <?php echo e($order_result[0]->total_amount); ?> </b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small danger coloured-icon">
                <i class="icon fa fa-star fa-3x"></i>
                <div class="info">
                    <h4>Active Products</h4>
                    <p><b><?php echo e(count($active_products)); ?> </b></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3>Latest Orders</h3>
                <div class="tile-body">
                    
                    <table class="table table-hover custom-data-table-style table-striped" id="">
                        <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Order Id</th>
                            <th>Customer Details</th>
                            <th>Order Date</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Payment Details</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                            <?php $slno =1; ?>
                            <?php $__currentLoopData = $latest_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($slno); ?></td>
                                    <td><?php echo e($products->unique_code); ?></td>
                                    <td><?php echo e($products->name); ?><br><?php echo e($products->mobile); ?></td>
                                    <td><?php echo e(date("d/M/Y", strtotime($products->order_date_time))); ?></td>
                                    <td>Rs. <?php echo e($products->total_amount); ?></td>
                                    <td>
                                    <?php if($products->status==1): ?><?php echo e('New Order'); ?>

                                    <?php elseif($products->status==2): ?><?php echo e('Order Shipped'); ?>

                                    <?php elseif($products->status==3): ?><?php echo e('Order Completed'); ?>

                                    <?php elseif($products->status==4): ?><?php echo e('Order Modified'); ?>

                                    <?php elseif($products->status==5): ?><?php echo e('Payment Link Raised'); ?>

                                    <?php elseif($products->status==6): ?><?php echo e('Order Cancelled'); ?>

                                    <?php endif; ?>
                                    </td>

                                    <td>
                                    <?php if($products->payment_mode==1): ?><?php echo e('Online Payment'); ?>

                                    <?php elseif($products->payment_mode==2): ?><?php echo e('With Wallet'); ?>

                                    <?php elseif($products->payment_mode==3): ?><?php echo e('COD'); ?>

                                    <?php endif; ?>
                                    <br/>
                                    Transaction Id: <br>
                                    <?php echo e($products->transaction_id); ?>

                                    </td>
                             

                                
                            <?php $slno++ ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\utkarsh\resources\views/admin/dashboard/index.blade.php ENDPATH**/ ?>