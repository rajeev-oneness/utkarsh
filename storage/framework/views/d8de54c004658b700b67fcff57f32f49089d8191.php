<?php $__env->startSection('title'); ?> <?php echo e($pageTitle); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<section class="banner pt-0 pb-5 ">
	<div class="row no-gutters position-relative">
		<div class="col-lg-12 col-xs-12 slider">
			<div class="slider-banner owl-carousel owl-theme">
				<?php if($banners): ?>
				<?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="item">
					<a href=""><img src="<?php echo e(asset('/banners/'.$n->image)); ?>" alt="Slider Image"></a>
				</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

				<?php endif; ?>  
			</div>
		</div>
	</div>
</section><!--banner-->

<section class="mb-4 d-none">

<div class="container">

   <div class="row gutters-10">

      <!--<?php if($categories): ?>

      <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

      <div class="media-banner mb-3 <?php if($n->name=='women'): ?><?php echo e('mb-lg-0 banner-bottom'); ?> <?php elseif($n->name=='Man'): ?><?php echo e('mb-lg-0'); ?> <?php elseif($n->name=='Girls'): ?><?php echo e('mb-lg-0 banner-bottom'); ?> <?php elseif($n->name=='Boys'): ?><?php echo e('mb-lg-0 banner-top'); ?> <?php elseif($n->name=='Hijab'): ?><?php echo e('mb-lg-0 banner-top'); ?><?php endif; ?>">

         <a href=""  class="banner-container">

         <img src="<?php echo e(asset('categories/'.$n->image)); ?>" alt="" class="img-fluid" >

         </a>

      </div>

      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      <?php endif; ?>-->

      <div class="media-banner mb-3 mb-lg-0 banner-bottom">

         <a href="<?php echo URL::to('product-list/8/women'); ?>"  class="banner-container">

         <img src="<?php echo e(asset('frontend/img/women.jpg')); ?>" alt="" class="img-fluid" >

         </a>

      </div>

      <div class="media-banner mb-3 mb-lg-0">

         <a href="<?php echo URL::to('product-list/9/men'); ?>"  class="banner-container">

         <img src="<?php echo e(asset('frontend/img/men.jpg')); ?>" alt="" class="img-fluid" >

         </a>

      </div>

      <div class="media-banner mb-3 mb-lg-0 banner-bottom">

         <a href="<?php echo URL::to('product-list/10/girls'); ?>"  class="banner-container">

         <img src="<?php echo e(asset('frontend/img/girls.jpg')); ?>" alt="" class="img-fluid">

         </a>

      </div>

      <div class="media-banner mb-3 mb-lg-0 banner-top" >

         <a href="<?php echo URL::to('product-list/17/boys'); ?>"  class="banner-container">

         <img src="<?php echo e(asset('frontend/img/boys.jpg')); ?>" alt="" class="img-fluid">

         </a>

      </div>

      <div class="media-banner mb-3 mb-lg-0 banner-top">

         <a href="<?php echo URL::to('product-list/12/hijab'); ?>"  class="banner-container">

         <img src="<?php echo e(asset('frontend/img/hijab.jpg')); ?>" alt="" class="img-fluid">

         </a>

      </div>

   </div>

</div>

</section>

<section class="mb-4 dk d-none">

