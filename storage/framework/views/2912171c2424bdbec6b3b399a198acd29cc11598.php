<?php $__env->startSection('title'); ?> <?php echo e($pageTitle); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>



<?php

$noofproduct = 0;

$totalamm = 0;

$totalqunatity = 0;

$taxamm = 0;

$extra_discount = 0;

$shippingcharge = 0;

?>



<section class="slice-xs sct-color-2 border-bottom">

<div class="container container-sm">

   <div class="row cols-delimited">

      <div class="col-4">

         <div class="icon-block icon-block--style-1-v5 text-center">

            <div class="block-icon c-gray-light mb-0">

               <i class="fa fa-shopping-cart"></i>

            </div>

            <div class="block-content d-none d-md-block">

               <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">1. My Cart</h3>

            </div>

         </div>

      </div>

      <div class="col-4">

         <div class="icon-block icon-block--style-1-v5 text-center">

            <div class="block-icon c-gray-light mb-0">

               <i class="fa fa-truck"></i>

            </div>

            <div class="block-content d-none d-md-block">

               <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">2. Shipping info</h3>

            </div>

         </div>

      </div>

      <div class="col-4">

         <div class="icon-block icon-block--style-1-v5 text-center active">

            <div class="block-icon mb-0">

               <i class="fa fa-credit-card"></i>

            </div>

            <div class="block-content d-none d-md-block">

               <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">3. Payment</h3>

            </div>

         </div>

      </div>

   </div>

</div>

</section>



<section class="py-3 gry-bg">

