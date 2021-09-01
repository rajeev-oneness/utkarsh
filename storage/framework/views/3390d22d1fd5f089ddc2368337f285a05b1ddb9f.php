<?php $__env->startSection('title'); ?> <?php echo e($pageTitle); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php $__env->startPush('styles'); ?>
<style type="text/css">

   .is-invalid {
      color: red;	  font-size: 11px;	font-weight: 500;
   }

   .is-invalid {
      border-color: red;
   }
</style>
<?php $__env->stopPush(); ?>
<section class="bg-light py-5">
<div class="profile">
   <div class="container">
      <div class="row justify-content-center m-0">
         <div class="col-xl-4">
            <div class="card shadow-lg border-0">
               <div class="text-center px-35 pt-4 pb-4">
                  <h3 class="heading heading-4 strong-500">
                     Account Login
                  </h3>
               </div>
               <div class="px-4 py-3 py-lg-4">
                  <div class="row align-items-center">					
                  <!--<div class="col-12 col-sm-6 left-pic text-center">						 
                    <img src="<?php echo e(asset('frontend/img/undraw_Login_re_4vu2.png')); ?>" class="img-fluid" alt="">                    
                    </div>					
                    <div class="col-lg-1 text-center align-self-stretch">                        
                        <div class="border-right h-100 mx-auto" style="width:1px;"></div>                     
                    </div>  -->                   					
                     <div class="col-12 col-lg">
                        <form class="form-default" role="form" action="<?php echo e(route('site.login.save')); ?>" method="POST">
                           <?php echo csrf_field(); ?>                                           
                           <div class="row">
                              <div class="col-12">
                                 <div class="form-group">
                                    <!-- <label>email</label> -->
                                    <div class="input-group input-group--style-1">
                                       <input type="email" class="form-control form-control-sm <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Email" name="email" id="email" value="<?php echo e(old('email')); ?>">
                                       <span class="input-group-addon">
                                       <i class="text-md fa fa-user"></i>
                                       </span>
                                    </div>
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="is-invalid"> <?php echo e($message); ?> </div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-12">
                                 <div class="form-group">
                                    <!-- <label>password</label> -->
                                    <div class="input-group input-group--style-1">
                                       <input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Password" name="password" id="password">
                                       <span class="input-group-addon">
                                       <i class="text-md fa fa-lock"></i>
                                       </span>
                                    </div>
                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="is-invalid"> <?php echo e($message); ?> </div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-6">
                                 <div class="form-group">
                                    <div class="checkbox pad-btm text-left">
                                       <input id="demo-form-checkbox" class="magic-checkbox" type="checkbox" name="remember" id="remember" >
                                       <label for="demo-form-checkbox" class="text-sm">
                                       Remember Me
                                       </label>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-6 text-right">
                                 <a href="<?php echo e(route('password.request')); ?>" class="link link-xs link--style-3" style="vertical-align: top;">Forgot password?</a>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col text-center">
                                 <button type="submit" class="btn btn-styled btn-base-1 btn-md w-100">Login</button>
                              </div>
                           </div>
                        </form>
                     </div>
                     
                  </div>
               </div>
               <div class="text-center px-35 pb-3">
                  <p class="text-md">
                     Need an account? <a href="<?php echo e(route('site.registration')); ?>" class="strong-600">Register Now</a>
                  </p>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site.partials.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/demo9tbi/utkarshelectricals.in/resources/views/site/auth/login.blade.php ENDPATH**/ ?>