
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
                           Wishlist
                        </h2>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="float-md-right">
                           <ul class="breadcrumb">
                              <li><a href="<?php echo e(route('site.home')); ?>">Home</a></li>
                              <li><a href="">Dashboard</a></li>
                              <li class="active"><a href="<?php echo e(route('site.wishlist')); ?>">Wishlist</a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Wishlist items -->
               <div class="row shop-default-wrapper shop-cards-wrapper shop-tech-wrapper mt-4">
                   
               <?php if($products): ?>
               <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <?php $key = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $n->name)) ?>
                  <div class="col-xl-4 col-6" id="wishlist_154">
                     <div class="card card-product mb-3 product-card-2">
                        <div class="card-body p-3">
                           <div class="card-image">
                              <a href="<?php echo URL::to('details/'.$n->id.'/'.$key); ?>" class="d-block" >
                                 <img src="<?php echo e(asset('books/'.$n->image)); ?>" width="100%">
                              </a>
                           </div>
                           <h2 class="heading heading-6 strong-600 mt-2 text-truncate-2">
                              <a href="<?php echo URL::to('details/'.$n->id.'/'.$key); ?>"><?php echo e($n->name); ?></a>
                           </h2>
                           <div class="star-rating star-rating-sm mb-1">
                              <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                           </div>
                           <div class="mt-2">
                              <div class="price-box">
                                 <del class="old-product-price strong-400">₹ <?php echo e($n->inprice); ?></del>
                                 <span class="product-price strong-600">₹ <?php echo e($n->inoffered_price); ?></span>
                              </div>
                           </div>
                        </div>
                        <div class="card-footer p-3">
                           <div class="product-buttons">
                              <div class="row align-items-center">
                                 <div class="col-2">
                                    <a href="<?php echo e(route('site.wishlist.delete',$n->id)); ?>" class="link link--style-3" data-toggle="tooltip" data-placement="top"  data-original-title="Remove from wishlist">
                                    <i class="fa fa-close"></i>
                                    </a>
                                 </div>
                                 <div class="col-10">
                                     <form action="<?php echo e(route('site.addcart')); ?>" method="post">
                                       <?php echo csrf_field(); ?>
                                       <input type="hidden" name="quantity" value="1"/>
                                       <input type="hidden" name="product_name" value="<?php echo e($n->name); ?>"/>
                                       <input type="hidden" name="product_id" value="<?php echo e($n->id); ?>"/>
                                       <input type="hidden" name="product_code" value="<?php echo e($n->code); ?>"/>
                                       <input type="hidden" name="product_image" value="<?php echo e(asset('/books/'.$n->image)); ?>"/>
                                       <input type="hidden" name="price" value="<?php echo e($n->inoffered_price); ?>"/>
                                       <input type="hidden" name="gst" value="<?php echo e($n->gst); ?>"/>
                                    <button type="submit" class="btn btn-block btn-base-1 btn-circle btn-icon-left" >
                                    <i class="fa fa-shopping-cart mr-2"></i>Add to cart
                                    </button>
                                    </form>
                                    <!--<button type="button" class="btn btn-block btn-base-1 btn-circle btn-icon-left" >
                                    <i class="fa fa-shopping-cart mr-2"></i>Add to cart
                                    </button-->
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
                  
                  <!--<div class="col-xl-4 col-6" id="wishlist_155">
                     <div class="card card-product mb-3 product-card-2">
                        <div class="card-body p-3">
                           <div class="card-image">
                              <a href="" class="d-block" >
                                 <img src="img/product/2.jpg" width="100%">
                              </a>
                           </div>
                           <h2 class="heading heading-6 strong-600 mt-2 text-truncate-2">
                              <a href="">GREEN &amp; BLACK PIPING ~ Everyday wear Abaya for women</a>
                           </h2>
                           <div class="star-rating star-rating-sm mb-1">
                              <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                           </div>
                           <div class="mt-2">
                              <div class="price-box">
                                 <del class="old-product-price strong-400">₹ 4800</del>
                                 <span class="product-price strong-600">₹ 2400</span>
                              </div>
                           </div>
                        </div>
                        <div class="card-footer p-3">
                           <div class="product-buttons">
                              <div class="row align-items-center">
                                 <div class="col-2">
                                    <a href="#" class="link link--style-3" data-toggle="tooltip" data-placement="top" title=""  data-original-title="Remove from wishlist">
                                    <i class="fa fa-close"></i>
                                    </a>
                                 </div>
                                 <div class="col-10">
                                    <button type="button" class="btn btn-block btn-base-1 btn-circle btn-icon-left" >
                                    <i class="fa fa-shopping-cart mr-2"></i>Add to cart
                                    </button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>-->
                  
               </div>
               
            </div>
         </div>
      </div>
   </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site.partials.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demo9dtx/public_html/dev/dazzle/resources/views/site/auth/wishlist.blade.php ENDPATH**/ ?>