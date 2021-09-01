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
	<?php
	$categories = App\Models\Category::where('is_deleted','0')->get();
	?>
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
		<header class="shadow-sm">
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
								<!--<li><a href="<?php echo URL::to('site-login'); ?>">Login</a></li>-->
								<?php endif; ?>
							</ul>	
						</div>
					</div>
				</div>
			</div><!--uper-header-->
			<div class="middle-header">
			    <div class="container">
					<div class="row m-0 justify-content-between">
					    <nav class="navbar navbar-expand-lg navbar-light col-12 p-0">
                             <a href="<?php echo URL::to('/'); ?>" class="navbar-brand mr-3 mr-md-5">
        					    <img src="<?php echo e(asset('frontend/img/front_logo.png')); ?>" width="160px">
        				    </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <!--<span class="navbar-toggler-icon"></span>-->
                                <i class="icon ti-menu"></i>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                  <?php if($categories): ?>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $key = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $n->name)) ?>
                                <li class="nav-item">
                                   <a class="nav-link" href="<?php echo URL::to('product-list/'.$n->id.'/'.$key); ?>"><?php echo e($n->name); ?></a>
                                   
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                
                                <li class="nav-item"><a class="nav-link" href="<?php echo e(route('site.about')); ?>">About Us</a></li>
                                </ul>
                                <span class="navbar-text desktop_view">
                                    <ul>
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
            							<li class="position-relitive">
            							    <div class="collapse position-absolute w-25 px-3" id="searchForm">
                                                <div class="d-flex shadow-sm align-items-center">
                                                    <input id="search" type="search" class="form-control form-control-lg bg-light border-0 flex-grow-1" placeholder="search" />
                                                    <a class="nav-link py-2 bg-light" 
                                                        href="#searchForm" 
                                                        data-target="#searchForm" 
                                                        data-toggle="collapse">
                                                        <i class="icon ti-close"></i>
                                                    </a>
                                                </div>
                                            </div>
            								<a href="#searchForm"  data-target="#searchForm" data-toggle="collapse" class="social-item">
            									<i class="icon ti-search"></i>
            								</a>
            							</li>
                                    </ul>
                                </span>
                            </div>
                        </nav>
                        <span class="navbar-text mobile_view">
                            <ul>
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
    							<li class="position-relitive resp_none">
    							    <div class="collapse position-absolute w-25 px-3" id="searchForm">
                                        <div class="d-flex shadow-sm align-items-center">
                                            <input id="search" type="search" class="form-control form-control-lg bg-light border-0 flex-grow-1" placeholder="search" />
                                            <a class="nav-link py-2 bg-dark" 
                                                href="#searchForm" 
                                                data-target="#searchForm" 
                                                data-toggle="collapse">
                                                <i class="icon ti-close"></i>
                                            </a>
                                        </div>
                                    </div>
    								<a href="#searchForm"  data-target="#searchForm" data-toggle="collapse" class="social-item">
    									<i class="icon ti-search"></i>
    								</a>
    							</li>
                            </ul>
                        </span>
					</div>
				</div>
			</div>
			
		</header>
		<!--End-Header-->
	  
      <!-- Header -->
	  
 
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
         
         
         <script>
            $('#searchForm').on('shown.bs.collapse', function () {
                // focus input on collapse
                $("#search").focus()
            })
            
            $('#searchForm').on('hidden.bs.collapse', function () {
                // focus input on collapse
                $("#search").blur()
            })
         </script>
      <?php /**PATH /Volumes/WorkArea/Oneness/utkarsh/resources/views/site/partials/header.blade.php ENDPATH**/ ?>