<div class="container">

   <div class="row gutters-10">

      <!--<?php $slno = 1;  ?>

      <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

      <?php $key = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $n->name)) ?>

      <?php if($slno!=3): ?>

       <div class="col-lg-4 col-md-4">

         <div class="media-banner mb-3 mb-lg-0 <?php if($slno == 1 || $slno == 2): ?><?php echo e('banner-bottom'); ?> <?php elseif($slno == 3 || $slno == 4): ?><?php echo e('banner-top'); ?><?php endif; ?>">

            <a href="<?php echo URL::to('product-list/'.$n->id.'/'.$key); ?>"  class="banner-container">

            <img src="<?php echo e(asset('categories/'.$n->image)); ?>" alt="" class="img-fluid" >

            </a>

         </div>

      </div>

      <?php else: ?>

      <div class="col-lg-4 col-md-4">

         <div class="media-banner mb-3 mb-lg-0">

            <a href="<?php echo URL::to('product-list/'.$n->id.'/'.$key); ?>" class="banner-container">

            <img src="<?php echo e(asset('categories/'.$n->image)); ?>" alt="" class="img-fluid" >

            </a>

         </div>

      </div>

      <?php endif; ?>

      <?php $slno++; ?>

      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->

      

      <div class="col-lg-4 col-md-4">

         <div class="media-banner mb-3 mb-lg-0 banner-bottom">

            <a href="<?php echo URL::to('product-list/8/women'); ?>"  class="banner-container">

            <img src="<?php echo e(asset('frontend/img/357_300women.jpg')); ?>" alt="" class="img-fluid" >

            </a>

         </div>

         <div class="media-banner mb-3 mb-lg-0 banner-bottom">

            <a href="<?php echo URL::to('product-list/10/girls'); ?>"  class="banner-container">

            <img src="<?php echo e(asset('frontend/img/357_190_girls.jpg')); ?>" alt="" class="img-fluid">

            </a>

         </div>

      </div>



      <div class="col-lg-4 col-md-4">

         <div class="media-banner mb-3 mb-lg-0">

            <a href="<?php echo URL::to('product-list/9/men'); ?>"  class="banner-container">

            <img src="<?php echo e(asset('frontend/img/377_500_men.jpg')); ?>" alt="" class="img-fluid" >

            </a>

         </div>

      </div>



      <div class="col-lg-4 col-md-4">

         <div class="media-banner mb-3 mb-lg-0 banner-top">

            <a href="<?php echo URL::to('product-list/17/boys'); ?>"  class="banner-container">

            <img src="<?php echo e(asset('frontend/img/357_300boys.jpg')); ?>" alt="" class="img-fluid">

            </a>

         </div>

         <div class="media-banner mb-3 mb-lg-0 banner-top">

            <a href="<?php echo URL::to('product-list/12/hijab'); ?>"  class="banner-container">

            <img src="<?php echo e(asset('frontend/img/357_190_hijab.jpg')); ?>" alt="" class="img-fluid">

            </a>

         </div>

      </div>

      



   </div>

</div>

</section>

<section class="mb-4">

<div class="container">
	<div class="row m-0">
		<div class="col-12 text-center title-page">
			<h2>Flash Deals</h2>
		</div>
	</div>
</div>

<div class="container">

   <div class="px-2 py-4 p-md-4">

      <div class="caorusel-box">

         <div class="slick-carousel" data-slick-items="5" data-slick-xl-items="4" data-slick-lg-items="3"  data-slick-md-items="3" data-slick-sm-items="2" data-slick-xs-items="1">

         <?php if($flashdeals): ?>

         <?php $__currentLoopData = $flashdeals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

         <?php $key = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $n->name)) ?>
		 
			<div class="item deal-day m-2">
				<div class="product-top">
					<div class="flash">
						<span class="onnew">
							<span class="text">
								new
							</span>
						</span>
					</div>
				</div>

				<a href="<?php echo URL::to('details/'.$n->id.'/'.$key); ?>" class="d-block">

					<img src="<?php echo e(asset('books/'.$n->image)); ?>" width="100%">

				</a>

				<div class="product-info text-center">
					<h5 class="product-name">
						<a href="<?php echo URL::to('details/'.$n->id.'/'.$key); ?>" tabindex="0"><?php echo e($n->name); ?></a>
					</h5>
					<div class="group-info">
						<div class="stars-rating">
							<div class="star-rating">
								<span class="star-3"></span>
							</div>
							<div class="count-star star-rating star-rating-sm">
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
				<!--<div class="hover-like">
					<div class="quick-cart bg-lightblue">
						<i class="ti-heart"></i>
					</div>
					<
					<div class="quick-cart bg-lightyellow">
						<i div class="quick-cart">
						<i class="ti-search"></i>
					</div>class="ti-shopping-cart"></i>
					</div>
				</div>-->
			</div>

            <div class="product-card-2 card card-product m-2 shop-cards shop-tech d-none">

               <div class="card-body p-0">

                  <div class="card-image">

                     <a href="<?php echo URL::to('details/'.$n->id.'/'.$key); ?>" class="d-block">

                     <img src="<?php echo e(asset('books/'.$n->image)); ?>" width="100%">

                     </a>

                  </div>

                  <div class="p-3">

                     <div class="price-box">

                        <del class="old-product-price strong-400"><span>₹</span> <?php echo e($n->inprice); ?></del>

                        <span class="product-price strong-600"><span>₹</span> <?php echo e($n->inoffered_price); ?></span>

                     </div>

                     <div class="star-rating star-rating-sm mt-1">

                        <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>

                     </div>

                     <h1 class="product-title p-0 text-truncate-2">

                        <a href="<?php echo URL::to('details/'.$n->id.'/'.$key); ?>"><?php echo e($n->name); ?></a>

                     </h1>

                  </div>

               </div>

            </div>

         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

         <?php endif; ?>



            

         </div>

      </div>

   </div>

</div>