<div class="container">

    <p style="text-align: center;color: red; font-size: 20px;"><strong>Make a prepaid payment and avail free shipping.</strong></p>

   <div class="row cols-xs-space cols-sm-space cols-md-space">

      <div class="col-lg-8">

         <form action="" class="form-default" data-toggle="validator" role="form" method="POST">

            <input type="hidden" name="_token" value="">                            

            <div class="card">

               <div class="card-title px-4 py-3">

                  <h3 class="heading heading-5 strong-500">

                     Select a payment option

                  </h3>

               </div>

               <div class="card-body text-center">

                  <div class="row">

                     <div class="col-md-6 mx-auto">

                        <div class="row">

                           <div class="col-6">

                              <label class="payment_option mb-4" data-toggle="tooltip" data-title="Razorpay"  title="">

                              <input type="radio" id="razorpay" name="payment_options" value="razorpay" >

                             

                              <img src="<?php echo e(asset('frontend/img/cards/rozarpay.png')); ?>" class="img-fluid Razorpay">

                              </span>

                              </label>

                           </div>

                          

                           <div class="col-6">

                              <label class="payment_option mb-4" data-toggle="tooltip" data-title="Cash on Delivery" title="">

                              <input type="radio" id="cash_on_delivery" name="payment_options" value="cash_on_delivery" checked="">

                            

                              <img src="<?php echo e(asset('frontend/img/cards/cod.png')); ?>" class="img-fluid cash_on_delivery">

                              </span>

                              </label>

                           </div>

                        </div>

                     </div>

                  </div>

                  <div class="or or--1 mt-2">

                     <span>or</span>

                  </div>

                  

               </div>

            </div>

            <div class="row align-items-center pt-4">

               <div class="col-6">

                  <a href="<?php echo e(route('site.home')); ?>" class="link link--style-3">

                  <i class="ion-android-arrow-back"></i>

                  Return to shop

                  </a>

               </div>

               <div class="col-6 text-right btn-visible cod">

                   <a  href="#" class="btn btn-styled" id="cod" name="myButton">Place Order </a>

               </div>

               <div class="col-6 text-right btn-visible onlinepay" style="display: none;">

                  <a  href="#" class="btn btn-styled btn-base-1" name="myButton">Place Order </a>

               </div>

               <div class="col-12">

                  <p id="shipping_err"></p>

               </div>

            </div>

         </form>

      </div>

      <form action="<?php echo e(route('site.booking')); ?>" method="post" id="payform">

         <?php echo csrf_field(); ?>

         <input type="hidden" name="bookingId" value="<?php echo e(base64_encode($booking->id)); ?>">

         <input type="hidden" name="amount" value="" id="amount">

         <input type="hidden" name="shipping_charge" value="" id="shipping_charge">

         <input type="hidden" name="transaction_id" value="" id="transaction_id">

         <input type="hidden" name="discount_amount" value="<?php echo e($discount); ?>">  

      </form>

      <div class="col-lg-4 ml-lg-auto" id="append_summary_data">

       

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

                        <span class="badge badge-md badge-success"><?php echo e(count($cartProducts)); ?> Items</span>

                     </div>

                  </div>

               </div>

               <div class="card-body">

                  <table class="table-cart table-cart-review">

                     <thead>

                        <tr>

                           <th class="product-name">Product</th>

                           <th class="product-total text-right">Total</th>

                        </tr>

                     </thead>

                     <tbody>

                        

                        <?php if($cartProducts): ?>

                           <?php $__currentLoopData = $cartProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>



                           <?php

                              $totalamm += ($n->price * $n->quantity);

                              $totalqunatity += $n->quantity;

                              if($n->price >=1000){

                                 $taxamm += (($n->price/112) *12) * $n->quantity;

                              } else {

                                 $taxamm += (($n->price/105)*5) * $n->quantity;

                              }

                           ?>

                           <tr class="cart_item">

                           <td class="product-name">

                              <?php echo e($n->product_name); ?> 

                              <strong class="product-quantity">× <?php echo e($n->quantity); ?></strong>

                           </td>

                           <td class="product-total text-right">

                              <span class="pl-4">₹ <?php if( ($n->quantity * $n->price) >=1000 ): ?> 

                              <!--<?php echo e(intval(($n->quantity * $n->price) - (($n->quantity * $n->price)) * .12)); ?>-->

                              <?php echo e(number_format(($n->quantity * (($n->price*100)/112)),2)); ?>


                                    <?php else: ?> 

                              <!--<?php echo e(intval(($n->quantity * $n->price) - (($n->quantity * $n->price)) * .05)); ?> -->

                              <?php echo e(number_format(($n->quantity * (($n->price*100)/105)),2)); ?>


                              <?php endif; ?></span>

                           </td>

                          </tr>

                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php endif; ?>

                     </tbody>

                  </table>

                  <table class="table-cart table-cart-review my-4">

                     <thead>

                        <tr>

                           <th class="product-name">Product Shipping charge</th>

                           <th class="product-total text-right">Amount</th>

                        </tr>

                     </thead>

                     <tbody class="btn-visible onlinepay" style="display: none;">

                          <?php if($cartProducts): ?>

                           <?php $__currentLoopData = $cartProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                           <tr class="cart_item">

                           <td class="product-name">

                             <?php echo e($n->product_name); ?> 

                              <strong class="product-quantity">× <?php echo e($n->quantity); ?></strong>

                           </td>

                           <td class="product-total text-right">

                              <span class="pl-4" style="position: absolute;right: 6%;">₹ 0</span>

                           </td>

                           

                           </tr>

                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php endif; ?>

                     </tbody>

                     <tbody class="btn-visible cod">

                          <?php if($cartProducts): ?>

                           <?php $__currentLoopData = $cartProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                           <?php

                           $option = 1;

                           $nshippingcharge = 0;

                            switch ($option) { 

                                case ((!empty($n->product->level5category)) && $option ==1 ):

                                    $nshippingcharge = $n->product->level5category->shipping_charge; 

                                    break;

                                case ((!empty($n->product->level4category)) && $option ==1 ): 

                                    $nshippingcharge = $n->product->level4category->shipping_charge;

                                    break;

                                case ((!empty($n->product->level3category)) && $option ==1 ): 

                                    $nshippingcharge = $n->product->level3category->shipping_charge;

                                    break;

                                case ((!empty($n->product->level2category)) && $option ==1 ): 

                                    $nshippingcharge = $n->product->level2category->shipping_charge;

                                    break;

                                case ((!empty($n->product->level1category)) && $option ==1 ): 

                                    $nshippingcharge = $n->product->level1category->shipping_charge;

                                    break;                   

                            }

                        ?>

                           <tr class="cart_item">

                           <td class="product-name">

                             <?php echo e($n->product_name); ?> 

                              <strong class="product-quantity">× <?php echo e($n->quantity); ?></strong>

                           </td>

                           <td class="product-total text-right">

                              <span class="pl-4" style="position: absolute;right: 6%;">₹ <?php if($n->quantity==1 && $key==0): ?>

                              <?php echo e($nshippingcharge); ?>


                            <?php elseif($n->quantity>1 && $key==0): ?> 

                                 

                                <?php echo e($nshippingcharge + (($nshippingcharge/2) *($n->quantity - 1))); ?>


                                 

                            <?php elseif($n->quantity>1): ?> 

                            

                                <?php echo e($nshippingcharge/2 + (($nshippingcharge/2) *($n->quantity - 1))); ?>


                                 

                            <?php else: ?> 

                            

                                <?php echo e($nshippingcharge/2); ?>


                                

                            <?php endif; ?></span>

                           

                        

                          <?php if($n->quantity==1 && $key==0): ?>

                          <?php  $shippingcharge += $nshippingcharge; ?>

                          <?php elseif($n->quantity>1 && $key==0): ?>

                          <?php $shippingcharge += $nshippingcharge + (($nshippingcharge/2) *($n->quantity - 1)) ?>

                          <?php elseif($n->quantity>1): ?>

                          <?php $shippingcharge += $nshippingcharge/2 + (($nshippingcharge/2) *($n->quantity - 1)) ?>

                          <?php else: ?>

                          <?php $shippingcharge += $nshippingcharge/2 ?>

                          <?php endif; ?>

                           </td>

                           </tr>

                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php endif; ?>

                     </tbody>

                  </table>

                  <table class="table-cart table-cart-review">

                     <tfoot>

                        <tr class="cart-subtotal btn-visible onlinepay" style="display: none;">

                           <th>Subtotal</th>

                           <td class="text-right">

                              <span class="strong-600" style="position: absolute;right: 6%;">₹ <?php echo e(number_format((($totalamm - $taxamm)),2)); ?></span>

                           </td>

                        </tr>

                        

                        <tr class="cart-subtotal btn-visible cod" >

                           <th>Subtotal</th>

                           <td class="text-right">

                              <span class="strong-600" style="position: absolute;right: 6%;">₹ <?php echo e(number_format((($totalamm - $taxamm) + $shippingcharge),2)); ?></span>

                           </td>

                        </tr>

                        <tr class="cart-subtotal">

                           <th>Billing Amount</th>

                           <td class="text-right">

                              <span class="strong-600">₹ <?php echo e(number_format(($totalamm - $taxamm),2)); ?></span>

                           </td>

                        </tr>

                        <tr class="cart-shipping" >

                           <th>Tax</th>

                           <td class="text-right">

                              <span class="text-italic">₹ <?php echo e(number_format(($taxamm),2)); ?></span>

                           </td>

                        </tr>

                     

                        <tr class="cart-shipping btn-visible cod">

                           <th>Total Shipping</th>

                           <td class="text-right">

                               <p id="shippingcharge" val="<?php echo e(number_format(($shippingcharge),2)); ?>"></p><span class="text-italic" style="position: absolute;right: 6%;">₹ <?php echo e(number_format(($shippingcharge),2)); ?> </span>

                           </td>

                        </tr>

                        <tr class="cart-shipping btn-visible onlinepay" style="display: none;">

                           <th>Total Shipping</th>

                           <td class="text-right">

                               <p id="shippingcharge" val="0"></p><span class="text-italic" style="position: absolute;right: 6%;">₹ 0</span>

                           </td>

                        </tr>

                        

                        <tr class="cart-total">

                           <th><span class="strong-600">Discount</span></th>

                           <td class="text-right">

                              <p id="discount" val="<?php echo e(number_format($discount,2)); ?>"><strong><span style="position: absolute;right: 6%;">₹ <?php echo e(number_format(($discount),2)); ?></span></strong></p>

                           </td>

                        </tr>

                        

                        <tr class="cart-total btn-visible cod">

                           <th><span class="strong-600">Total</span></th>

                           <td class="text-right">

                              <p id="totalammount" val="<?php echo e(($totalamm + $shippingcharge - $discount)); ?>"><strong><span style="position: absolute;right: 6%;">₹ <?php echo e(number_format(($totalamm + $shippingcharge - $discount),2)); ?></span></strong></p>

                           </td>

                        </tr>

                        

                        <tr class="cart-total btn-visible onlinepay" style="display: none;">

                           <th><span class="strong-600">Total</span></th>

                           <td class="text-right">

                              <p id="totalammountonlinepay" val="<?php echo e(($totalamm - $discount)); ?>"><strong><span style="position: absolute;right: 6%;">₹ <?php echo e(number_format(($totalamm - $discount),2)); ?></span></strong></p>

                           </td>

                        </tr>

                        

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

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script type="text/javascript">

     var amountinpaisa = 0;

     var amount = 0;

     var shippingcharge = 0;



     $('.btn-base-1').on('click',function(){

      amount = $("#totalammountonlinepay").attr('val');

      amountinpaisa = parseInt($("#totalammountonlinepay").attr('val'))*100;

      shippingcharge = $("#shippingcharge").attr('val');

      console.log('amountinpaisa>>'+amount);

       options = {

           "key": "rzp_test_ZNT65SnaWUlR2I",

           "amount": amountinpaisa,

           "name": "Utkarsh Electricals",

           "description": "Payment for Utkarsh Electricals",

           "image": "<?php echo e(asset('/frontend/img/front_logo.png')); ?>",

           "handler": function (response){

             

            $('#amount').val(amount);

            $('#shipping_charge').val(0);

            

            $('#transaction_id').val(response.razorpay_payment_id);

            $('#payform').submit();

           },

           "prefill": {

               "name": '',

               "email": '',

               "contact": ''

           },

           "notes": {

               "address": "Test Address"

           },

           "theme": {

               "color": "#FFFFFF"

           }

       };

       rzp1 = new Razorpay(options);

       rzp1.open();

  })

