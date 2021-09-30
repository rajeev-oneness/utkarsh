<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <table class="table table-hover custom-data-table-style table-striped" id="sampleTable1">
                    <thead>
                    <tr>
                        <th>Sr No</th>
                        <th>Name</th>
                        <th>Publisher</th>
                        <th>Author</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Unit Cost</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $slno = 1; ?>
                        <?php $__currentLoopData = $bookingProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td> <?php echo e($slno); ?> </td>
                                <td> <?php echo e($ad->product_name); ?> </td>
                                <td> <?php echo e($ad->product_brand); ?> </td>
                                <td> <?php echo e($ad->product_author); ?> </td>
                                <td> <?php echo e($ad->price); ?> </td>
                                <td> <?php echo e($ad->price); ?> </td>
                                <td> <?php echo e($ad->price * $ad->quantity); ?> </td>
                            </tr>
                            <?php $slno ++; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                               <tr>
                                <td colspan="5"></td>
                                <td>Basic Amount</td>
                                <td><?php echo e($booking->amount); ?></td>
                            </tr>
                            <tr>
                                <td colspan="5"></td>
                                <td>GST</td>
                                <td><?php echo e($booking->tax_amount); ?></td>
                            </tr>
                            <tr>
                                <td colspan="5"></td>
                                <td>Discount Amount</td>
                                <td><?php echo e($booking->discount_amount); ?></td>
                            </tr>
                             <tr>
                                <td colspan="5"></td>

                                <td>Shipping Charge<br><span style="display: block;font-size: 10px;">(Weight : <?php echo e($booking->total_weight); ?> gm.)</span></td>
                                <td><?php echo e($booking->shipping_charge); ?></td>
                            </tr>
                             <tr>
                                <td colspan="5"></td>
                                <td>Express Delivery Charge</td>
                                <td><?php echo e($booking->express_charge); ?></td>
                            </tr>
                            <tr>
                                <td colspan="5"></td>
                                <td>COD Charge</td>
                                <td><?php echo e($booking->cod_charge); ?></td>
                            </tr>

                            <tr>
                                <td colspan="5"></td>
                                <td>Total Amount</td>
                                <td><?php echo e($booking->total_amount + $booking->tax_amount); ?></td>
                            </tr>
                            <tr>
                                <td colspan="5"></td>
                                <td>Paid Amount</td>
                                <td><?php echo e($booking->paid_amount); ?></td>
                            </tr>
                            <tr>
                                <td colspan="5"></td>
                                <td>Due Amount</td>
                                <td><?php echo e(($booking->total_amount + $booking->tax_amount) - $booking->paid_amount); ?></td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->startPush('scripts'); ?>
<script type="text/javascript" src="<?php echo e(asset('backend/js/plugins/jquery.dataTables.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('backend/js/plugins/dataTables.bootstrap.min.js')); ?>"></script>
<script type="text/javascript">$('#sampleTable1').DataTable({"ordering": false});</script>
<?php $__env->stopPush(); ?><?php /**PATH /home1/demo9tbi/utkarshelectricals.in/resources/views/admin/order/includes/orderdetails.blade.php ENDPATH**/ ?>