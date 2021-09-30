<div class="tile">
    <table class="table table-hover custom-data-table-style table-striped table-col-width" id="sampleTable">
        <tbody>
            <tr>
                <td>Title</td>
                <td><?php echo e($targetproduct->name); ?></td>
            </tr>
            <tr>
                <td>Brand</td>
                <td><?php echo e(empty($targetproduct->brand)? null:$targetproduct->brand); ?></td>
            </tr>
            <tr>
                <td>Code</td>
                <td><?php echo e(empty($targetproduct->code)? null:$targetproduct->code); ?></td>
            </tr>
            <tr>
                <td>Price</td>
                <td><?php echo e(empty($targetproduct->price)? null:($targetproduct->price)); ?></td>
            </tr>
            <tr>
                <td>Offered Price</td>
                <td><?php echo e(empty($targetproduct->offered_price)? null:$targetproduct->offered_price); ?></td>
            </tr>
            <tr>
                <td>GST Rate</td>
                <td><?php echo e(empty($targetproduct->gst)? null:$targetproduct->gst); ?></td>
            </tr>
            <tr>
                <td>Weight</td>
                <td><?php echo e(empty($targetproduct->weight)? null:$targetproduct->weight); ?></td>
            </tr>
            <tr>
                <td>Views</td>
                <td><?php echo e(empty($targetproduct->views)? null:$targetproduct->views); ?></td>
            </tr>
        </tbody>
    </table>
</div><?php /**PATH /home1/demo9tbi/utkarshelectricals.in/resources/views/admin/product/includes/profile.blade.php ENDPATH**/ ?>