<div class="tile">
    <table class="table table-hover custom-data-table-style table-striped table-col-width" id="sampleTable">
        <tbody>
            <tr>
                <td>Order Id</td>
                <td><?php echo e($booking->unique_code); ?></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><?php echo e($booking->name); ?></td>
            </tr>
            <tr>
                <td>Email Id</td>
                <td><?php echo e($booking->email); ?></td>
            </tr>
            <tr>
                <td>Mobile No</td>
                <td><?php echo e($booking->mobile); ?></td>
            </tr>
            <tr>
                <td>MAC Address</td>
                <td><?php echo e($booking->mac); ?></td>
            </tr>
            <tr>
                <td>Order Date</td>
                <td><?php echo e(date("d-M -Y", strtotime($booking->order_date_time) )); ?> </td>
            </tr>
            <tr>
                <td>Used Coupon</td>
                <td><?php echo e($booking->coupon_code); ?></td>
            </tr>
            <tr>
                <td>Total Weight</td>
                <td><?php echo e($booking->total_weight); ?> gms.</td>
            </tr>
            <tr>
                <td>Basic Amount</td>
                <td><?php echo e($booking->amount); ?></td>
            </tr>
            <tr>
                <td>Discount Amount</td>
                <td><?php echo e($booking->discount_amount); ?></td>
            </tr>
            <tr>
                <td>Tax Amount</td>
                <td><?php echo e($booking->tax_amount); ?></td>
            </tr>
            <tr>
                <td>Shipping Charge</td>
                <td><?php echo e($booking->shipping_charge); ?></td>
            </tr>
            <tr>
                <td>Express Delivery Charge</td>
                <td><?php echo e($booking->express_charge); ?></td>
            </tr>
            <tr>
                <td>Total Amount</td>
                <td><?php echo e($booking->total_amount); ?></td>
            </tr>
            <tr>
            <td>Payment Mode</td>
            <td>
                <?php if($booking->payment_mode==1): ?><?php echo e('Online Payment'); ?>

                <?php elseif($booking->payment_mode==2): ?><?php echo e('With Wallet'); ?>

                <?php elseif($booking->payment_mode==3): ?><?php echo e('COD'); ?>

                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td>Payment Done</td>
            <td>
                <?php if($booking->is_paid == 1): ?>
                    <?php echo e('Yes'); ?> 
                <?php else: ?> 
                    <?php echo e('No'); ?> 
                <?php endif; ?>
            </td>
        </tr>
        </tbody>
    </table>
</div><?php /**PATH /home/kaboi2pm1r04/public_html/utkarshelectricals.in/resources/views/admin/order/includes/profile.blade.php ENDPATH**/ ?>