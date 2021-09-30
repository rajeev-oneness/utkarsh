<!DOCTYPE html>
<html>
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Forgot Password - <?php echo e(config('app.name')); ?></title>
      <!-- Fonts -->
      <link href="<?php echo e(asset('frontend/css/bootstrap.min.css')); ?>" rel="stylesheet">
      <!--Font Awesome [ OPTIONAL ]-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link href="<?php echo e(asset('frontend/css/style.css')); ?>" rel="stylesheet">
   </head>
   
   <body>
      <div  class="reset">
         <div class="cls-content">
            <div class="container">
               <div class="row">
                  <div class="col-md-8 col-md-offset-2 off">
                     <div class="panel">
                        <div class="panel-body">
                           <div class="cls-content-sm panel">
                              <?php if(session('status')): ?>
                                <div class="alert alert-success">
                                    <?php echo e(session('status')); ?>

                                </div>
                              <?php endif; ?>
                              <div class="panel-body">
                                 <h1 class="h3">Reset Password</h1>
                                 <p class="pad-btm">Enter your email address to recover your password. </p>
                                 <form method="post" action="<?php echo e(route('password.email')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                       <input id="email" type="email" class="form-control" name="email" placeholder="Email address" autofocus value="<?php echo e(old('email')); ?>" required>
                                       <?php if($errors->has('email')): ?>
                                          <span class="help-block">
                                             <strong><?php echo e($errors->first('email')); ?></strong>
                                          </span>
                                       <?php endif; ?>
                                    </div>
                                    
                                    <div class="form-group text-right">
                                       <button class="btn btn-danger btn-lg btn-block" type="submit">
                                       Send Password Reset Link
                                       </button>
                                    </div>
                                 </form>
                                 <div class="pad-top">
                                    <a href="<?php echo e(route('site.login')); ?>" class="back">Back to Login</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--JAVASCRIPT-->
      <!--=================================================-->
      <!--jQuery [ REQUIRED ]-->
      <script src="<?php echo e(asset('frontend/js/popper.min.js')); ?>"></script>
      <script src="<?php echo e(asset('frontend/js/bootstrap.min.js')); ?>"></script>
      <!-- Plugins: Sorted A-Z -->
      <script src="<?php echo e(asset('frontend/js/jquery.countdown.min.js')); ?>"></script>
      <script src="<?php echo e(asset('frontend/js/select2.min.js')); ?>"></script>
      <script src="<?php echo e(asset('frontend/js/nouislider.min.js')); ?>"></script>
      <script src="<?php echo e(asset('frontend/js/sweetalert2.min.js')); ?>"></script>
      <script src="<?php echo e(asset('frontend/js/slick.min.js')); ?>"></script>
      <script src="<?php echo e(asset('frontend/js/jquery.share.js')); ?>"></script>
      <script src="<?php echo e(asset('frontend/js/bootstrap-tagsinput.min.js')); ?>"></script>
      <script src="<?php echo e(asset('frontend/js/jodit.min.js')); ?>"></script>
      <script src="<?php echo e(asset('frontend/js/xzoom.min.js')); ?>"></script>
      <!-- App JS -->
      <script src="<?php echo e(asset('frontend/js/main.js')); ?>"></script>
   </body>
</html>
<?php /**PATH /home1/demo9tbi/utkarshelectricals.in/resources/views/site/auth/passwords/email.blade.php ENDPATH**/ ?>