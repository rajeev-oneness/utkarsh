
<?php $__env->startSection('title'); ?> <?php echo e($pageTitle); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('frontend/css/jquery.carousel-3d.default.css')); ?>" type="text/css">
<script src="<?php echo e(asset('frontend/js/jquery.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/jquery.resize.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/jquery.waitforimages.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/modernizr.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/jquery.carousel-3d.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<div class="wrapper">
<div data-carousel-3d>
   <div>
      <img src="<?php echo e(asset('frontend/img/product/1.jpg')); ?>" selected ></img>
      <h2 class="post-title">
         <a href="javascript:void(0)"></a>
      </h2>
   </div>
   <div>
      <img src="<?php echo e(asset('frontend/img/product/2.jpg')); ?>" selected ></img>
      <h2 class="post-title">
         <a href="javascript:void(0)"></a>
      </h2>
   </div>
   <div>
      <img src="<?php echo e(asset('frontend/img/product/3.jpg')); ?>" selected ></img>
      <h2 class="post-title">
         <a href="javascript:void(0)"></a>
      </h2>
   </div>
   <div>
      <img src="<?php echo e(asset('frontend/img/product/4.jpg')); ?>" selected ></img>
      <h2 class="post-title">
         <a href="javascript:void(0)"></a>
      </h2>
   </div>
   <div>
      <img src="<?php echo e(asset('frontend/img/product/5.jpg')); ?>" selected ></img>
      <h2 class="post-title">
         <a href="javascript:void(0)"></a>
      </h2>
   </div>
   <div>
      <img src="<?php echo e(asset('frontend/img/product/6.jpg')); ?>" selected ></img>
      <h2 class="post-title">
         <a href="javascript:void(0)"></a>
      </h2>
   </div>
   <div>
      <img src="<?php echo e(asset('frontend/img/product/7.jpg')); ?>" selected ></img>
      <h2 class="post-title">
         <a href="javascript:void(0)"></a>
      </h2>
   </div>
   <div>
      <img src="<?php echo e(asset('frontend/img/product/8.jpg')); ?>" selected ></img>
      <h2 class="post-title">
         <a href="javascript:void(0)"></a>
      </h2>
   </div>
</div>
</div>
<script>
function slide_next(){
    $("[data-carousel-3d] [data-next-button]").trigger('click');
}

$(document).ready(function(){
    myVar = setInterval("slide_next()", 3000);
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site.partials.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demo9dtx/public_html/dev/dazzle/resources/views/site/cms/ourcustomers.blade.php ENDPATH**/ ?>