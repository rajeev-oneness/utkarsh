<footer class="pt-5 pb-3" id="contact">
	<div class="container">
		<div class="row m-0">
			<div class="col-md-3 col-12">
				<div class="footer-widget">
					<!--<a href="" class="d-block mb-3">
						<img src="<?php echo e(asset('frontend/img/logo.png')); ?>" alt="Mashroo Store" class="" height="44">
                     </a>-->
					 <h4 class="widget-title">BRAND NAME</h4>
					<div class="footer-add">
						<p>
							<b>Brand name</b> is an acclaimed online shopping store supplying designer Thobes for men and boys and Designer Abayas for girls and women making Modest wear Accessible all over the world.
						</p>
					</div>
				</div>
			</div>
			<div class="col-md-2 col-6 p-0 pl-md-5 offset-0 offset-md-1">
				<div class="footer-widget">
					<h4 class="widget-title">My Account</h4>
					<ul class="footer-menu">
						<li><a href="<?php echo e(route('site.login')); ?>" title="Login">Login</a></li>
						<li><a href="" title="Order History">Order History</a></li>
						<li><a href="<?php echo e(route('site.wishlist')); ?>" title="My Wishlist">My Wishlist</a></li>
						<li><a href="" title="Track Order">Track Order</a></li>
						<!--<li><a href="<?php echo e(route('site.ourcustomers')); ?>" title="Our Customers">MASHROO CLAN</a></li>-->
					</ul>
				</div>
			</div>
			<div class="col-md-2 col-6 p-0 pl-md-4">
				<div class="footer-widget">
					<h4 class="widget-title">Information</h4>
					<ul class="footer-menu">
						<li><a href="<?php echo e(route('site.terms')); ?>">Terms</a></li>
						<li><a href="<?php echo e(route('site.faq')); ?>">FAQ</a></li>
						<li><a href="#" target="_blank">Sitemap</a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-4 col-12 p-0 pl-md-2">
				<div class="footer-widget">
					<h4 class="widget-title">Newsletter</h4>
					<p>
						Get notified of new products, limited releases, and more.
					</p>
					<form class="form-inline d-flex" method="post" action="<?php echo e(route('site.newsletter.save')); ?>">
						<?php echo csrf_field(); ?>
						<input type="email" class="form-control" placeholder="Your Email Address" name="email" required>
						<button class="btn submit-newsletter" type="submit">Subscribe</button>
						<!--<button type="submit" class="btn btn-base-1 btn-icon-left">Subscribe</button>-->
					</form>
					<div class="moorabi-socials">
						<ul class="socials mt-4">
							<li>
								<a href="#" class="social-item" target="_blank">
									<i class="icon ti-facebook"></i>
								</a>
							</li>
							<li>
								<a href="#" class="social-item" target="_blank">
									<i class="icon ti-twitter"></i>
								</a>
							</li>
							<li>
								<a href="#" class="social-item" target="_blank">
									<i class="icon ti-instagram"></i>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-12 p-0 pt-4 mt-5 border-top ft_bottom_text row m-0">
				<p class="col-12 col-md-6">© 2021 BRAND NAME Store</p>
				<div class="col-12 col-md-6 text-right">
					<img src="<?php echo e(asset('frontend/img/cards/rozarpay.png')); ?>" height="20" alt="Rozarpay">
					<img src="<?php echo e(asset('frontend/img/cards/cod.png')); ?>" height="20" alt="COD">
				</div>
			</div>
		</div>
	</div>
</footer>



