<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
<?php $__env->stopPush(); ?>
<?php
    $errors = Session::get('error');
    $messages = Session::get('success');
    $info = Session::get('info');
    $warnings = Session::get('warning');
?>
<?php if($errors): ?> 
	<?php $__currentLoopData = $errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	    <!-- <div class="alert alert-danger alert-dismissible" role="alert">
	        <button class="close" type="button" data-dismiss="alert">×</button>
	        <strong>Error!</strong> <?php echo e($value); ?>

	    </div> -->
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
	    <script type="text/javascript">
		swal("Error!", "<?php echo e($value); ?>", "error")
		</script>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
<?php endif; ?>

<?php if($messages): ?>
<?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
	<script type="text/javascript">
	swal("Success!", "<?php echo e($value); ?>", "success")
	</script>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
<?php endif; ?>

<?php if($info): ?> 
	<?php $__currentLoopData = $info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	    <div class="alert alert-info alert-dismissible" role="alert">
	        <button class="close" type="button" data-dismiss="alert">×</button>
	        <strong>Info!</strong> <?php echo e($value); ?>

	    </div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
<?php endif; ?>

<?php if($warnings): ?> 
	<?php $__currentLoopData = $warnings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	    <!-- <div class="alert alert-warning alert-dismissible" role="alert">
	        <button class="close" type="button" data-dismiss="alert">×</button>
	        <strong>Warning!</strong> <?php echo e($value); ?>

	    </div> -->
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
	    <script type="text/javascript">
		swal("Warning!", "<?php echo e($value); ?>", "warning")
		</script>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
<?php endif; ?>
<?php /**PATH /home1/demo9tbi/utkarshelectricals.in/resources/views/admin/partials/flash.blade.php ENDPATH**/ ?>