<div class="container">
   <div class="row m-0">
      <div class="col-12 text-center title-page">
         <h2>Trending Products</h2>
      </div>
   </div>
</div>

<div class="container">

   <div class="px-2 py-4 p-md-4">

      <div class="caorusel-box">

         <div class="slick-carousel" data-slick-items="5" data-slick-xl-items="4" data-slick-lg-items="3"  data-slick-md-items="3" data-slick-sm-items="2" data-slick-xs-items="1">

         <?php if($trending): ?>

         <?php $__currentLoopData = $trending; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

         <?php $key = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $n->name)) ?>
       
         <div class="item deal-day m-2">
            <div class="product-top">
               <div class="flash">
                  <span class="onnew">
                     <span class="text">
                        new
                     </span>
                  </span>
               </div>
            </div>

            <a href="<?php echo URL::to('details/'.$n->id.'/'.$key); ?>" class="d-block">

               <img src="<?php echo e(asset('books/'.$n->image)); ?>" width="100%">

            </a>

            <div class="product-info text-center">
               <h5 class="product-name">
                  <a href="<?php echo URL::to('details/'.$n->id.'/'.$key); ?>" tabindex="0"><?php echo e($n->name); ?></a>
               </h5>
               <div class="group-info">
                  <div class="stars-rating">
                     <div class="star-rating">
                        <span class="star-3"></span>
                     </div>
                     <div class="count-star star-rating star-rating-sm">
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
            <!--<div class="hover-like">
               <div class="quick-cart bg-lightblue">
                  <i class="ti-heart"></i>
               </div>
               <
               <div class="quick-cart bg-lightyellow">
                  <i div class="quick-cart">
                  <i class="ti-search"></i>
               </div>class="ti-shopping-cart"></i>
               </div>
            </div>-->
         </div>

            <div class="product-card-2 card card-product m-2 shop-cards shop-tech d-none">

               <div class="card-body p-0">

                  <div class="card-image">

                     <a href="<?php echo URL::to('details/'.$n->id.'/'.$key); ?>" class="d-block">

                     <img src="<?php echo e(asset('books/'.$n->image)); ?>" width="100%">

                     </a>

                  </div>

                  <div class="p-3">

                     <div class="price-box">

                        <del class="old-product-price strong-400"><span>₹</span> <?php echo e($n->inprice); ?></del>

                        <span class="product-price strong-600"><span>₹</span> <?php echo e($n->inoffered_price); ?></span>

                     </div>

                     <div class="star-rating star-rating-sm mt-1">

                        <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>

                     </div>

                     <h1 class="product-title p-0 text-truncate-2">

                        <a href="<?php echo URL::to('details/'.$n->id.'/'.$key); ?>"><?php echo e($n->name); ?></a>

                     </h1>

                  </div>

               </div>

            </div>

         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

         <?php endif; ?>

         </div>

      </div>

   </div>

</div>

</section>

<section class="mb-4">

<div class="container">
	<div class="row m-0">
		<div class="col-12 text-center title-page">
			<h2>LIGHTS TRENDING</h2>
		</div>
	</div>
</div>