<section class="slice-sm footer-top-bar bg-white d-none">

   <div class="container sct-inner">

      <div class="row no-gutters">

         <div class="col-lg-3 col-md-6">

            <div class="footer-top-box text-center">

               <a href="<?php echo e(route('site.replacement')); ?>">

                  <i class="fa fa-mail-reply"></i>

                  <h4 class="heading-5">REPLACEMENT &amp; REFUND POLICY</h4>

               </a>

            </div>

         </div>

         <div class="col-lg-3 col-md-6">

            <div class="footer-top-box text-center">

               <a href="<?php echo e(route('site.shipping')); ?>">

                  <i class="fa fa-support"></i>

                  <h4 class="heading-5">SHIPPING &amp; DELIVERY POLICY</h4>

               </a>

            </div>

         </div>

         <div class="col-lg-3 col-md-6">

            <div class="footer-top-box text-center">

               <a href="<?php echo e(route('site.about')); ?>">

                  <i class="fa fa-dashboard"></i>

                  <h4 class="heading-5">ABOUT US</h4>

               </a>

            </div>

         </div>

         <div class="col-lg-3 col-md-6">

            <div class="footer-top-box text-center">

               <a href="<?php echo e(route('site.contact')); ?>">

                  <i class="fa fa-dashboard"></i>

                  <h4 class="heading-5">Contact US</h4>

               </a>

            </div>

         </div>

      </div>

   </div>

   <!-- FOOTER -->

   <footer id="footer" class="footer">

      <div class="footer-top">

         <div class="container">

            <div class="row cols-xs-space cols-sm-space cols-md-space">

               <div class="col-lg-5 col-xl-4 text-center text-md-left">

                  <div class="col">

                     <a href="" class="d-block">

                     <img src="<?php echo e(asset('frontend/img/logo.png')); ?>" alt="Mashroo Store" class="" height="44">

                     </a>

                     <p class="mt-3">Mashroo is an acclaimed online shopping store supplying designer Thobes for men and boys and Designer Abayas for girls and women making Modest wear Accessible all over the world.</p>

                     <div class="d-inline-block d-md-block">

                        <form class="form-inline" method="post" action="<?php echo e(route('site.newsletter.save')); ?>">

                           <?php echo csrf_field(); ?>                              

                           <div class="form-group mb-0">

                              <input type="email" class="form-control" placeholder="Your Email Address" name="email" required>

                           </div>

                           <button type="submit" class="btn btn-base-1 btn-icon-left">Subscribe</button>

                        </form>

                     </div>

                  </div>

               </div>

               <div class="col-lg-4 offset-xl-1 col-md-4">

                  <div class="col text-center text-md-left">

                     <h4 class="heading heading-xs strong-600 text-uppercase mb-2">

                        Our Showrooms

                     </h4>

                     <ul class="footer-links contact-widget">

                        <li>

                           <span class="d-block strong-600">Address:</span>

                           <span class="d-block">MUMBAI STORE (JOGESHWARI ) : Shop No.4, Shakuntala Apartment, Opp. Hotel Mina International,S.V.Road, Jogeshwari West, Mumbai 400102  <br>(Call : 9136552592)</span><br>

                           <span class="d-block">MUMBAI STORE ( BYCULLA) : 5 C, Ready Money Building, Sankli Street, Byculla West, Mumbai 400008, <br>(Call : 9136552593)</span><br>

                           <span class="d-block">.</span>

                        </li>

                        <li>

                           <span class="d-block strong-600">Phone:</span>

                           <span class="d-block">1800-102-9969</span>

                        </li>

                        <li>

                           <span class="d-block strong-600">Email:</span>

                           <span class="d-block">

                           <a href="mailto:orders@mashroostore.com">info@mashroostore.com</a>

                           </span>

                        </li>

                     </ul>

                  </div>

               </div>

               <div class="col-md-4 col-lg-2">

                  <div class="col text-center text-md-left">

                     <h4 class="heading heading-xs strong-600 text-uppercase mb-2">

                        My Account

                     </h4>

                     <ul class="footer-links">

                        <li>

                           <a href="<?php echo e(route('site.login')); ?>" title="Login">

                           Login

                           </a>

                        </li>

                        <li>

                           <a href="" title="Order History">

                           Order History

                           </a>

                        </li>

                        <li>

                           <a href="<?php echo e(route('site.wishlist')); ?>" title="My Wishlist">

                           My Wishlist

                           </a>

                        </li>

                        <li>

                           <a href="" title="Track Order">

                           Track Order

                           </a>

                        </li>

                        <li>

                           <a href="<?php echo e(route('site.ourcustomers')); ?>" title="Our Customers">

                           MASHROO CLAN

                           </a>

                        </li>

                     </ul>

                  </div>

               </div>

            </div>

         </div>

      </div>

      <div class=" py-3">

         <div class="container">

            <div class="row row-cols-xs-spaced flex flex-items-xs-middle">

               <div class="col-md-4">

                  <div class="copyright text-center text-md-left">

                     <ul class="copy-links no-margin">

                        <li>

                           © 2020 Mashroo Store Modest Clothing

                        </li>

                        <li>

                           <a href="<?php echo e(route('site.terms')); ?>">Terms</a>

                        </li>

                        <li>

                           <a href="<?php echo e(route('site.faq')); ?>">FAQ</a>

                        </li>

                        <li>

                           <a href="#" target="_blank">Sitemap</a>

                        </li>

                     </ul>

                  </div>

               </div>

               <div class="col-md-4">

                  <ul class="text-center my-3 my-md-0 social-nav model-2">

                     <li>

                        <a href="" class="facebook" target="_blank" data-toggle="tooltip" data-original-title="Facebook">

                        <i class="fa fa-facebook"></i>

                        </a>

                     </li>

                     <li>

                        <a href="" class="instagram" target="_blank" data-toggle="tooltip" data-original-title="Instagram">

                        <i class="fa fa-instagram"></i>

                        </a>

                     </li>

                     <li>

                        <a href="" class="twitter" target="_blank" data-toggle="tooltip" data-original-title="Twitter">

                        <i class="fa fa-twitter"></i>

                        </a>

                     </li>

                     <li>

                        <a href="" class="youtube" target="_blank" data-toggle="tooltip" data-original-title="Youtube">

                        <i class="fa fa-youtube"></i>

                        </a>

                     </li>

                  </ul>

               </div>

               <div class="col-md-4">

                  <div class="text-center text-md-right">

                     <ul class="inline-links">

                        <li>

                           <img src="<?php echo e(asset('frontend/img/cards/rozarpay.png')); ?>" height="20" alt="Rozarpay">

                        </li>

                        <li>

                           <img src="<?php echo e(asset('frontend/img/cards/cod.png')); ?>" height="20" alt="COD">

                        </li>

                     </ul>

                  </div>

               </div>

            </div>

         </div>

      </div>

   </footer>

</section>

</div><!-- END: body-wrap -->

<!-- SCRIPTS -->

<a href="#" class="back-to-top btn-back-to-top"></a>

<!-- Core -->
<script type="text/javascript">
   $('.owl-carousel').owlCarousel({
        dots: false,
       items : 1, 
       autoplay: 3000
   })
</script>

<script src="<?php echo e(asset('frontend/js/popper.min.js ')); ?>"></script>

<script src="<?php echo e(asset('frontend/js/bootstrap.min.js')); ?>"></script>

<script src="<?php echo e(asset('frontend/js/owl.carousel.min.js')); ?>"></script>

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
<script src="<?php echo e(asset('frontend/js/nav.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/custom.js')); ?>"></script>

<?php echo $__env->yieldPushContent('scripts'); ?>

</body>

</html>

<?php /**PATH /home/demo9dtx/public_html/dev/utkarsh/resources/views/site/partials/footer.blade.php ENDPATH**/ ?>