<?php $__env->startSection('title'); ?> <?php echo e($pageTitle); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>



<!-- SHOP GRID WRAPPER -->

<section class="product-details-area">

   <div class="container">

      <div class="bg-white">

         <!-- Product gallery and Description -->

         <div class="row no-gutters cols-xs-space cols-sm-space cols-md-space">

            <div class="col-lg-6">

               <div class="product-gal sticky-top d-flex flex-row-reverse">

                  <div class="product-gal-img">

                     <img class="xzoom img-fluid" id="image_show" src="<?php echo e(asset('books/'.$product->image)); ?>" xoriginal="<?php echo e(asset('books/'.$product->image)); ?>" />

                  </div>

                  <div class="product-gal-thumb">

                     <div class="xzoom-thumbs">

                        <?php if($product_images): ?>

                        <?php $__currentLoopData = $product_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <a href="<?php echo e(asset('books/'.$n->image)); ?>">

                        <img class="xzoom-gallery"  src=" <?php echo e(asset('books/'.$n->image)); ?> " xpreview=" <?php echo e(asset('books/'.$n->image)); ?> " >

                        </a>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php endif; ?>



                       

                     </div>

                  </div>

               </div>

            </div>

            <div class="col-lg-6">

               <!-- Product description -->

               <div class="product-description-wrapper">

                  <!-- Product title -->

                  <h2 class="product-title">

                     <?php echo e(ucfirst($product->name)); ?>


                  </h2>

                  

                  <div class="row">

                     <div class="col-12">

                        <!-- Rating stars -->

                        <div class="rating mb-1">

                           <span class="count-star star-rating">

                           <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>

                           </span>

                           <span class="rating-count">(0 customer reviews)</span>

                        </div>

                        

                     </div>

                     <div class="col-12 text-left">

                        <ul class="inline-links inline-links--style-1">

                           <?php if($product->is_instock==1): ?>

                           <li>

                              <span class="badge badge-md badge-pill bg-green">In stock</span>

                           </li>

                           <?php else: ?>

                           <li>

                              <span class="badge badge-md badge-pill bg-red">Out of stock</span>

                           </li>

                           <?php endif; ?>
                           <li>

                              <span class="badge badge-md badge-pill bg-green">new arrival</span>

                           </li>
                           <li>

                              <span class="badge badge-md badge-pill bg-green">product of the week</span>

                           </li>

                        </ul>

                     </div>

                  </div>

                  <div class="row no-gutters mt-4 mb-4">

                     <div class="col-2">

                        <div class="product-description-label">Price:</div>

                     </div>

                     <div class="col-10">
					 
						<div class="price">
								<del>
									<span>₹</span> <?php echo e($product->inprice); ?>

								</del>
								<ins>
									<span>₹</span> <?php echo e($product->inoffered_price); ?>

								</ins>
							</div>

                        <div class="product-price-old d-none">

                           <del>

                           ₹ <span id="price"></span>

                           </del>

                        </div>

                     </div>

                  </div>

                  

                  <div class="row no-gutters mt-3 d-none">

                     <div class="col-2">

                        <div class="product-description-label mt-1">Discount Price:</div>

                     </div>

                     <div class="col-10">   

                        <div class="product-price">

                           <strong>

                           ₹ <span id="discountprice"><?php echo e($product->inoffered_price); ?></span>

                           </strong>

                        </div>

                     </div>

                  </div>

                

                  <?php if(!empty($productsizes)): ?>

                     <div class="row no-gutters mt-4 mb-4">

                        <div class="col-2">

                           <div class="product-description-label mt-2 ">SIZE:</div>

                        </div>

                        <div class="col-10">

                           <ul class="list-inline checkbox-alphanumeric checkbox-alphanumeric--style-1 mb-2">

                             

                             

                             <?php $slno=1;  ?>

                             <?php $__currentLoopData = $productsizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                              <li>

                                 <!--<input type="radio" id="choice_0-<?php echo e($n->sizes); ?>" name="choice_0" value="<?php echo e($n->sizes); ?>" <?php if($slno==1): ?><?php echo e('checked'); ?> <?php endif; ?>>

                                 <label for="choice_0-<?php echo e($n->sizes); ?>"><?php echo e($n->sizes); ?></label>-->

                                 <input type="radio" id="choice_0-<?php echo e($n->sizes); ?>" class="size-class" name="choice_0" value="<?php echo e($n->sizes); ?>" <?php if($slno==1): ?> <?php echo e('checked'); ?>  <?php endif; ?> myattr="<?php echo e($n->sizes); ?>" inofferedprice="<?php echo e($n->inoffered_price); ?>" inprice="<?php echo e($n->inprice); ?>">

                                 <label for="choice_0-<?php echo e($n->sizes); ?>"><?php echo e($n->sizes); ?></label>

                              </li>

                              <?php $slno++; ?>

                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                              

                           </ul>

                        </div>

                     </div>

                     <?php endif; ?>

                     <!-- Quantity + Add to cart -->

                     <form id="option-choice-form" method="post" action="<?php echo e(route('site.addcart')); ?>">

                     <div class="row no-gutters mt-4 mb-4">

                        <div class="col-2">

                           <div class="product-description-label mt-2">Quantity:</div>

                        </div>

                        <div class="col-3">

                            <div class="input-group qty_btn">

                             <span class="input-group-btn">

                                 <button type="button" class="quantity-left-minus btn btn-number"  data-type="minus" data-field="">

                                   <span class="fa fa-minus"></span>

                                 </button>

                             </span>

                             <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">

                             <span class="input-group-btn">

                                 <button type="button" class="quantity-right-plus btn btn-number" data-type="plus" data-field="">

                                     <span class="fa fa-plus"></span>

                                 </button>

                             </span>

                          </div>

                        </div>

                     </div>

                     <div class="row no-gutters pb-3 d-none" style="margin-top:20px;" id="chosen_price_div">

                        <div class="col-2">

                           <div class="product-description-label">Total Price:</div>

                        </div>

                        <div class="col-10">

                           <div class="product-price">

                              <strong id="chosen_price">

                              </strong>

                           </div>

                        </div>

                     </div>

                     <?php if($product->category->id!=12): ?>

                     <span class="sizechart-btn" id="reach-us" onclick="openBox()">Size Chart</span>

                     <?php endif; ?>

                     <div class="chatpopup" id="reachus" style="display:none;top:60%;right:30%;bottom: unset;">

                         

                        <!--<img class="img-xs sizechart_design" src="<?php echo e(asset('books/'.$product->size_chart)); ?>" alt="size_chart">-->

                        <?php $option = 1; 

                        switch ($option) { 

                           case ((!empty($product->level5category->name)) && $option ==1 ):?>

                              <img class="img-xs sizechart_design" src="<?php echo e(asset('sizechart/'.$product->level5category->size_chart)); ?>" alt="size_chart">

                        <?php $option = 1;        

                               break;

                           case ((!empty($product->level4category->name)) && $option ==1 ): ?>

                              <img class="img-xs sizechart_design" src="<?php echo e(asset('sizechart/'.$product->level4category->size_chart)); ?>" alt="size_chart">

                        <?php  break;

                           case ((!empty($product->level3category->name)) && $option ==1 ): ?>

                               <img class="img-xs sizechart_design" src="<?php echo e(asset('sizechart/'.$product->level3category->size_chart)); ?>" alt="size_chart">

                        <?php  break;

                           case ((!empty($product->level2category->name)) && $option ==1 ): ?>

                               <img class="img-xs sizechart_design" src="<?php echo e(asset('sizechart/'.$product->level2category->size_chart)); ?>" alt="size_chart">

                        <?php  break;

                           case ((!empty($product->level1category->name)) && $option ==1 ): ?>

                               <img class="img-xs sizechart_design" src="<?php echo e(asset('sizechart/'.$product->level1category->size_chart)); ?>" alt="size_chart">

                        <?php  break;                   

                        }  ?>

                        

                        <button type="button" class="fa fa-close" onclick="closeBox()"></button>

                     </div>

                  

                  

                     <?php echo csrf_field(); ?>

                  <div class="d-table width-100 mt-3">

                     <div class="d-table-cell">

                        <div id="show_buy_options">

                           <div class="clearfix"></div>

                                <input type="hidden" name="product_name" value="<?php echo e($product->name); ?>"/>

                                <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>"/>

                                <input type="hidden" name="product_code" value="<?php echo e($product->code); ?>"/>

                                <input type="hidden" name="product_image" value="<?php echo e(asset('/books/'.$product->image)); ?>"/>

                                <input type="hidden" name="price" id="cartprice" value="<?php echo e($product->inoffered_price); ?>"/>

                                <input type="hidden" name="gst" value="<?php echo e($product->gst); ?>"/>

                           <!-- Add to cart button -->

                           <?php if($product->is_instock==1): ?>

                           <button type="submit" class="btn btn-styled btn-alt-base-1 c-white btn-icon-left strong-700 hov-bounce hov-shaddow ml-2 add-cart-d bt-phone">

                           <i class="fa fa-shopping-cart"></i>

                           <span class="d-md-inline-block"> Add to cart</span>

                           </button>

                           

                           <button type="submit" class="btn btn-styled btn-alt-base-1 c-white btn-icon-left strong-700 hov-bounce hov-shaddow ml-2 buy-now-d bt-phone" name="view" value="view">

                           <i class="fa fa-shopping-cart"></i>

                           <span class="d-md-inline-block"> Buy Now</span>

                           </button>

                           <?php else: ?>

                           <button type="button" class="btn btn-styled btn-alt-base-1 c-white btn-icon-left strong-700 hov-bounce hov-shaddow ml-2">

							   <i class="fa fa-shopping-cart"></i>

							   <span class="d-none d-md-inline-block"> Out Of stock</span>
							</button>
                           <?php endif; ?>
							
						
                        </div>

                     </div>

                  </div>

                  </form>

                  

                  <div class="d-table width-100 mt-3">

                     <div class="d-table-cell">

                        <div id="show_buy_options">

                  <a href="<?php echo e(route('site.addwistlist',$n->id)); ?>" class="btn btn-styled btn-alt-base-1 c-white btn-icon-left strong-700 hov-bounce hov-shaddow ml-2 bt-phone">
                    <i class="fa fa-heart-o"></i>
                     <span class="d-md-inline-block add-cart-d">Add to wish list </span>

                  </a>

                  <a href="<?php echo e(route('site.add.compare',$n->id)); ?>" class="btn btn-styled btn-alt-base-1 c-white btn-icon-left strong-700 hov-bounce hov-shaddow ml-2 bt-phone">
                    <i class="fa fa-refresh"></i>
                     <span class="d-md-inline-block add-cart-d">Add to compare </span>

                  </a>

                  </div>

                  </div>

                 </div>






                  <!--<div class="row no-gutters mt-4">

                     <div class="col-2">

                        <div class="product-description-label mt-2">Share:</div>

                     </div>

                     <div class="col-10">

                        <div id="share">

                         <a href="" title="facebook" class="pop share-square share-square-facebook"></a>

                         <a href="" title="twitter" class="pop share-square share-square-twitter"></a>

                         <a href="" title="linkedin" class="pop share-square share-square-linkedin"></a>

                         <a href="" title="tumblr" class="pop share-square share-square-tumblr"></a>



                       </div>

                     </div>

                  </div>-->

               </div>

            </div>

         </div>

      </div>

   </div>

