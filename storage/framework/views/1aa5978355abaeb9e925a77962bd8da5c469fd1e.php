<?php $__env->startSection('title'); ?> <?php echo e($pageTitle); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php
$noofproduct = 0;
$totalamm = 0;
$totalqunatity = 0;
$taxamm = 0;
$discount = 0;
$extra_discount = 0;
$shippingcharge = 0;
?>

<section class="slice-xs sct-color-2 border-bottom">
   <div class="container container-sm">
      <div class="row cols-delimited">
         <div class="col-4">
            <div class="icon-block icon-block--style-1-v5 text-center active">
               <div class="block-icon mb-0">
                  <i class="la la-shopping-cart"></i>
               </div>
               <div class="block-content d-none d-md-block">
                  <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">1. My Cart</h3>
               </div>
            </div>
         </div>
         <div class="col-4">
            <div class="icon-block icon-block--style-1-v5 text-center">
               <div class="block-icon c-gray-light mb-0">
                  <i class="la la-truck"></i>
               </div>
               <div class="block-content d-none d-md-block">
                  <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">2. Shipping info</h3>
               </div>
            </div>
         </div>
         <div class="col-4">
            <div class="icon-block icon-block--style-1-v5 text-center">
               <div class="block-icon c-gray-light mb-0">
                  <i class="la la-credit-card"></i>
               </div>
               <div class="block-content d-none d-md-block">
                  <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">3. Payment</h3>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="py-4 gry-bg" id="cart-summary">
   <div class="container">
      <div class="row cols-xs-space cols-sm-space cols-md-space">
         <div class="col-xl-8">
            <!-- <form class="form-default bg-white p-4" data-toggle="validator" role="form"> -->
            <div class="form-default bg-white p-4">
               <div class="">
                  <div class="">
                     <table class="table-cart table">
                        <thead>
                           <tr>
                              <th></th>
                              <th class="product-name">Product</th>
                              <th class="product-price d-none d-lg-table-cell">Price</th>
                              <th class="product-quanity d-none d-md-table-cell">Quantity</th>
                              <th class="product-total">Total</th>
                              <th class="product-remove"></th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php if($cart_products): ?>
                           <?php $slno = 0; ?>
                           <?php $__currentLoopData = $cart_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                           <?php
                              $totalamm += ($n->price * $n->quantity);
                              $totalqunatity += $n->quantity;
                              if($n->price >=1000){
                                 $taxamm += (($n->price/112) *12) * $n->quantity;
                              } else {
                                 $taxamm += (($n->price/105)*5) * $n->quantity;
                              }
                           ?>
                           <tr class="cart-item">
                              <td class="product-image">
                                 <a href="#" class="mr-3">
                                 <img src="<?php echo e($n->product_image); ?>">
                                 </a>
                              </td>
                              <td class="product-name">
                                 <span class="pr-4 d-block"><?php echo e($n->product_name); ?></span>
                              </td>
                              <td class="product-price d-none d-lg-table-cell">								 
                                 <span class="pr-3 d-block">
                                  ₹ <?php echo e($n->price); ?>                                    
                                 </span>
                              </td>
                              <td class="product-quantity d-none d-md-table-cell">
                                    <form action="<?php echo e(route('site.update.cart')); ?>" method="post">
                                       <?php echo csrf_field(); ?>
                                    <input type="hidden" name="product_id" value="<?php echo e($n->id); ?>"/>
                                    <div class="input-group">
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-left-minus btn btn-number"  data-type="minus" data-field="" val="<?php echo e($n->id); ?>">
                                          <span class="fa fa-minus"></span>
                                        </button>
                                    </span>
                                    <input type="text" id="quantity<?php echo e($n->id); ?>" name="quantity" class="form-control input-number" value="<?php echo e($n->quantity); ?>" min="1" max="5">

                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-right-plus btn btn-number" data-type="plus" data-field="" val="<?php echo e($n->id); ?>">
                                            <span class="fa fa-plus"></span>
                                        </button>
                                    </span>
                                </div>								<button type="submit" class="btn btn-styled mt-2">									<i class="fa fa-shopping-cart"></i>									<span class="d-none d-md-inline-block"> Update Cart</span>								</button>
                                </form>
                              </td>
                              <td class="product-total">								
                                 <span>₹ <?php echo e($n->quantity * $n->price); ?></span>
                              </td>
                              <td class="product-remove">
                                 <a href="<?php echo e(route('site.remove.cart',$n->id)); ?>">
                                 <i class="fa fa-trash"></i>
                                 </a>
                              </td>
                           </tr>
                           <?php $slno++; ?>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           <?php endif; ?>
                        </tbody>
                     </table>
                  </div>
               </div>
               <div class="row align-items-center pt-4">
                  <div class="col-6">
                     <a href="<?php echo e(URL::previous()); ?>" class="link link--style-3">
                     <i class="la la-mail-reply"></i>
                     Return to shop
                     </a>
                  </div>
                  <?php if(count($cart_products)): ?>
                  <div class="col-6 text-right">
                     <a  href="<?php echo URL::to('check-out'); ?>" class="btn btn-styled btn-base-1">Continue to Shipping</a>
                  </div>
                  <?php endif; ?>
               </div>
            </div>
            <!-- </form> -->
         </div>
         <div class="col-xl-4 ml-lg-auto">
       
            <div id="cs_summary">
               <div class="card sticky-top">
                  <div class="card-title">
                     <div class="row align-items-center">
                        <div class="col-6">
                           <h3 class="heading heading-3 strong-400 mb-0">
                              <span>Summary</span>
                           </h3>
                        </div>
                        <div class="col-6 text-right">
                           <span class="badge badge-md badge-success"><?php echo e(count($cart_products)); ?> Items</span>
                        </div>
                     </div>
                  </div>
                  <div class="card-body">
                     <table class="table-cart table-cart-review">
                        <thead>
                           <tr>
                              <th>Product</th>
                              <th class="text-right">Total</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php if($cart_products): ?>
                           <?php $__currentLoopData = $cart_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <tr class="cart_item">
                              <td>
                                 <?php echo e($n->product_name); ?>

                                 <strong class="product-quantity">× <?php echo e($n->quantity); ?></strong>
                              </td>
                              <td class="text-right">
                                 <span class="pl-4">₹  <?php if( ($n->quantity * $n->price) >=1000 ): ?> 
                                    <!--<?php echo e(intval(($n->quantity * $n->price) - (($n->quantity * $n->price)) * .12)); ?>-->
                                    <?php echo e(number_format(($n->quantity * (($n->price*100)/112)),2)); ?>

                                <?php else: ?> 
                                    <!--<?php echo e(($n->quantity * $n->price) - (($n->quantity * $n->price)) * .05); ?>--> 
                                    <?php echo e(number_format(($n->quantity * (($n->price*100)/105)),2)); ?>

                                <?php endif; ?></span>
                              </td>
                           </tr>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           <?php endif; ?>
                        </tbody>
                     </table>
                     <!--<table class="table-cart table-cart-review my-4">
                        <thead>
                           <tr>
                              <th class="product-name">Product Shipping charge</th>
                              <th class="product-total text-right">Amount</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php if($cart_products): ?>
                           <?php $__currentLoopData = $cart_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <tr class="cart_item">
                              <td class="product-name">
                                 <?php echo e($n->product_name); ?>

                                 <strong class="product-quantity">× <?php echo e($n->quantity); ?></strong>
                              </td>
                              
                              <td class="product-total text-right">
                                 <span class="pl-4">₹ 0 (Flat rate)</span>
                              </td>
                           </tr>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           <?php endif; ?>
                        </tbody>
                     </table>-->
                     <table class="table-cart table-cart-review">
                        <tfoot>
                           <tr class="cart-subtotal">
                              <th>Subtotal</th>
                              <td class="text-right">
                                 <span class="strong-600">₹ <?php echo e(number_format(($totalamm - $taxamm),2)); ?></span>
                              </td>
                           </tr>
                           <!--<tr class="cart-subtotal">
                              <th>Subtotal</th>
                              <td class="text-right">
                                 <span class="strong-600">₹ <?php echo e(number_format(($totalamm - $taxamm ) + $shippingcharge)); ?></span>
                              </td>
                           </tr>-->
                           <tr class="cart-subtotal">
                              <th>Billing Amount</th>
                              <td class="text-right">
                                 <span class="strong-600">₹ <?php echo e(number_format(($totalamm - $taxamm),2)); ?></span>
                              </td>
                           </tr>
                           <tr class="cart-shipping">
                              <th>Tax</th>
                              <td class="text-right">
                                 <span class="text-italic">₹ <?php echo e(number_format($taxamm,2)); ?> </span>
                              </td>
                           </tr>
                           <!--<tr class="cart-shipping">
                              <th>Total Shipping</th>
                              <td class="text-right">
                                 <span class="text-italic">₹ <?php echo e(intval($shippingcharge)); ?></span>
                              </td>
                           </tr>-->
                           <!--<tr class="cart-total">
                              <th><span class="strong-600">Total</span></th>
                              <td class="text-right">
                                 <strong><span>₹ <?php echo e(intval($totalamm + $shippingcharge)); ?></span></strong>
                              </td>
                           </tr>-->
                           <!--<tr class="cart-total">
                              <th><span class="strong-600">Total</span></th>
                              <td class="text-right">
                                 <strong><span>₹ <?php echo e(number_format($totalamm,2)); ?></span></strong>
                              </td>
                           </tr>-->
                        </tfoot>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
$(document).ready(function(){
var quantitiy=0;
   $('.quantity-right-plus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var ext = parseInt($(this).attr('val'));
        var quantity = parseInt($('#quantity'+ext).val());

        // If is not undefined
        $('#quantity'+ext).val(quantity + 1);
        // Increment
   });

   $('.quantity-left-minus').click(function(e){
     // Stop acting like a button
     e.preventDefault();
     // Get the field name
     var ext = parseInt($(this).attr('val'));
     var quantity = parseInt($('#quantity'+ext).val());

     // If is not undefined

     // Increment
     if(quantity>0){
     $('#quantity'+ext).val(quantity - 1);
   }
 });
});
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site.partials.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\utkarsh\resources\views/site/products/cart.blade.php ENDPATH**/ ?>