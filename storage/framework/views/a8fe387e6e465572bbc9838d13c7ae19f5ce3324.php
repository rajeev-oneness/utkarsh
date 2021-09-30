<?php $__env->startSection('title'); ?> <?php echo e($pageTitle); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

   <div class="container">
      <div class="row">
         <div class="col">			<nav aria-label="breadcrumb">				<ol class="title-items breadcrumb">				  <li class="breadcrumb-item title-item"><a href="<?php echo e(route('site.home')); ?>">Home</a></li>				  <li class="breadcrumb-item active">All Categories</li>				</ol>			</nav>
         </div>
         <div class="col">
            <div class="text-right">
               <a href="<?php echo e(route('site.deletecomparelist')); ?>"  class="btn btn-link btn-base-5 btn-sm">Reset Compare List</a>
            </div>
         </div>
      </div>
   </div>

<section class="gry-bg py-4">
   <div class="container">
      <div class="row">
         <div class="col">
            <div class="card mb-4">
               <div class="card-header text-center p-2">
                  <div class="heading-5">Comparison</div>
               </div>
               <?php if(!empty($comparelist)): ?>
               <div class="card-body">
                  <table class="table table-bordered compare-table mb-0">
                     <thead>
                        <tr>
                           <th scope="col"  class="font-weight-bold width1">
                              Name
                           </th>
                           <?php $__currentLoopData = $comparelist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <?php $key = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $n->name)) ?>
                           <th scope="col"  class="font-weight-bold width2">
                              <a href="<?php echo URL::to('details/'.$n->id.'/'.$key); ?>" target="_blank"><?php echo e($n->name); ?></a>
                           </th>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <th scope="row">Image</th>
                           <?php $__currentLoopData = $comparelist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <?php $key = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $n->name)) ?>
                           <td>
                              <a href="<?php echo URL::to('details/'.$n->id.'/'.$key); ?>" target="_blank">
                              <img src="<?php echo e(asset('books/'.$n->image)); ?>" alt="Product Image" class="img-fluid py-4">
                              </a>
                           </td>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           
                        </tr>
                        <tr>
                           <th scope="row">Price</th>
                           <?php $__currentLoopData = $comparelist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <td>₹ <?php echo e($n->inoffered_price); ?></td>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           
                        </tr>
                        <tr>
                           <th scope="row">Description</th>
                           <?php $__currentLoopData = $comparelist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <td><?php echo $n->description; ?></td>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           

                        </tr>
                        <tr>
                           <th scope="row"></th>
                           <?php $__currentLoopData = $comparelist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <form action="<?php echo e(route('site.addcart')); ?>" method="post">
                           <?php echo csrf_field(); ?>
                           <input type="hidden" name="quantity" value="1"/>
                           <input type="hidden" name="product_name" value="<?php echo e($n->name); ?>"/>
                           <input type="hidden" name="product_id" value="<?php echo e($n->id); ?>"/>
                           <input type="hidden" name="product_code" value="<?php echo e($n->code); ?>"/>
                           <input type="hidden" name="product_image" value="<?php echo e(asset('/books/'.$n->image)); ?>"/>
                           <input type="hidden" name="price" value="<?php echo e($n->inoffered_price); ?>"/>
                           <input type="hidden" name="gst" value="<?php echo e($n->gst); ?>"/>
                           <td class="text-center py-4">
                              <button type="submit" class="btn btn-base-1 btn-circle btn-icon-left">
                              <i class="icon ion-android-cart"></i>Add to cart
                              </button>
                           </td>
                           </form>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           
                        </tr>
                     </tbody>
                  </table>
               </div>
               <?php else: ?>
               <p style="text-align: center; margin-top: 20px;"><strong> No data found </strong> </p>
               <?php endif; ?>
            </div>
         </div>
      </div>
   </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site.partials.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demo9dtx/public_html/dev/dazzle/resources/views/site/products/compare.blade.php ENDPATH**/ ?>