</section>

<section class="gry-bg">

   <div class="container">

      <div class="row">

        

         <div class="col-xl-12">

            <div class="product-desc-tab bg-white">

               <div class="tabs tabs--style-2">

                  <ul class="nav nav-tabs sticky-top bg-white">

                     <li class="nav-item">

                        <a href="#tab_default_1" data-toggle="tab" class="nav-link text-uppercase strong-600 active show">Description</a>

                     </li>

                     <li class="nav-item">

                        <a href="#tab_default_4" data-toggle="tab" class="nav-link text-uppercase strong-600">Reviews</a>

                     </li>

                  </ul>

                  <div class="tab-content pt-0">

                     <div class="tab-pane active show" id="tab_default_1">

                        <div class="py-4">

                           <div class="row">

                              <div class="col-md-12">

                                 <?php echo $product->description; ?><br>                                            

                              </div>

                           </div>

                           <span class="space-md-md"></span>

                        </div>

                     </div>

                     <div class="tab-pane" id="tab_default_2">

                        <div class="fluid-paragraph py-2">

                           <!-- 16:9 aspect ratio -->

                           <div class="embed-responsive embed-responsive-16by9 mb-5">

                           </div>

                        </div>

                     </div>

                     <div class="tab-pane" id="tab_default_3">

                        <div class="py-2 px-4">

                           <div class="row">

                              <div class="col-md-12">

                                 <a href="">Download</a>

                              </div>

                           </div>

                           <span class="space-md-md"></span>

                        </div>

                     </div>

                     <div class="tab-pane" id="tab_default_4">

                        <div class="fluid-paragraph py-4">

                           <div class="text-center">

                              There have been no reviews for this product yet.

                           </div>

                        </div>

                     </div>

                  </div>

               </div>

            </div>

            <div class="my-4 bg-white p-3">
				<div class="container">
					<div class="row m-0">
						<div class="col-12 text-center title-page">
							<h2>Related products</h2>
						</div>
					</div>
				</div>
               <div class="caorusel-box">

                  <div class="slick-carousel" data-slick-items="4" data-slick-xl-items="4" data-slick-lg-items="4"  data-slick-md-items="2" data-slick-sm-items="1" data-slick-xs-items="1"  data-slick-rows="1">

                      

                    <?php if($relatedproduct): ?>

                     <?php $__currentLoopData = $relatedproduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                     <?php $key = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $n->name)) ?>

                     <div class="p-2">

                        <div class="row no-gutters product-box-2 align-items-center">
						
							<div class="col-12">
								<div class="item deal-day">

									<a href="<?php echo URL::to('details/'.$n->id.'/'.$key); ?>" class="d-block product-image h-100">

										<img src="<?php echo e(asset('books/'.$n->image)); ?>" width="100%">

									</a>

									<div class="product-info text-center">
										<h5 class="product-name">
											<a href="<?php echo URL::to('details/'.$n->id.'/'.$key); ?>"><?php echo e($n->name); ?></a>
										</h5>
										<div class="group-info">
											<div class="stars-rating">
												<div class="star-rating">
													<span class="star-3"></span>
												</div>
												<div class="count-star star-rating">
													<i class = 'fa fa-star'></i>
													<i class = 'fa fa-star'></i>
													<i class = 'fa fa-star'></i>
													<i class = 'fa fa-star'></i>
													<i class = 'fa fa-star'></i>
												</div>
											</div>
											<div class="price">
												<del>
													<span>₹</span> <?php echo e($n->inprice); ?>

												</del>
												<ins>
													<span>₹</span> <?php echo e($n->inoffered_price); ?>

												</ins>
											</div>
										</div>
									</div>
									<div class="hover-like">
										<a title="Add to Wishlist" href="<?php echo e(route('site.addwistlist',$n->id)); ?>" tabindex="0">
											<div class="quick-cart bg-lightblue">
												<i class="ti-heart"></i>
											</div>
										</a>
										<a href="<?php echo e(route('site.add.compare',$n->id)); ?>" title="Add to Compare" tabindex="0">
											<div class="quick-cart">
												<i class="ti-reload"></i>
											</div>
										</a>
										<a title="Quick view" href="<?php echo URL::to('details/'.$n->id.'/'.$key); ?>" tabindex="0">
											<div class="quick-cart bg-lightyellow">
												<i class="ti-eye"></i>
											</div>
										</a>
									</div>
								</div>
							</div>

                           <div class="col-4 d-none">

                              <div class="position-relative overflow-hidden h-100">

                                 <a href="<?php echo URL::to('details/'.$n->id.'/'.$key); ?>" class="d-block product-image h-100">

                                   <img src="<?php echo e(asset('books/'.$n->image)); ?>" width="100%">

                                 </a>

                                 <div class="product-btns">

                                    <a class="btn add-wishlist" title="Add to Wishlist" href="<?php echo e(route('site.addwistlist',$n->id)); ?>" tabindex="0">

                                    <i class="fa fa-heart-o"></i>

                                    </a>

                                    

                                    <a href="<?php echo e(route('site.add.compare',$n->id)); ?>" class="btn add-compare" title="Add to Compare" tabindex="0">

                                       <i class="fa fa-refresh"></i>

                                    </a>

                                    

                                    <!--<button class="btn add-compare" title="Add to Compare">

                                    <i class="fa fa-refresh"></i>

                                    </button>-->

                                    

                                    <a class="btn quick-view" title="Quick view" href="<?php echo URL::to('details/'.$n->id.'/'.$key); ?>" tabindex="0">

                                    <i class="fa fa-eye"></i>

                                    </a>

                                 </div>

                              </div>

                           </div>

                           <div class="col-8 border-left d-none">

                              <div class="p-3">

                                 <h2 class="product-title mb-0 p-0 text-truncate">

                                    <a href="<?php echo URL::to('details/'.$n->id.'/'.$key); ?>"><?php echo e($n->name); ?></a>

                                 </h2>

                                 <div class="star-rating star-rating-sm mb-2">

                                    <i class = 'fa fa-star'></i>

                                    <i class = 'fa fa-star'></i>

                                    <i class = 'fa fa-star'></i>

                                    <i class = 'fa fa-star'></i>

                                    <i class = 'fa fa-star'></i>

                                 </div>

                                 <div class="clearfix">

                                    <div class="price-box float-left">

                                       <del class="old-product-price strong-400">₹ <?php echo e($n->inprice); ?></del>

                                       <span class="product-price strong-600">₹ <?php echo e($n->inoffered_price); ?></span>

                                    </div>

                                    <div class="float-right">

                                       <form action="<?php echo e(route('site.addcart')); ?>" method="post">

                                       <?php echo csrf_field(); ?>

                                       <input type="hidden" name="quantity" value="1"/>

                                       <input type="hidden" name="product_name" value="<?php echo e($n->name); ?>"/>

                                       <input type="hidden" name="product_id" value="<?php echo e($n->id); ?>"/>

                                       <input type="hidden" name="product_code" value="<?php echo e($n->code); ?>"/>

                                       <input type="hidden" name="product_image" value="<?php echo e(asset('/books/'.$n->image)); ?>"/>

                                       <input type="hidden" name="price" value="<?php echo e($n->inoffered_price); ?>"/>

                                       <input type="hidden" name="gst" value="<?php echo e($n->gst); ?>"/>

                                       <!--<button class="add-to-cart btn" title="Add to Cart" type="submit">

                                       <i class="fa fa-shopping-cart"></i>

                                       </button>-->

                                       </form>

                                    </div>

                                 </div>

                              </div>

                           </div>

                        </div>

                     </div>

                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                     <?php endif; ?>

                     

                     <!--<div class="p-2">

                        <div class="row no-gutters product-box-2 align-items-center">

                           <div class="col-4">

                              <div class="position-relative overflow-hidden h-100">

                                 <a href="" class="d-block product-image h-100">

                                   <img src="<?php echo e(asset('frontend/img/product/6.jpg')); ?>" width="100%">

                                 </a>

                                 <div class="product-btns">

                                    <button class="btn add-wishlist" title="Add to Wishlist">

                                    <i class="fa fa-heart-o"></i>

                                    </button>

                                    <button class="btn add-compare" title="Add to Compare">

                                    <i class="fa fa-refresh"></i>

                                    </button>

                                    <button class="btn quick-view" title="Quick view">

                                    <i class="fa fa-eye"></i>

                                    </button>

                                 </div>

                              </div>

                           </div>

                           <div class="col-8 border-left">

                              <div class="p-3">

                                 <h2 class="product-title mb-0 p-0 text-truncate">

                                    <a href="">FLOUNCE</a>

                                 </h2>

                                 <div class="star-rating star-rating-sm mb-2">

                                    <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>

                                 </div>

                                 <div class="clearfix">

                                    <div class="price-box float-left">

                                       <del class="old-product-price strong-400">₹ 3499</del>

                                       <span class="product-price strong-600">₹ 2799</span>

                                    </div>

                                    <div class="float-right">

                                       <button class="add-to-cart btn" title="Add to Cart">

                                       <i class="fa fa-shopping-cart"></i>

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

   </div>

</section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

<?php if(!empty($productsizes)): ?>

<script type="text/javascript">

$('input[type=radio][name=choice_0]').change(function(){

var val = this.value;

var inofferedprice = $(this).attr("inofferedprice");

var inprice = $(this).attr("inprice");

$('#discountprice').text(inofferedprice);

$('#price').text(inprice);

$('#cartprice').val(inofferedprice); 

//console.log('inofferedprice>>'+inofferedprice);

});



jQuery(function($){

   var size = $('.size-class').attr("myattr");

   var inofferedprice = $('.size-class').attr("inofferedprice");

   var inprice = $('.size-class').attr("inprice");

   $('#discountprice').text(inofferedprice);

   $('#price').text(inprice);

   $('#cartprice').val(inofferedprice); 

});

</script>

<?php endif; ?>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('site.partials.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\utkarsh\resources\views/site/products/details.blade.php ENDPATH**/ ?>