<div class="container">

   <div class="px-2 py-4 p-md-4">

      <div class="section-title-1 clearfix d-none">

         <h3 class="heading-5 strong-700 mb-0 float-left">

            <span class="mr-4">WOMEN TRENDING</span>

         </h3>

         <ul class="inline-links float-right nav d-none d-lg-inline-block">

            <!--<li class="active">

            <!--    <a href="#subsubcat-20" data-toggle="tab" class="d-block active">ABAYAS &amp; JILBABS</a>-->

            <!--</li>-->

         </ul>

      </div>

      <div class="tab-content">

         <div class="tab-pane fade show active " id="subsubcat-20">

            <div class="row gutters-5 sm-no-gutters">

               <?php if($womentrending): ?>

               <?php $__currentLoopData = $womentrending; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php $key = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $n->name)) ?>
				<div class="col-xl-3 col-lg-3 col-md-3 col-12 mb-1">
					<div class="item deal-day">
						<div class="product-top">
							<div class="flash">
								<span class="onnew">
									<span class="text">
										new
									</span>
								</span>
							</div>
						</div>

						<a href="<?php echo URL::to('details/'.$n->id.'/'.$key); ?>" class="d-block product-image">

							<img src="<?php echo e(asset('books/'.$n->image)); ?>" width="100%">

						</a>

						<div class="product-info text-center">
							<h5 class="product-name">
								<a href="<?php echo URL::to('details/'.$n->id.'/'.$key); ?>" tabindex="0"><?php echo e($n->name); ?></a>
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
							<a href="<?php echo e(route('site.add.compare',$n->id)); ?>" title="Add to Compare" onclick="addToCompare(306)" tabindex="0">
							<div class="quick-cart">
								<i class="ti-reload"></i>
							</div>
							</a>
							<a htitle="Quick view" href="<?php echo URL::to('details/'.$n->id.'/'.$key); ?>" tabindex="0">
							<div class="quick-cart bg-lightyellow">
								<i class="ti-eye"></i>
							</div>
							</a>
						</div>
					</div>
				</div><!--women-trand-->
				
               <div class="col-xl-4 col-lg-6 col-md-6 col-12 d-none">

                  <div class="product-box-2 bg-white alt-box my-2">

                     <div class="position-relative overflow-hidden">

                        <a href="<?php echo URL::to('details/'.$n->id.'/'.$key); ?>" class="d-block product-image h-100">

                        <img src="<?php echo e(asset('books/'.$n->image)); ?>" width="100%">

                        </a>

                        <div class="product-btns clearfix">

                           <a class="btn add-wishlist" title="Add to Wishlist" href="<?php echo e(route('site.addwistlist',$n->id)); ?>" tabindex="0">

                           <i class="fa fa-heart-o"></i>

                           </a>

                           

                            <a href="<?php echo e(route('site.add.compare',$n->id)); ?>" class="btn add-compare" title="Add to Compare" onclick="addToCompare(306)" tabindex="0">

                           <i class="fa fa-refresh"></i>

                           </a>

                           

                           <a class="btn quick-view" title="Quick view" href="<?php echo URL::to('details/'.$n->id.'/'.$key); ?>" tabindex="0">

                           <i class="fa fa-eye"></i>

                           </a>

                        </div>

                     </div>

                     <div class="p-3 border-top">

                        <h2 class="product-title p-0 text-truncate">

                           <a href="<?php echo URL::to('details/'.$n->id.'/'.$key); ?>" tabindex="0"><?php echo e($n->name); ?></a>

                        </h2>

                        <div class="star-rating mb-1">

                           <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>

                        </div>

                        <div class="clearfix">

                           <div class="price-box float-left">

                              <del class="old-product-price strong-400"><span>₹</span> <?php echo e($n->inprice); ?></del>

                              <span class="product-price strong-600"><span>₹</span> <?php echo e($n->inoffered_price); ?></span>

                           </div>

                        </div>

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

<section class="mb-4">
<div class="container">
	<div class="row m-0">
		<div class="col-12 text-center title-page">
			<h2>FANS TRENDING</h2>
		</div>
	</div>
</div>
<div class="container">

   <div class="px-2 py-4 p-md-4">

      <div class="tab-content">

         <div class="tab-pane fade show active" id="subsubcat-21">

            <div class="row gutters-5 sm-no-gutters">

              <?php if($mentrending): ?>

              <?php $__currentLoopData = $mentrending; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

              <?php $key = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $n->name)) ?>
			  
			  <div class="col-xl-3 col-lg-3 col-md-3 col-12 mb-1">
				<div class="item deal-day">
					<div class="product-top">
						<div class="flash">
							<span class="onnew">
								<span class="text">
									new
								</span>
							</span>
						</div>
					</div>

					<a href="<?php echo URL::to('details/'.$n->id.'/'.$key); ?>" class="d-block product-image h-100">

						<img src="<?php echo e(asset('books/'.$n->image)); ?>" width="100%">

					</a>

					<div class="product-info text-center">
						<h5 class="product-name">
							<a href="<?php echo URL::to('details/'.$n->id.'/'.$key); ?>" tabindex="0"><?php echo e($n->name); ?></a>
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
			  

               <div class="col-xl-4 col-lg-6 col-md-6 col-12 d-none">

                  <div class="product-box-2 bg-white alt-box my-2">

                     <div class="position-relative overflow-hidden">

                        <a href="<?php echo URL::to('details/'.$n->id.'/'.$key); ?>" class="d-block product-image h-100">

                        <img src="<?php echo e(asset('books/'.$n->image)); ?>" width="100%">

                        </a>

                        <div class="product-btns clearfix">

                           <a class="btn add-wishlist" title="Add to Wishlist" href="<?php echo e(route('site.addwistlist',$n->id)); ?>" tabindex="0">

                           <i class="fa fa-heart-o"></i>

                           </a>

                           

                           <a href="<?php echo e(route('site.add.compare',$n->id)); ?>" class="btn add-compare" title="Add to Compare" tabindex="0">

                           <i class="fa fa-refresh"></i>

                           </a>

 

                           <a class="btn quick-view" title="Quick view" href="<?php echo URL::to('details/'.$n->id.'/'.$key); ?>" tabindex="0">

                           <i class="fa fa-eye"></i>

                           </a>

                        </div>

                     </div>

                     <div class="p-3 border-top">

                        <h2 class="product-title p-0 text-truncate">

                           <a href="<?php echo URL::to('details/'.$n->id.'/'.$key); ?>" tabindex="0"><?php echo e($n->name); ?></a>

                        </h2>

                        <div class="star-rating mb-1">

                           <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>

                        </div>

                        <div class="clearfix">

                           <div class="price-box float-left">

                              <del class="old-product-price strong-400"><span>₹</span> <?php echo e($n->inprice); ?></del>

                              <span class="product-price strong-600"><span>₹</span> <?php echo e($n->inoffered_price); ?></span>

                           </div>

                        </div>

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

