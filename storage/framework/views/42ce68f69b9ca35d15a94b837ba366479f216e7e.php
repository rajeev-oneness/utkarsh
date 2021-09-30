<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <table class="table table-hover custom-data-table-style table-striped" id="sampleTable2">
                    <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>User Name</th>
                            <th>Rating</th>
                            <th>Review Title</th>
                            <th>Review</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $slno=0; ?>
                        <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reviews): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($slno); ?></td>
                                <td><?php echo e($reviews->name); ?></td>
                                <td><?php echo e($reviews->rating); ?></td>
                                <td><?php echo e($reviews->title); ?></td>
                                <td><?php echo e($reviews->review); ?></td>
                            </tr>
                            <?php $slno ++; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">$('#sampleTable2').DataTable({"ordering": false});</script>
<?php $__env->stopPush(); ?><?php /**PATH /home1/demo9tbi/utkarshelectricals.in/resources/views/admin/product/includes/payment.blade.php ENDPATH**/ ?>