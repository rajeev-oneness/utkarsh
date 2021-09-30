<?php echo $__env->make("site.partials.header", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection("content"); ?>
<?php echo $__env->yieldSection(); ?>
<?php echo $__env->make("site.partials.footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/demo9tbi/utkarshelectricals.in/resources/views/site/partials/app.blade.php ENDPATH**/ ?>