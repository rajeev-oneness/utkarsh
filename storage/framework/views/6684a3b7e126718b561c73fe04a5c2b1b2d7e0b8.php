<?php $__env->startSection('title'); ?> <?php echo e($pageTitle); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php $__env->startPush('styles'); ?>
<style type="text/css">
      .is-invalid {
         color: red;
      }
      .is-invalid {
         border-color: red;
      }
</style>
<?php $__env->stopPush(); ?>
<section class="gry-bg py-4">
<div class="profile">
   <div class="container">
      <div class="row">
         <div class="col-xl-10 offset-xl-1">
            <div class="card">
               <div class="text-center px-35 pt-5">
                  <h3 class="heading heading-4 strong-500">
                     Create an account.
                  </h3>
               </div>
               <div class="px-5 py-3 py-lg-5">
                  <div class="row align-items-center">					<div class="col-12 col-lg left-pic text-center">						 <img src="<?php echo e(asset('frontend/img/login-bg.png')); ?>" alt="">                    </div>					<div class="col-lg-1 text-center align-self-stretch">                        <div class="border-right h-100 mx-auto" style="width:1px;"></div>                     </div>
                     <div class="col-12 col-lg">
                        <form class="form-default" role="form" action="<?php echo e(route('site.registration.save')); ?>" method="POST">
                           <?php echo csrf_field(); ?>                                           
                           <div class="row">
                              <div class="col-12">
                                 <div class="form-group">
                                    <!-- <label>name</label> -->
                                    <div class="input-group input-group--style-1">
                                       <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="" placeholder="Name" name="name" value="<?php echo e(old('name')); ?>">
                                       <span class="input-group-addon">
                                       <i class="text-md fa fa-user"></i>
                                       </span>
                                    </div>
                                       <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                       <div class="is-invalid"> <?php echo e($message); ?> </div>
                                       <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-12">
                                 <div class="form-group">
                                    <!-- <label>email</label> -->
                                    <div class="input-group input-group--style-1">
                                       <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="" placeholder="Email" name="email" value="<?php echo e(old('email')); ?>">
                                       <span class="input-group-addon">
                                       <i class="text-md fa fa-envelope"></i>
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
unset($__errorArgs, $__bag); ?>" placeholder="Password" name="password">
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
                              <div class="col-12">
                                 <div class="form-group">
                                    <!-- <label>confirm_password</label> -->
                                    <div class="input-group input-group--style-1">
                                       <input type="password" class="form-control <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Confirm Password" name="password_confirmation">
                                       <span class="input-group-addon">
                                       <i class="text-md fa fa-lock"></i>
                                       </span>
                                    </div>
                                       <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="is-invalid"> <?php echo e($message); ?> </div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-12">
                                 <div class="form-group">
                                    <div class="g-recaptcha" data-sitekey="">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-12">
                                 <div class="checkbox pad-btm text-left">
                                    <input class="magic-checkbox" type="checkbox" name="checkbox_example_1" id="checkboxExample_1a" required>
                                    <label for="checkboxExample_1a" class="text-sm">By signing up you agree to our terms and conditions.</label>
                                 </div>
                              </div>
                           </div>
                           <div class="row align-items-center">
                              <div class="col-12 text-right  mt-3">
                                 <button type="submit" class="btn btn-styled btn-base-1 w-100 btn-md">Create Account</button>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
               <div class="text-center px-35 pb-3">
                  <p class="text-md">
                     Already have an account?<a href="<?php echo e(route('site.login')); ?>" class="strong-600">Log In</a>
                  </p>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site.partials.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demo9dtx/public_html/dev/dazzle/resources/views/site/auth/registration.blade.php ENDPATH**/ ?>