<!--<section class="mb-4">

<div class="container">

   <div class="px-2 py-4 p-md-4 bg-white shadow-sm">

      <div class="section-title-1 clearfix">

         <h3 class="heading-5 strong-700 mb-0 float-left">

            <span class="mr-4">Reviews</span>

         </h3>

      </div>

      <div class="caorusel-box">

         <div class="slick-carousel" data-slick-items="4" data-slick-xl-items="4" data-slick-lg-items="4"  data-slick-md-items="2" data-slick-sm-items="1" data-slick-xs-items="1">



           <?php if($ProductReview): ?>

           <?php $__currentLoopData = $ProductReview; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="product-card-2 card card-product m-2 shop-cards shop-tech">

               <div class="card-body p-3" style="text-align:center">

                  <div class="card-image">

                     <img src="<?php echo e(asset('frontend/img/review/new-google-favicon-512.png')); ?>" style="float:right" height="30px">  

                  </div>

                  <div class="card-image pt-5">

                     <a href="#" class="d-d-block product-image h-100" tabindex="0">

                     <img src="<?php echo e(asset('frontend/img/review/icon%20male.png')); ?>" style="margin:auto; border-radius:50%" height="60px"> 

                     </a>

                  </div>

                  <div class="p-3">

                     <div class="price-box">

                        <span class="product-price strong-600"><?php echo e(empty($n->user->name) ? '' :$n->user->name); ?></span>

                     </div>

                     <div class="star-rating star-rating-sm mt-1 clr">

                        <?php for ($i=0; $i < $n->rating; $i++): ?>

                           <i class="fa fa-star"></i>

                        <?php endfor ?>

                        

                     </div>

                     <h1 class="product-title p-0 text-truncate-2" style="height:210px;font-size:15px">

                        <?php echo $n->review; ?>


                     </h1>

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

</section>-->

<!--<section class="">

<div class="container">

<div class="py-4 p-md-4 bg-white shadow-sm">

   <div class="section-title-1 clearfix">

      <h3 class="heading-5 strong-700 mb-0 float-left">

         <span class="mr-4">Social Timeline</span>

      </h3>

   </div>

   <div class="row">

      <div class="col-md-6">

         <div id="fb-root"></div>

         <script async defer crossorigin="anonymous" src=""></script>

         <div class="fb-page" data-href="" data-tabs="timeline,events" data-width="500" data-height="500" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">

            <blockquote cite="https://www.facebook.com/mashroostore/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/mashroostore/">Mashroo Store - Thobes and Abayas</a></blockquote>

         </div>

      </div>

      <div class="col-md-6">

         <a class="twitter-timeline" data-width="400" data-height="500" href="h">Tweets by mashroostore</a> <script async src="" charset="utf-8"></script> 

      </div>

   </div>

</div>

</div>

</section>-->
<!--<div id="id01" class="w3-modal hideee">-->
<!--   <span onclick="document.getElementById('id01').style.display='none'"><i class="fa fa-times" aria-hidden="true"></i></span>-->
<!--   <div class="owl-carousel owl-theme pur">-->
<!--      <div class="item">-->
<!--         <p>Some bought a black Twill Emrati from Kolkata</p>-->
<!--      </div>-->
<!--      <div class="item">-->
<!--         <p>rahul bought a black Twill Emrati from Kolkata</p>-->
<!--      </div>-->
<!--      <div class="item">-->
<!--         <p>sayali bought a black Twill Emrati from Kolkata</p>-->
<!--      </div>-->
     
<!--   </div>-->
<!--</div>-->

<?php echo $__env->make('site.partials.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('site.partials.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kaboi2pm1r04/public_html/utkarshelectricals.in/resources/views/site/home/index.blade.php ENDPATH**/ ?>