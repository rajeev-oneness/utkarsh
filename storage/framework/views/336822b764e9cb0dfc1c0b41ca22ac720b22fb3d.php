<div class="col-lg-3 d-none d-lg-block">
   <div class="sidebar sidebar--style-3 no-border stickyfill p-0">
      <div class="widget mb-0">
         <div class="widget-profile-box text-center p-3">
            <div class="image"></div>
            <div class="name"><?php echo e(Auth::guard('users')->user()->name); ?> </div>
         </div>
         <div class="sidebar-widget-title py-3">
            <span>Menu</span>
         </div>
         <div class="widget-profile-menu py-3">
            <ul class="categories categories--style-3">
               <li>
                  <a href="" class="">
                  <i class="la la-dashboard"></i>
                  <span class="category-name">
                  Dashboard
                  </span>
                  </a>
               </li>
               <li>
                  <a href="<?php echo e(route('site.mybookings')); ?>" class="<?php if(Request::segment(1)=='my-bookings'): ?> <?php echo e("active"); ?> <?php endif; ?>">
                  <i class="la la-file-text"></i>
                  <span class="category-name">
                  Purchase History
                  </span>
                  </a>
               </li>
               <li>
                  <a href="<?php echo e(route('site.wishlist')); ?>" class="<?php if(Request::route()->getName()=='site.wishlist'): ?> <?php echo e("active"); ?> <?php endif; ?>">
                  <i class="la la-heart-o"></i>
                  <span class="category-name">
                  Wishlist
                  </span>
                  </a>
               </li>
               <li>
                  <a href="<?php echo e(route('site.profile')); ?>" class="<?php if(Request::route()->getName()=='site.profile'): ?> <?php echo e("active"); ?> <?php endif; ?>">
                  <i class="la la-user"></i>
                  <span class="category-name">
                  Manage Profile
                  </span>
                  </a>
               </li>
               <li>
                  <a href="<?php echo e(route('site.logout')); ?>" class="">
                  <i class="la la-support"></i>
                  <span class="category-name">
                  Logout
                  </span>
                  </a>
               </li>
            </ul>
         </div>
      </div>
   </div>
</div><?php /**PATH /home/demo9dtx/public_html/dev/dazzle/resources/views/site/auth/partials/profile.blade.php ENDPATH**/ ?>