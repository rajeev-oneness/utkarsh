
<?php $__env->startSection('title'); ?> <?php echo e($pageTitle); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<section class="gry-bg py-4 profile">
   <div class="container">
      <div class="row cols-xs-space cols-sm-space cols-md-space">
        <?php echo $__env->make('site.auth.partials.profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="col-lg-9">
            <div class="main-content">
        <!-- Page title -->
       <div class="page-title">
          <div class="row align-items-center">
             <div class="col-md-6 col-12">
                <h2 class="heading heading-6 text-capitalize strong-600 mb-0">
                   Purchase History
                </h2>
             </div>
             <div class="col-md-6 col-12">
                <div class="float-md-right">
                   <ul class="breadcrumb">
                      <li><a href="">Home</a></li>
                      <li><a href="">Dashboard</a></li>
                      <li class="active"><a href="">Manage Profile</a></li>
                   </ul>
                </div>
             </div>
          </div>
       </div>
       
       <div class="row" style="margin-top: 20px;">
          <?php if($bookings): ?>
          <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-md-4">
              <div class="order-box">
                 <div class="order">
                    <div class="row">
                       <div class="col-md-6">
                       <h2>Order Id</h2>
                       <h2>Order Date</h2>
                       <h2>Order Time</h2>
                       <h2>Order Price</h2>
                    </div>
                    <div class="col-md-6">
                       <h3><?php echo e($n->unique_code); ?></h3>
                       <h3><?php echo e(Carbon\Carbon::parse($n->order_date_time)->format('d/M/Y')); ?></h3>
                       <h3><?php echo e(Carbon\Carbon::parse($n->order_date_time)->format('H:i a')); ?></h3>
                       <h3>Rs: <?php echo e($n->total_amount); ?></h3>
                    </div>
                    </div>
                    <hr>
                 </div>                                       
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
           
        </div>
    </div>
</div>
</div>
</div>
</section>
<?php $__env->stopSection(); ?>        
<?php echo $__env->make('site.partials.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demo9dtx/public_html/dev/dazzle/resources/views/site/auth/purchasehistory.blade.php ENDPATH**/ ?>