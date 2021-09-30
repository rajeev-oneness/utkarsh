<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title><?php echo $__env->yieldContent('title'); ?> - <?php echo e(config('app.name')); ?></title>
      <!-- Fonts -->
      <link type="text/css" href="<?php echo e(asset('frontend/css/style1.css')); ?>" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
      <!-- Bootstrap -->
      <link rel="stylesheet" href="<?php echo e(asset('frontend/css/bootstrap.min.css')); ?>" type="text/css">
      <!-- Icons -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
      <link type="text/css" href="<?php echo e(asset('frontend/css/bootstrap-tagsinput.css')); ?>" rel="stylesheet">
      <link type="text/css" href="<?php echo e(asset('frontend/css/jodit.min.css')); ?>" rel="stylesheet">
      <!--<link type="text/css" href="<?php echo e(asset('frontend/css/sweetalert2.min.css')); ?>" rel="stylesheet">-->
      <link type="text/css" href="<?php echo e(asset('frontend/css/slick.css')); ?>" rel="stylesheet">
      <link type="text/css" href="<?php echo e(asset('frontend/css/xzoom.css')); ?>" rel="stylesheet">
      <link type="text/css" href="<?php echo e(asset('frontend/css/jquery.share.css')); ?>" rel="stylesheet">
      <!-- Global style (main) -->
      <link type="text/css" href="<?php echo e(asset('frontend/css/active-shop.css')); ?>" rel="stylesheet" media="screen">
      <!--Spectrum Stylesheet [ REQUIRED ]-->
      <link href="<?php echo e(asset('frontend/css/spectrum.css')); ?>" rel="stylesheet">
      <link href="<?php echo e(asset('frontend/css/style.css')); ?>" rel="stylesheet">
      <!-- Custom style -->
      <link  href="<?php echo e(asset('frontend/css/custom-style.css')); ?>" type="text/css" rel="stylesheet">
	  <link  href="<?php echo e(asset('frontend/css/themify-icons.css')); ?>" type="text/css" rel="stylesheet">
	  <link  href="<?php echo e(asset('frontend/css/owl.carousel.min.css')); ?>" type="text/css" rel="stylesheet">
	  <link  href="<?php echo e(asset('frontend/css/owl.theme.default.min.css')); ?>" type="text/css" rel="stylesheet">
	  <link  href="<?php echo e(asset('frontend/css/style_new.css')); ?>" type="text/css" rel="stylesheet">
	  
      <!-- color theme -->
      <link href="<?php echo e(asset('frontend/css/default.css')); ?>" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
      <?php echo $__env->yieldPushContent('styles'); ?>
      <!-- jQuery -->
      <script src="<?php echo e(asset('frontend/js/jquery.min.js')); ?>"></script>
      <!-- Global site tag (gtag.js) - Google Analytics -->
      <link  href="<?php echo e(asset('frontend/css/nav.css')); ?>" type="text/css" rel="stylesheet">

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>
   </head>
   <body>
		
	<!-- Login-Modal -->
		<div class="modal fade" id="login" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg loginmodal">
			<div class="modal-content">
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				<div class="modal-body row m-0 p-0">
					<div class="col-md-4 d-none d-md-block left-model">
						<h4>Login</h4>
						<p>Get access to your Orders, Wishlist and Recommendations</p>
					</div>
					<div class="col-12 col-md-8 right-model">
						<form>
							<div class="mb-3">
							  <label for="exampleInputEmail1" class="form-label">Email</label>
							  <input type="email" class="form-control" placeholder="Your Email" id="exampleInputEmail1" aria-describedby="emailHelp">
							</div>
							<div class="mb-2">
							  <label for="exampleInputPassword1" class="form-label">Password</label>
							  <input type="password" class="form-control" placeholder="password" id="exampleInputPassword1">
							</div>
							<div class="mb-3 row m-0 align-content-end">
								<a href="" class="text-right"><b>Forgot?</b></a>
							</div>
							<p>
								By continuing, you agree to <a href=""> Terms of Use</a> and <a href="">Privacy Policy</a>.
							</p>
							<button type="submit" class="btn btn-primary">Submit</button>
						</form>
						<div class="text-center row m-0 mt-5">
							<a href="" class="text-blue"><h6>New to Brand Name? Create an account</h6></a>
						</div>
					</div>
				</div>
			</div>
			</div>
		</div><!--End-Login-Modal-->
   
      <!-- MAIN WRAPPER -->
      <div class="body-wrap shop-default shop-cards shop-tech gry-bg ">
	  
		<!--Header-->
		<header>
			<div class="uper-header">
				<div class="container">
					<div class="row m-0 justify-content-between">
						<div class="col-12 col-md-6 p-0">
							<div class="d-none d-md-block header-message">
								Welcome to our online store!
							</div>
						</div>
						<div class="col-12 col-md-3 ml-auto justify-content-end top-bar-right p-0">
							<ul>
								<li>
									<select class="form-select form-select-sm upheader-select" aria-label=".form-select-sm example">
										<option selected>English</option>
										<option value="1">French</option>
										<option value="2">Japanese</option>
									</select>
								</li>
								 <?php if(Auth::guard('users')->check()): ?>
								<li><a href="<?php echo URL::to('profile'); ?>">Welcome, <?php echo e(Auth::guard('users')->user()->name); ?></a></li>
								<?php else: ?>
								<li><a href="<?php echo URL::to('site-login'); ?>">Login</a></li>
								<?php endif; ?>
							</ul>	
						</div>
					</div>
				</div>
			</div><!--uper-header-->
			<div class="middle-header pt-4 pb-4">
				<div class="container">
					<div class="row">
						<div class="col-6 col-md-2"><h4 class="navbar-brand"><a href="<?php echo URL::to('/'); ?>">Brand</a></h4></div>
						<div class="col-6 col-md-4 offset-0 offset-md-2">
							<form class="d-flex position-relative searchinput">
								<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
								<button class="search-icon" type="submit"><i class="ti-search"></i></button>
							</form>
						</div>
						<div class="col-6 col-md-2 offset-0 offset-md-2">
							<div class="moorabi-socials">
								<ul class="socials" style="float: right;">
									<li>
										<a href="<?php echo URL::to('view-cart'); ?>" class="social-item position-relative">
											<i class="icon ti-shopping-cart"></i>
											<div class="cart-count">
											<?php 
                                           $cartProducts = App\Models\Cart::where('mac',Request::ip())->get();
                                           ?> 
                                           <?php echo e(count($cartProducts)); ?>

											</div>
										</a>
									</li>
									<li>
										<a href="<?php echo URL::to('profile'); ?>" class="social-item">
											<i class="icon ti-user"></i>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="header-nav-container">
				<nav id='cssmenu' class="d-none">
				   <!--<div class="logo"><a href=""><img src="http://demo91.co.in/dev/Mashroo/public/frontend/img/logo.png" width="100%"></a></div>-->
				   <div id="head-mobile"></div>
				   <div class="button"></div>
				   <ul>
					  <li>
						 <a href='#'>women</a>
						 <ul>
							<li><a href="">Abayas</a></li>
						 </ul>
					  </li>
					  <li>
						 <a href='#'>men</a>
						 <ul>
							<li><a href="">Mens Thobes</a></li>
							<li><a href="">Mens Izaars</a></li>
							<li><a href="">Mens Pathani Suit</a></li>
						 </ul>
					  </li>
					  <li>
						 <a href='#'>GIRLS</a>
						 <ul>
							<li><a href="">Girls Abayas</a></li>
						 </ul>
					  </li>
					  <li>
						 <a href='#'>Hijabs</a>
						 <ul>
							<li><a href="">Hijabs</a></li>
						 </ul>
					  </li>
					  <li>
						 <a href='#'>PRODUCT OF THE WEEK</a>
						 <ul>
							<li><a href="">Abayas</a></li>
						 </ul>
					  </li>
					  <li>
						 <a href='#'>boys</a>
						 <ul>
							<li><a href="">Boys Pathani Suits</a></li>
							<li><a href="">Boys Thobes</a></li>
							<li><a href="">Boys Izaars</a></li>
						 </ul>
					  </li>
					  <li>
						 <a href='#'>KIDS (Girls)</a>
						 <ul>
							<li><a href="">Kids Abayas</a></li>
						 </ul>
					  </li>
					  <li>
						 <a href='#'>KIDS (boys)</a>
						 <ul>
							<li><a href="">Kids Thobes</a></li>
							<li><a href="">Kids Pathani Suits</a></li>
							<li><a href="">Kids Izaars</a></li>
						 </ul>
					  </li>
					  <li><a href="">Sign In</a></li>
					  <li><a href="">Registration</a></li>
					  <div class="d-flex w-100">
							   <!-- <div class="search-box flex-grow-1 px-4">
								  <form action="<?php echo e(route('site.searchproducts')); ?>" method="">
									 <div class="d-flex position-relative">
										<div class="d-lg-none search-box-back">
										   <button class="" type="button"><i class="fa fa-long-arrow-left"></i></button>
										</div>
										<div class="w-100">
										   <input type="text" aria-label="Search" name="search_keyword" class="w-100" placeholder="I'm shopping for..." autocomplete="off">
										</div>
										<button class="d-none d-lg-block" type="submit">
										<i class="fa fa-search la-flip-horizontal"></i>
										</button>
										<div class="typed-search-box d-none">
										   <div class="search-preloader">
											  <div class="loader">
												 <div></div>
												 <div></div>
												 <div></div>
											  </div>
										   </div>
										   <div class="search-nothing d-none">
										   </div>
										   <div id="search-content">
										   </div>
										</div>
									 </div>
								  </form>
							   </div> -->
							   <div class="logo-bar-icons d-inline-block ml-auto">
								  <!-- <div class="d-inline-block d-lg-none">
									 <div class="nav-search-box">
										<a href="#" class="nav-box-link">
										<i class="fa fa-search la-flip-horizontal d-inline-block nav-box-icon"></i>
										</a>
									 </div>
								  </div> -->
								  <div class="d-inline-block">
									 <div class="nav-cart-box" id="wishlist" title="wishlist">
										<?php if(!Auth::guard('users')->check()): ?>
										<a href="<?php echo e(route('site.login')); ?>" class="nav-box-link" target="_blank">
										<?php else: ?>
										<a href="<?php echo e(route('site.profile')); ?>" class="nav-box-link" target="_blank">
										<?php endif; ?>   
										<i class="fa fa-user d-inline-block nav-box-icon"></i>
										</a>
									 </div>
								  </div>
								  <div class="d-inline-block">
									 <div class="nav-compare-box" id="compare">
										<a href="<?php echo e(route('site.compare')); ?>" class="nav-box-link">
										   <i class="fa fa-refresh d-inline-block nav-box-icon"></i>
										   <!--<span class="nav-box-text d-none d-xl-inline-block">Compare</span>-->
										   <?php 
										   $compareProducts = App\Models\Compare::where('mac',Request::ip())->get();
										   ?> 
										   <span class="nav-box-number"><?php echo e(count($compareProducts)); ?></span>
										</a>
									 </div>
								  </div>
								  <div class="d-inline-block">
									 <div class="nav-wishlist-box" id="wishlist">
										<a href="<?php echo e(route('site.wishlist')); ?>" class="nav-box-link">
										   <i class="fa fa-heart-o d-inline-block nav-box-icon"></i>
										   <!--<span class="nav-box-text d-none d-xl-inline-block">Wishlist</span>-->
										   <?php if(Auth::guard('users')->check()): ?>
										   <?php 
										   $wishlistProducts = App\Models\Wishlist::where('user_id',Auth::guard('users')->user()->id)->get();
										   ?> 
										   <span class="nav-box-number"><?php echo e(count($wishlistProducts)); ?></span>
										   <?php else: ?>
										   <span class="nav-box-number">0</span>
										   <?php endif; ?> 
										</a>
									 </div>
								  </div>
								  <div class="d-inline-block" data-hover="dropdown">
									 <div class="nav-cart-box dropdown" id="cart_items">
										<a href="<?php echo e(route('site.viewcart')); ?>" class="nav-box-link">
										   <i class="fa fa-shopping-cart d-inline-block nav-box-icon"></i>
										   <!--<span class="nav-box-text d-none d-xl-inline-block">Cart</span>-->
										   <?php 
										   $cartProducts = App\Models\Cart::where('mac',Request::ip())->get();
										   ?> 
										   <span class="nav-box-number"><?php echo e(count($cartProducts)); ?></span>
										</a>
										<ul class="dropdown-menu dropdown-menu-right px-0">
										   <li>
											  <div class="dropdown-cart px-0">
												 <div class="dc-header">
													<h3 class="heading heading-6 strong-700">Your Cart is empty</h3>
												 </div>
											  </div>
										   </li>
										</ul>
									 </div>
								  </div>
								  <?php if($message = session()->has('success')): ?>
								  <div class="alert alert-success" role="alert">
									 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;</span>
									 </button>
									 <?php echo e(session()->get('success')); ?>

								  </div>
								  <?php endif; ?>
								  <?php if($message = session()->has('error')): ?>
								  <div class="alert alert-danger" role="alert">
									 <?php echo e(session()->get('error')); ?>

								  </div>
								  <?php endif; ?>
								  <div class="d-inline-block d-lg-none">
									 <div>
										<a href="https://wa.me/919892020933" class="float"><button class="open-button btnstyle" style=" border-radius:0 !important;" ><i class="fa fa-whatsapp call_wp_icon"  ></i></button></a>
									 </div>
								  </div>
								  <div class="d-inline-block d-lg-none">
									 <div >
										<a href="tel:+919892020933" class="nav-box-link"  >
										<i class="fa fa-phone d-inline-block nav-box-icon iconclr call_wp_icon"  ></i>
										</a>
									 </div>
								  </div>
							   </div>
							</div>
				   </ul>
				</nav>
			</div>
		</header>
		<!--End-Header-->
	  
      <!-- Header -->
	  <div class="header bg-white d-none">
         <!-- mobile menu -->
         <!-- <div class="mobile-side-menu d-lg-none">
            <div class="side-menu-overlay opacity-0"></div>
            <div class="side-menu-wrap opacity-0" onclick="sideMenuClose()">
               <div class="side-menu closed">
                  <div class="side-menu-header ">
                     <div class="side-menu-close" onclick="sideMenuClose()">
                        <i class="fa fa-close"></i>
                     </div>
                     <div class="widget-profile-box px-3 py-4 d-flex align-items-center">
                        <div class="image"> <img src="<?php echo e(asset('frontend/img/icon/user-placeholder.jpg')); ?>" width="100%"> </div>
                     </div>
                     <div class="side-login px-3 pb-3">
                        <a href="<?php echo e(route('site.login')); ?>">Sign In</a>
                        <a href="<?php echo e(route('site.registration')); ?>">Registration</a>
                     </div>
                  </div>
                  <?php 
                  $categories = App\Models\Category::where('is_active',1)->where('is_deleted',0)->get();
                  ?>
                  <div class="side-menu-list px-3">
                     <div class="sidebar-widget-title py-0">
                        <span>Categories</span>
                     </div>
                     <ul class="side-seller-menu">
                        <?php if($categories): ?>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $key = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $n->name)) ?>
                        <li >
                           <a href="<?php echo URL::to('product-list/'.$n->id.'/'.$key); ?>" class="text-truncate fill_content ">
                           <span><?php echo e($n->name); ?> </span>
                           </a>
                           
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        
                        
                     </ul>
                     <ul class="side-user-menu">
                        
                        <li>
                           <a href="<?php echo e(route('site.home')); ?>">
                           <span>Home</span>
                           </a>
                        </li>
                        <li>
                           <a href="<?php echo e(route('site.about')); ?>">
                           <span>About Us</span>
                           </a>
                        </li>
                      
                     </ul>
                  </div>
               </div>
            </div>
         </div> -->
         <nav id='cssmenu' class="d-none">
               <!--<div class="logo"><a href=""><img src="http://demo91.co.in/dev/Mashroo/public/frontend/img/logo.png" width="100%"></a></div>-->
               <div id="head-mobile"></div>
               <div class="button"></div>
               <ul>
                  <li>
                     <a href='#'>women</a>
                     <ul>
                        <li><a href="">Abayas</a></li>
                     </ul>
                  </li>
                  <li>
                     <a href='#'>men</a>
                     <ul>
                        <li><a href="">Mens Thobes</a></li>
                        <li><a href="">Mens Izaars</a></li>
                        <li><a href="">Mens Pathani Suit</a></li>
                     </ul>
                  </li>
                  <li>
                     <a href='#'>GIRLS</a>
                     <ul>
                        <li><a href="">Girls Abayas</a></li>
                     </ul>
                  </li>
                  <li>
                     <a href='#'>Hijabs</a>
                     <ul>
                        <li><a href="">Hijabs</a></li>
                     </ul>
                  </li>
                  <li>
                     <a href='#'>PRODUCT OF THE WEEK</a>
                     <ul>
                        <li><a href="">Abayas</a></li>
                     </ul>
                  </li>
                  <li>
                     <a href='#'>boys</a>
                     <ul>
                        <li><a href="">Boys Pathani Suits</a></li>
                        <li><a href="">Boys Thobes</a></li>
                        <li><a href="">Boys Izaars</a></li>
                     </ul>
                  </li>
                  <li>
                     <a href='#'>KIDS (Girls)</a>
                     <ul>
                        <li><a href="">Kids Abayas</a></li>
                     </ul>
                  </li>
                  <li>
                     <a href='#'>KIDS (boys)</a>
                     <ul>
                        <li><a href="">Kids Thobes</a></li>
                        <li><a href="">Kids Pathani Suits</a></li>
                        <li><a href="">Kids Izaars</a></li>
                     </ul>
                  </li>
                  <li><a href="">Sign In</a></li>
                  <li><a href="">Registration</a></li>
                  <div class="d-flex w-100">
                           <!-- <div class="search-box flex-grow-1 px-4">
                              <form action="<?php echo e(route('site.searchproducts')); ?>" method="">
                                 <div class="d-flex position-relative">
                                    <div class="d-lg-none search-box-back">
                                       <button class="" type="button"><i class="fa fa-long-arrow-left"></i></button>
                                    </div>
                                    <div class="w-100">
                                       <input type="text" aria-label="Search" name="search_keyword" class="w-100" placeholder="I'm shopping for..." autocomplete="off">
                                    </div>
                                    <button class="d-none d-lg-block" type="submit">
                                    <i class="fa fa-search la-flip-horizontal"></i>
                                    </button>
                                    <div class="typed-search-box d-none">
                                       <div class="search-preloader">
                                          <div class="loader">
                                             <div></div>
                                             <div></div>
                                             <div></div>
                                          </div>
                                       </div>
                                       <div class="search-nothing d-none">
                                       </div>
                                       <div id="search-content">
                                       </div>
                                    </div>
                                 </div>
                              </form>
                           </div> -->
                           <div class="logo-bar-icons d-inline-block ml-auto">
                              <!-- <div class="d-inline-block d-lg-none">
                                 <div class="nav-search-box">
                                    <a href="#" class="nav-box-link">
                                    <i class="fa fa-search la-flip-horizontal d-inline-block nav-box-icon"></i>
                                    </a>
                                 </div>
                              </div> -->
                              <div class="d-inline-block">
                                 <div class="nav-cart-box" id="wishlist" title="wishlist">
                                    <?php if(!Auth::guard('users')->check()): ?>
                                    <a href="<?php echo e(route('site.login')); ?>" class="nav-box-link" target="_blank">
                                    <?php else: ?>
                                    <a href="<?php echo e(route('site.profile')); ?>" class="nav-box-link" target="_blank">
                                    <?php endif; ?>   
                                    <i class="fa fa-user d-inline-block nav-box-icon"></i>
                                    </a>
                                 </div>
                              </div>
                              <div class="d-inline-block">
                                 <div class="nav-compare-box" id="compare">
                                    <a href="<?php echo e(route('site.compare')); ?>" class="nav-box-link">
                                       <i class="fa fa-refresh d-inline-block nav-box-icon"></i>
                                       <!--<span class="nav-box-text d-none d-xl-inline-block">Compare</span>-->
                                       <?php 
                                       $compareProducts = App\Models\Compare::where('mac',Request::ip())->get();
                                       ?> 
                                       <span class="nav-box-number"><?php echo e(count($compareProducts)); ?></span>
                                    </a>
                                 </div>
                              </div>
                              <div class="d-inline-block">
                                 <div class="nav-wishlist-box" id="wishlist">
                                    <a href="<?php echo e(route('site.wishlist')); ?>" class="nav-box-link">
                                       <i class="fa fa-heart-o d-inline-block nav-box-icon"></i>
                                       <!--<span class="nav-box-text d-none d-xl-inline-block">Wishlist</span>-->
                                       <?php if(Auth::guard('users')->check()): ?>
                                       <?php 
                                       $wishlistProducts = App\Models\Wishlist::where('user_id',Auth::guard('users')->user()->id)->get();
                                       ?> 
                                       <span class="nav-box-number"><?php echo e(count($wishlistProducts)); ?></span>
                                       <?php else: ?>
                                       <span class="nav-box-number">0</span>
                                       <?php endif; ?> 
                                    </a>
                                 </div>
                              </div>
                              <div class="d-inline-block" data-hover="dropdown">
                                 <div class="nav-cart-box dropdown" id="cart_items">
                                    <a href="<?php echo e(route('site.viewcart')); ?>" class="nav-box-link">
                                       <i class="fa fa-shopping-cart d-inline-block nav-box-icon"></i>
                                       <!--<span class="nav-box-text d-none d-xl-inline-block">Cart</span>-->
                                       <?php 
                                       $cartProducts = App\Models\Cart::where('mac',Request::ip())->get();
                                       ?> 
                                       <span class="nav-box-number"><?php echo e(count($cartProducts)); ?></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right px-0">
                                       <li>
                                          <div class="dropdown-cart px-0">
                                             <div class="dc-header">
                                                <h3 class="heading heading-6 strong-700">Your Cart is empty</h3>
                                             </div>
                                          </div>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                              <?php if($message = session()->has('success')): ?>
                              <div class="alert alert-success" role="alert">
                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                                 <?php echo e(session()->get('success')); ?>

                              </div>
                              <?php endif; ?>
                              <?php if($message = session()->has('error')): ?>
                              <div class="alert alert-danger" role="alert">
                                 <?php echo e(session()->get('error')); ?>

                              </div>
                              <?php endif; ?>
                              <div class="d-inline-block d-lg-none">
                                 <div>
                                    <a href="https://wa.me/919892020933" class="float"><button class="open-button btnstyle" style=" border-radius:0 !important;" ><i class="fa fa-whatsapp call_wp_icon"  ></i></button></a>
                                 </div>
                              </div>
                              <div class="d-inline-block d-lg-none">
                                 <div >
                                    <a href="tel:+919892020933" class="nav-box-link"  >
                                    <i class="fa fa-phone d-inline-block nav-box-icon iconclr call_wp_icon"  ></i>
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
               </ul>
            </nav>
         <!-- end mobile menu -->
         <div class="position-relative logo-bar-area">
            <div class="">
               <div class="container">
                  <div class="row no-gutters align-items-center">
                    
                     <div class="col-lg-12 col-12 position-static">
                        
                     </div>
                  </div>
               </div>
            </div>
            <?php 
            $categories = App\Models\Category::where('is_active',1)->where('is_deleted',0)->get();
            ?>               
            <div class="hover-category-menu" id="hover-category-menu">
               <div class="container">
                  <div class="row no-gutters position-relative">
                     <div class="col-lg-3 position-static">
                        <div class="category-sidebar" id="category-sidebar">
                           <div class="all-category">
                              <span>CATEGORIES</span>
                              <a href="#" class="d-inline-block">See All ></a>
                           </div>
                           <ul class="categories">
                              <?php if($categories): ?>
                              <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php $key = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $n->name)) ?>
                              <li class="list-li">
                                 <a href="<?php echo URL::to('product-list/'.$n->id.'/'.$key); ?>">
                                 <img class="cat-image" src="<?php echo e(asset('frontend/img/icon/1.png')); ?>" alt="<?php echo e($n->name); ?>" width="30">
                                 <span class="cat-name"><?php echo e($n->name); ?></span>
                                 </a>
                                 <?php if((!empty($n->level1)) && count($n->level1)): ?>
                                 <div class="sub-cat-menu c-scrollbar">
                                    <div class="sub-cat-main row no-gutters">
                                       <div class="col-9">
                                          <div class="sub-cat-content">
                                             <div class="sub-cat-list">
                                                <div class="card-columns">
                                                   <?php $__currentLoopData = $n->level1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                   <div class="card">
                                                      <ul class="sub-cat-items">
                                                         <li><a href="<?php echo URL::to('product-list/'.$n->id.'/'.$key.'?sub_category=' . $p->id); ?>"><?php echo e($p->name); ?></a></li>
                                                      </ul>
                                                   </div>
                                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                   
                                                </div>
                                             </div>
                                             <div class="sub-cat-featured">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-3">
                                          <div class="sub-cat-brand">
                                             <ul class="sub-brand-list">
                                                <!--<li class="sub-brand-item">
                                                   <a href="<?php echo e(route('site.home')); ?>" ><img src="<?php echo e(asset('frontend/img/logo.png')); ?>" alt="Mashroo" class="img-fluid"></a>
                                                </li>-->
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <?php endif; ?>
                              </li>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php endif; ?>
                              
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- Navbar -->
         <div class="main-nav-area d-none d-lg-block hidden" >
            <nav class="navbar navbar-expand-lg navbar--bold navbar--style-2 navbar-light bg-default" style="display:none !important">
               <div class="container">
                  <div class="collapse navbar-collapse align-items-center justify-content-center" id="navbar_main">
                     <!-- Navbar links -->
                     <ul class="navbar-nav">
                        <li class="nav-item">
                           <a class="nav-link" href="list.html">Kurta</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="list.html">FLOUNCE</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="list.html">New</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="list.html">SOIL BROWN DUAL DAFTS ABAYA</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="list.html">GALLANT</a>
                        </li>
                     </ul>
                  </div>
               </div>
            </nav>
         </div>
      </div>
      <section class="home-banner-area  banner">
         <div class="container1">
            <div class="row no-gutters position-relative">
               <div class="col-lg-12 position-static order-2 order-lg-0  mobdisp">
                  <!--<div class="col-lg-12 position-static order-2 order-lg-0">-->
                  <div class="category-sidebar">
                     <ul class="categories no-scrollbar">
                        <?php if($categories): ?>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $key = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $n->name)) ?>
                        <li>
                           <a href="<?php echo URL::to('product-list/'.$n->id.'/'.$key); ?>"><span class="cat-name"><?php echo e($n->name); ?></span></a>
                           <div class="sub-cat-menu c-scrollbar">
                              <div class="sub-cat-main row no-gutters">
                                 <?php if((!empty($n->level1)) && count($n->level1)): ?>
                                 <div class="col-9">
                                    <div class="sub-cat-content">
                                       <div class="sub-cat-list">
                                          <div class="card-columns">
                                             <?php $__currentLoopData = $n->level1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <div class="card">
                                                <ul class="sub-cat-items">
                                                   <li><a href="<?php echo URL::to('product-list/'.$n->id.'/'.$key.'?sub_category=' . $p->id); ?>"><?php echo e($p->name); ?></a></li>
                                                </ul>
                                             </div>
                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                             
                                          </div>
                                       </div>
                                       <div class="sub-cat-featured">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-3">
                                    <div class="sub-cat-brand">
                                       <ul class="sub-brand-list">
                                          <!--<li class="sub-brand-item">
                                             <a href="" ><img src="<?php echo e(asset('frontend/img/logo.png')); ?>" alt="Mashroo" class="img-fluid"></a>
                                          </li>-->
                                       </ul>
                                    </div>
                                 </div>
                                 <?php endif; ?>
                              </div>
                           </div>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        
                        <!--<li><a href="#"><span class="cat-name">BLOGS</span></a></li>
                           <li><a href="#"><span class="cat-name">WHOLESALE &amp; RETAIL</span></a></li>-->
                        <li><a href="<?php echo e(route('site.about')); ?>"><span class="cat-name">ABOUT US</span></a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <?php
         $errors = Session::get('error');
         
         $success = Session::get('success');
         
         ?>
         
         <?php if($success): ?>
         
         <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
         
         <script type="text/javascript">
         
         swal("Success!", "<?php echo e($success); ?>", "success")
         
         </script>
         
         <?php endif; ?>
         
         <?php if($errors): ?>
         
         <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
         
         <script type="text/javascript">
         
         swal("Error!", "<?php echo e($errors); ?>", "error")
         
         </script>
         
         <?php endif; ?>
      <!--<?php
         $errors = Session::get('error');
         
         $success = Session::get('success');
         
         ?>
         
         <?php if($success): ?>
         
         <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
         
         <script type="text/javascript">
         
         swal("Success!", "<?php echo e($success); ?>", "success")
         
         </script>
         
         <?php endif; ?>
         
         <?php if($errors): ?>
         
         <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
         
         <script type="text/javascript">
         
         swal("Error!", "<?php echo e($errors); ?>", "error")
         
         </script>
         
         <?php endif; ?>-->
<?php /**PATH /home/demo9dtx/public_html/dev/utkarsh/resources/views/site/partials/header.blade.php ENDPATH**/ ?>