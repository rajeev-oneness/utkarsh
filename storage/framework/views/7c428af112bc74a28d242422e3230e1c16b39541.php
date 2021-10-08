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
                <td>Sku Code</td>
                <td><?php echo e(empty($targetproduct->code)? null:$targetproduct->code); ?></td>
            </tr>
            <tr>
                <td>HSN Code</td>
                <td><?php echo e(empty($targetproduct->hsn)? null:$targetproduct->hsn); ?></td>
            </tr>
            <tr>
                <td>Price</td>
                <td><?php echo e(empty($targetproduct->inprice)? null:($targetproduct->inprice)); ?></td>
            </tr>
            <tr>
                <td>Offered Price</td>
                <td><?php echo e(empty($targetproduct->inoffered_price)? null:$targetproduct->inoffered_price); ?></td>
            </tr>
            <tr>
                <td>GST Rate</td>
                <td><?php echo e(empty($targetproduct->gst)? null:$targetproduct->gst); ?></td>
            </tr>
            
        </tbody>
    </table>
</div><?php /**PATH D:\utkarsh\resources\views/admin/product/includes/profile.blade.php ENDPATH**/ ?>