</script>

<script>

$("#cod").click(function(){

amount = $("#totalammount").attr('val');

amountinpaisa = parseInt($("#totalammount").attr('val'))*100;

shippingcharge = $("#shippingcharge").attr('val');

$('#amount').val(amount);

$('#shipping_charge').val(shippingcharge);

$('#payform').submit();

});

</script>

<script type="text/javascript">

$('input[type=radio][name=payment_options]').change(function(){

    var val = this.value;

    alert('val>>'+val);

    if(val=='razorpay'){

    $('.cod').css({"display":"none"});

    $('.onlinepay').css({"display":"block"});

    } elseif(val=='cash_on_delivery'){

        $('.onlinepay').css({"display":"none"});

    $('.cod').css({"display":"block"});

    }

    //console.log('val>>'+val);

    });

</script>

<script>

$("#razorpay").click(function(){

    $('.cod').css({"display":"none"});

    $('.onlinepay').css({"display":"block"});

    $('.cash_on_delivery').css({"opacity":".5"});

    $('.Razorpay').css({"opacity":"1"});

});



$("#cash_on_delivery").click(function(){

    $('.cod').css({"display":"block"});

    $('.onlinepay').css({"display":"none"});

    $('.Razorpay').css({"opacity":".5"});

    $('.cash_on_delivery').css({"opacity":"1"});

});

</script>

<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('site.partials.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kaboi2pm1r04/public_html/utkarshelectricals.in/resources/views/site/products/payment.blade.php ENDPATH**/ ?>