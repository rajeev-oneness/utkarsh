@extends('site.partials.app')

@section('title') {{ $pageTitle }} @endsection

@section('content')



<!-- SHOP GRID WRAPPER -->

<section class="product-details-area">

   <div class="container">

      <div class="bg-white">

         <!-- Product gallery and Description -->

         <div class="row no-gutters cols-xs-space cols-sm-space cols-md-space">

            <div class="col-lg-6">

               <div class="product-gal sticky-top d-flex flex-row-reverse">

                  <div class="product-gal-img">

                     <img class="xzoom img-fluid" id="image_show" src="{{ asset('books/'.$product->image) }}" xoriginal="{{ asset('books/'.$product->image) }}" />

                  </div>

                  <div class="product-gal-thumb">

                     <div class="xzoom-thumbs">

                        @if($product_images)

                        @foreach($product_images as $n)

                        <a href="{{ asset('books/'.$n->image) }}">

                        <img class="xzoom-gallery"  src=" {{ asset('books/'.$n->image) }} " xpreview=" {{ asset('books/'.$n->image) }} " >

                        </a>

                        @endforeach

                        @endif



                       {{--  <a href="img/product/3.jpg">

                        <img class="xzoom-gallery"  src=" {{ asset('frontend/img/product/3.jpg') }} " xpreview=" {{ asset('frontend/img/product/3.jpg') }} " >

                        </a>

                        <a href="img/product/4.jpg">

                        <img class="xzoom-gallery"  src=" {{ asset('frontend/img/product/4.jpg') }} " xpreview=" {{ asset('frontend/img/product/4.jpg') }} " >

                        </a>

                        <a href="img/product/5.jpg">

                        <img class="xzoom-gallery"  src=" {{ asset('frontend/img/product/5.jpg') }} " xpreview=" {{ asset('frontend/img/product/5.jpg') }} " >

                        </a> --}}

                     </div>

                  </div>

               </div>

            </div>

            <div class="col-lg-6">

               <!-- Product description -->

               <div class="product-description-wrapper">

                  <!-- Product title -->

                  <h2 class="product-title">

                     {{ ucfirst($product->name) }}

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

                           @if($product->is_instock==1)

                           <li>

                              <span class="badge badge-md badge-pill bg-green">In stock</span>

                           </li>

                           @else

                           <li>

                              <span class="badge badge-md badge-pill bg-red">Out of stock</span>

                           </li>

                           @endif
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
									<span>₹</span> {{ $product->inprice }}
								</del>
								<ins>
									<span>₹</span> {{ $product->inoffered_price }}
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

                           ₹ <span id="discountprice">{{ $product->inoffered_price }}</span>

                           </strong>

                        </div>

                     </div>

                  </div>

                

                  @if(!empty($productsizes))

                     <div class="row no-gutters mt-4 mb-4">

                        <div class="col-2">

                           <div class="product-description-label mt-2 ">SIZE:</div>

                        </div>

                        <div class="col-10">

                           <ul class="list-inline checkbox-alphanumeric checkbox-alphanumeric--style-1 mb-2">

                             

                             

                             @php $slno=1;  @endphp

                             @foreach($productsizes as $n)

                              <li>

                                 <!--<input type="radio" id="choice_0-{{ $n->sizes }}" name="choice_0" value="{{ $n->sizes }}" @if($slno==1){{ 'checked' }} @endif>

                                 <label for="choice_0-{{ $n->sizes }}">{{ $n->sizes }}</label>-->

                                 <input type="radio" id="choice_0-{{ $n->sizes }}" class="size-class" name="choice_0" value="{{ $n->sizes }}" @if($slno==1) {{'checked'}}  @endif myattr="{{ $n->sizes }}" inofferedprice="{{ $n->inoffered_price }}" inprice="{{ $n->inprice }}">

                                 <label for="choice_0-{{ $n->sizes }}">{{ $n->sizes }}</label>

                              </li>

                              @php $slno++; @endphp

                              @endforeach

                              

                           </ul>

                        </div>

                     </div>

                     @endif

                     <!-- Quantity + Add to cart -->

                     <form id="option-choice-form" method="post" action="{{ route('site.addcart') }}">

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

                     @if($product->category->id!=12)

                     <span class="sizechart-btn" id="reach-us" onclick="openBox()">Size Chart</span>

                     @endif

                     <div class="chatpopup" id="reachus" style="display:none;top:60%;right:30%;bottom: unset;">

                         

                        <!--<img class="img-xs sizechart_design" src="{{ asset('books/'.$product->size_chart) }}" alt="size_chart">-->

                        @php $option = 1; 

                        switch ($option) { 

                           case ((!empty($product->level5category->name)) && $option ==1 ):@endphp

                              <img class="img-xs sizechart_design" src="{{ asset('sizechart/'.$product->level5category->size_chart) }}" alt="size_chart">

                        @php $option = 1;        

                               break;

                           case ((!empty($product->level4category->name)) && $option ==1 ): @endphp

                              <img class="img-xs sizechart_design" src="{{ asset('sizechart/'.$product->level4category->size_chart) }}" alt="size_chart">

                        @php  break;

                           case ((!empty($product->level3category->name)) && $option ==1 ): @endphp

                               <img class="img-xs sizechart_design" src="{{ asset('sizechart/'.$product->level3category->size_chart) }}" alt="size_chart">

                        @php  break;

                           case ((!empty($product->level2category->name)) && $option ==1 ): @endphp

                               <img class="img-xs sizechart_design" src="{{ asset('sizechart/'.$product->level2category->size_chart) }}" alt="size_chart">

                        @php  break;

                           case ((!empty($product->level1category->name)) && $option ==1 ): @endphp

                               <img class="img-xs sizechart_design" src="{{ asset('sizechart/'.$product->level1category->size_chart) }}" alt="size_chart">

                        @php  break;                   

                        }  @endphp

                        

                        <button type="button" class="fa fa-close" onclick="closeBox()"></button>

                     </div>

                  

                  

                     @csrf

                  <div class="d-table width-100 mt-3">

                     <div class="d-table-cell">

                        <div id="show_buy_options">

                           <div class="clearfix"></div>

                                <input type="hidden" name="product_name" value="{{ $product->name }}"/>

                                <input type="hidden" name="product_id" value="{{ $product->id }}"/>

                                <input type="hidden" name="product_code" value="{{ $product->code }}"/>

                                <input type="hidden" name="product_image" value="{{ asset('/books/'.$product->image) }}"/>

                                <input type="hidden" name="price" id="cartprice" value="{{ $product->inoffered_price }}"/>

                                <input type="hidden" name="gst" value="{{ $product->gst }}"/>

                           <!-- Add to cart button -->

                           @if($product->is_instock==1)

                           <button type="submit" class="btn btn-styled btn-alt-base-1 c-white btn-icon-left strong-700 hov-bounce hov-shaddow ml-2 add-cart-d bt-phone">

                           <i class="fa fa-shopping-cart"></i>

                           <span class="d-md-inline-block"> Add to cart</span>

                           </button>

                           

                           <button type="submit" class="btn btn-styled btn-alt-base-1 c-white btn-icon-left strong-700 hov-bounce hov-shaddow ml-2 buy-now-d bt-phone" name="view" value="view">

                           <i class="fa fa-shopping-cart"></i>

                           <span class="d-md-inline-block"> Buy Now</span>

                           </button>

                           @else

                           <button type="button" class="btn btn-styled btn-alt-base-1 c-white btn-icon-left strong-700 hov-bounce hov-shaddow ml-2">

							   <i class="fa fa-shopping-cart"></i>

							   <span class="d-none d-md-inline-block"> Out Of stock</span>
							</button>
                           @endif
							
						
                        </div>

                     </div>

                  </div>

                  </form>

                  

                  <div class="d-table width-100 mt-3">

                     <div class="d-table-cell">

                        <div id="show_buy_options">

                  <a href="{{ route('site.addwistlist',$n->id) }}" class="btn btn-styled btn-alt-base-1 c-white btn-icon-left strong-700 hov-bounce hov-shaddow ml-2 bt-phone">
                    <i class="fa fa-heart-o"></i>
                     <span class="d-md-inline-block add-cart-d">Add to wish list </span>

                  </a>

                  <a href="{{ route('site.add.compare',$n->id) }}" class="btn btn-styled btn-alt-base-1 c-white btn-icon-left strong-700 hov-bounce hov-shaddow ml-2 bt-phone">
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

                                 {!! $product->description !!}<br>                                            

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

                      

                    @if($relatedproduct)

                     @foreach($relatedproduct as $n)

                     @php $key = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $n->name)) @endphp

                     <div class="p-2">

                        <div class="row no-gutters product-box-2 align-items-center">
						
							<div class="col-12">
								<div class="item deal-day">

									<a href="{!! URL::to('details/'.$n->id.'/'.$key) !!}" class="d-block product-image h-100">

										<img src="{{ asset('books/'.$n->image) }}" width="100%">

									</a>

									<div class="product-info text-center">
										<h5 class="product-name">
											<a href="{!! URL::to('details/'.$n->id.'/'.$key) !!}">{{ $n->name }}</a>
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
													<span>₹</span> {{ $n->inprice }}
												</del>
												<ins>
													<span>₹</span> {{ $n->inoffered_price }}
												</ins>
											</div>
										</div>
									</div>
									<div class="hover-like">
										<a title="Add to Wishlist" href="{{ route('site.addwistlist',$n->id) }}" tabindex="0">
											<div class="quick-cart bg-lightblue">
												<i class="ti-heart"></i>
											</div>
										</a>
										<a href="{{ route('site.add.compare',$n->id) }}" title="Add to Compare" tabindex="0">
											<div class="quick-cart">
												<i class="ti-reload"></i>
											</div>
										</a>
										<a title="Quick view" href="{!! URL::to('details/'.$n->id.'/'.$key) !!}" tabindex="0">
											<div class="quick-cart bg-lightyellow">
												<i class="ti-eye"></i>
											</div>
										</a>
									</div>
								</div>
							</div>

                           <div class="col-4 d-none">

                              <div class="position-relative overflow-hidden h-100">

                                 <a href="{!! URL::to('details/'.$n->id.'/'.$key) !!}" class="d-block product-image h-100">

                                   <img src="{{ asset('books/'.$n->image) }}" width="100%">

                                 </a>

                                 <div class="product-btns">

                                    <a class="btn add-wishlist" title="Add to Wishlist" href="{{ route('site.addwistlist',$n->id) }}" tabindex="0">

                                    <i class="fa fa-heart-o"></i>

                                    </a>

                                    

                                    <a href="{{ route('site.add.compare',$n->id) }}" class="btn add-compare" title="Add to Compare" tabindex="0">

                                       <i class="fa fa-refresh"></i>

                                    </a>

                                    

                                    <!--<button class="btn add-compare" title="Add to Compare">

                                    <i class="fa fa-refresh"></i>

                                    </button>-->

                                    

                                    <a class="btn quick-view" title="Quick view" href="{!! URL::to('details/'.$n->id.'/'.$key) !!}" tabindex="0">

                                    <i class="fa fa-eye"></i>

                                    </a>

                                 </div>

                              </div>

                           </div>

                           <div class="col-8 border-left d-none">

                              <div class="p-3">

                                 <h2 class="product-title mb-0 p-0 text-truncate">

                                    <a href="{!! URL::to('details/'.$n->id.'/'.$key) !!}">{{ $n->name }}</a>

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

                                       <del class="old-product-price strong-400">₹ {{ $n->inprice }}</del>

                                       <span class="product-price strong-600">₹ {{ $n->inoffered_price }}</span>

                                    </div>

                                    <div class="float-right">

                                       <form action="{{ route('site.addcart') }}" method="post">

                                       @csrf

                                       <input type="hidden" name="quantity" value="1"/>

                                       <input type="hidden" name="product_name" value="{{ $n->name }}"/>

                                       <input type="hidden" name="product_id" value="{{ $n->id }}"/>

                                       <input type="hidden" name="product_code" value="{{ $n->code }}"/>

                                       <input type="hidden" name="product_image" value="{{ asset('/books/'.$n->image) }}"/>

                                       <input type="hidden" name="price" value="{{ $n->inoffered_price }}"/>

                                       <input type="hidden" name="gst" value="{{ $n->gst }}"/>

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

                     @endforeach

                     @endif

                     

                     <!--<div class="p-2">

                        <div class="row no-gutters product-box-2 align-items-center">

                           <div class="col-4">

                              <div class="position-relative overflow-hidden h-100">

                                 <a href="" class="d-block product-image h-100">

                                   <img src="{{ asset('frontend/img/product/6.jpg') }}" width="100%">

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

@endsection

@push('scripts')

@if(!empty($productsizes))

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

@endif

@endpush