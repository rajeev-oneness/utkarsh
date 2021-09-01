@extends('site.partials.app')

@section('title') {{ $pageTitle }} @endsection

@section('content')



@php 

$category = Request::get('category_ids') ? Request::get('category_ids'):array();

$maxprice = Request::get('maxprice') ? Request::get('maxprice'):5000;

@endphp




<div class="container">

<div class="row m-0 mb-5">
	<div class="col-12">
		<nav aria-label="breadcrumb">
			<ol class="title-items breadcrumb">
			  <li class="breadcrumb-item title-item"><a href="{{ route('site.home') }}">Home</a></li>
			  <li class="breadcrumb-item"><a href="{{ route('site.home') }}">All Categories</a></li>
			  <li class="breadcrumb-item active"><a href="{{ route('site.home') }}">{{ $key }}</a></li>
			</ol>
		</nav>
	</div>
</div>

  <!--<div class="row">

	 <div class="col">

		<ul class="breadcrumb">

		   <li><a href="{{ route('site.home') }}">Home</a></li>

		   <li><a href="{{ route('site.home') }}">All Categories</a></li>

		   <li class="active"><a href="{{ route('site.home') }}">{{ $key }}</a></li>

		</ul>

	 </div>

  </div>-->

</div>

<section class="gry-bg py-4">

	<div class="container">
	    <form class="" id="search-form" action="" method="GET">
		<div class="row">
		    
			<div class="col-12 col-md-3">
				<div class="leftpanel-div">
					<div class="widget">
						<h5 class="widgettitle">Categories</h5>
					</div>
					<div class="select-section mt-3 mb-4">
						@if($categories)
						 
						@foreach($categories as $n)
							<div class="form-check">
								<input class="form-check-input" type="checkbox" name="category_ids[]" value="{{ $n->id }}" @if(in_array($n->id, $category)){{ "checked" }} @endif onChange="this.form.submit()">
								<label class="form-check-label label-text" for="flexCheckDefault">
									&nbsp {{ $n->name }}
								</label>
							</div>
						@endforeach

						@endif
					</div>
				</div>
				<!--<div class="leftpanel-div">-->
				<!--	<div class="widget">-->
				<!--		<h5 class="widgettitle">Brand</h5>-->
				<!--	</div>-->
				<!--	<div class="select-section mt-3 mb-4">-->
				<!--		<div class="form-check">-->
				<!--			<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">-->
				<!--			<label class="form-check-label label-text" for="flexCheckDefault">-->
				<!--				New Arrivals-->
				<!--			</label>-->
				<!--		  </div>-->
				<!--		  <div class="form-check">-->
				<!--			<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>-->
				<!--			<label class="form-check-label label-text" for="flexCheckChecked">-->
				<!--			  Toys-->
				<!--			</label>-->
				<!--		  </div>-->
				<!--	</div>-->
				<!--</div>-->
				<!--<div class="leftpanel-div">-->
				<!--	<div class="widget">-->
				<!--		<h5 class="widgettitle">Size</h5>-->
				<!--	</div>-->
				<!--	<div class="select-section mt-3 mb-4 sizes">-->
				<!--		<label class="radio"> <input type="radio" name="size" value="S" checked> <span>S</span> </label> <label class="radio"> <input type="radio" name="size" value="M"> <span>M</span> </label> <label class="radio"> <input type="radio" name="size" value="L"> <span>L</span> </label> <label class="radio"> <input type="radio" name="size" value="XL"> <span>XL</span> </label> <label class="radio"> <input type="radio" name="size" value="XXL"> <span>XXL</span> </label>-->
				<!--	</div>-->
				<!--</div>-->
				<div class="leftpanel-div">
					<div class="widget">
						<h5 class="widgettitle">Price</h5>
					</div>
					<div class="select-section mt-3 mb-4 range-slider-inner">
						<input class="range-slider__range" name="maxprice" onChange="this.form.submit()" type="range" value="{{ $maxprice }}" min="0" max="60000">

						<!-- <span class="range-slider__value"></span> -->
					</div>
				</div>
				
			</div>
			</form>
         <!--<div class="col-xl-3 ">

            <div class="bg-white sidebar-box mb-3 d-none d-xl-block">

               <div class="box-title text-center">

                  Categories

               </div>

               <div class="box-content">

                  <div class="category-accordion">

                    <form class="" id="search-form" action="" method="GET">

                     <div class="single-category">

                        <ul  class="sub-sub-category-list">

                           @if($categories)

                           @foreach($categories as $n)

                           <li><input type="checkbox" class="subsubcategory_checkbox" 

                           name="category_ids[]" value="{{ $n->id }}" @if(in_array($n->id, $category)){{ "checked" }} @endif 

                           onChange="this.form.submit()">&nbsp {{ $n->name }} </li>

                           @endforeach

                           @endif

                          {{--  <li><input type="checkbox" class="subsubcategory_checkbox" name="" value="" > ABAYAS &amp; JILBABS</li> --}}

                        </ul>

                       

                     </div>

                  </div>

               </div>

               <div class="range-slider">

                  <h3> Price range </h3>

                  <div class="range-slider-inner">

                     <input class="range-slider__range" name="maxprice" onChange="this.form.submit()" type="range" value="{{ $maxprice }}" min="0" max="60000">

                     <span class="range-slider__value"></span>

                  </div>

               </div>

            </div>

          

         </div>-->

         <div class="col-xl-9">

            <!-- <div class="bg-white"> -->

            <!--<div class="brands-bar row no-gutters pb-3 bg-white p-3">

               <div class="col-11">

                  <div class="brands-collapse-box" id="brands-collapse-box">

                     <ul class="inline-links">

                        <li><a href="s">

                           <img src="{{ asset('frontend/img/logo.png') }}" alt="" class="img-fluid"></a></li>

                     </ul>

                  </div>

               </div>

            </div>-->

				<div class="sort-by-bar row no-gutters bg-white mb-3 px-3">
				
					<div class="col-12 row m-0 mb-4 p-3 bg-light">
						<div class="col-12 p-0">
							<div class="row m-0 justify-content-end ml-auto shortsection">
								<div class="col-12 row m-0 col-md-4 p-0">
									<label for="staticEmail" class="col-sm-3 col-form-label">Sort By</label>
									<div class="col-sm-9">
										<select class="form-select sortSelect" name="sort_by" onchange="this.form.submit();">
											<option value="1" @if(Request::get('sort_by')==1) {{ 'selected' }} @endif>Newest</option>
											<option value="2" @if(Request::get('sort_by')==2) {{ 'selected' }} @endif>Oldest</option>
											<option value="3" @if(Request::get('sort_by')==3) {{ 'selected' }} @endif>Price low to high</option>
											<option value="4" @if(Request::get('sort_by')==4) {{ 'selected' }} @endif>Price high to low</option>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div><!--Short-->

					

				</div>

            </form>

            <!-- <hr class=""> -->

            <div class="products-box-bar p-3 bg-white">

               <div class="row sm-no-gutters gutters-5">
						

                  @if($products)

                  @foreach($products as $n)

                  @php $key = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $n->name)) @endphp
				  
				  <div class="col-12 col-md-4 plr-4">
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
								<a href="{!! URL::to('details/'.$n->id.'/'.$key) !!}" class="product-image">
									<img src="{{ asset('books/'.$n->image) }}" class="">
								</a>
								<div class="product-info text-center">
									<h5 class="product-name">
										<a href="{!! URL::to('details/'.$n->id.'/'.$key) !!}" tabindex="0">{{ $n->name }}</a>
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
												<span>&#x20b9;</span> {{ $n->inprice }}
											</del>
											<ins>
												<span>&#x20b9;</span> {{ $n->inoffered_price }}
											</ins>
										</div>
									</div>
								</div>
								<div class="hover-like">
									<a href="{{ route('site.addwistlist',$n->id) }}" tabindex="0">
										<div class="quick-cart bg-lightblue">
											<i class="ti-heart"></i>
										</div>
									</a>
									<a href="{{ route('site.add.compare',$n->id) }}" tabindex="0">
										<div class="quick-cart">
											<i class="ti-reload"></i>
										</div>
									</a>
									<a href="{!! URL::to('details/'.$n->id.'/'.$key) !!}" tabindex="0">
										<div class="quick-cart bg-lightyellow">
											<i class="ti-eye"></i>
										</div>
									</a>
								</div>
							</div>
						</div>

                  <!--<div class="col-xxl-3 col-xl-4 col-lg-3 col-md-4 col-6">

                     <div class="product-box-2 bg-white alt-box my-2  flip_product ">

                        <div class="position-relative overflow-hidden">
                           <div class="batch">
                                       <a href="" class="arrival">new arrival</a>
                                       <a href="" class="p-week">product of the week</a>
                                    </div>
                           <a href="{!! URL::to('details/'.$n->id.'/'.$key) !!}">

                              <img src="{{ asset('books/'.$n->image) }}" width="100%">
                               

                           </a>

                           <div class="product-btns clearfix">

                              <a class="btn add-wishlist" title="Add to Wishlist" href="{{ route('site.addwistlist',$n->id) }}" tabindex="0">

                              <i class="fa fa-heart-o"></i>

                              </a>

                              <a class="btn add-compare" title="Add to Compare" href="{{ route('site.add.compare',$n->id) }}" tabindex="0">

                              <i class="fa fa-refresh"></i>

                              </a>

                              <a class="btn quick-view" title="Quick view" href="{!! URL::to('details/'.$n->id.'/'.$key) !!}" tabindex="0">

                              <i class="fa fa-eye"></i>

                              </a>

                           </div>

                        </div>

                        <div class="p-3 border-top">

                           <h2 class="product-title p-0 text-truncate">

                              <a href="{!! URL::to('details/'.$n->id.'/'.$key) !!}" tabindex="0">{{ $n->name }}</a>

                           </h2>

                           <div class="star-rating mb-1">

                              <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>

                           </div>

                           <div class="clearfix">

                              <div class="price-box float-left">

                                 <del class="old-product-price strong-400"><span>₹</span> {{ $n->inprice }}</del>

                                 <span class="product-price strong-600"><span>₹</span> {{ $n->inoffered_price }}</span>

                              </div>
                                    

                           </div>

                        </div>

                     </div>

                  </div>-->

                  @endforeach

                  @endif



                  {{-- <div class="col-xxl-3 col-xl-4 col-lg-3 col-md-4 col-6">

                     <div class="product-box-2 bg-white alt-box my-2  flip_product ">

                        <div class="position-relative overflow-hidden">

                              <img src="{{ asset('frontend/img/product/2.jpg') }}" width="100%">

                           <div class="product-btns clearfix">

                              <button class="btn add-wishlist" title="Add to Wishlist" onclick="addToWishList(150)" tabindex="0">

                              <i class="la la-heart-o"></i>

                              </button>

                              <button class="btn add-compare" title="Add to Compare" onclick="addToCompare(150)" tabindex="0">

                              <i class="la la-refresh"></i>

                              </button>

                              <button class="btn quick-view" title="Quick view" onclick="showAddToCartModal(150)" tabindex="0">

                              <i class="la la-eye"></i>

                              </button>

                           </div>

                        </div>

                        <div class="p-3 border-top">

                           <h2 class="product-title p-0 text-truncate">

                              <a href="details.html" tabindex="0">BLUE AND PINK DAPPLE ABAYA</a>

                           </h2>

                           <div class="star-rating mb-1">

                              <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>

                           </div>

                           <div class="clearfix">

                              <div class="price-box float-left">

                                 <del class="old-product-price strong-400"><span>₹</span> 5500</del>

                                 <span class="product-price strong-600"><span>₹</span> 2750</span>

                              </div>

                           </div>

                        </div>

                     </div>

                  </div>





                  <div class="col-xxl-3 col-xl-4 col-lg-3 col-md-4 col-6">

                     <div class="product-box-2 bg-white alt-box my-2  flip_product ">

                        <div class="position-relative overflow-hidden">

                              <img src="{{ asset('frontend/img/product/3.jpg') }}" width="100%">

                           <div class="product-btns clearfix">

                              <button class="btn add-wishlist" title="Add to Wishlist" onclick="addToWishList(150)" tabindex="0">

                              <i class="la la-heart-o"></i>

                              </button>

                              <button class="btn add-compare" title="Add to Compare" onclick="addToCompare(150)" tabindex="0">

                              <i class="la la-refresh"></i>

                              </button>

                              <button class="btn quick-view" title="Quick view" onclick="showAddToCartModal(150)" tabindex="0">

                              <i class="la la-eye"></i>

                              </button>

                           </div>

                        </div>

                        <div class="p-3 border-top">

                           <h2 class="product-title p-0 text-truncate">

                              <a href="details.html" tabindex="0">BLUE AND PINK DAPPLE ABAYA</a>

                           </h2>

                           <div class="star-rating mb-1">

                              <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>

                           </div>

                           <div class="clearfix">

                              <div class="price-box float-left">

                                 <del class="old-product-price strong-400"><span>₹</span> 5500</del>

                                 <span class="product-price strong-600"><span>₹</span> 2750</span>

                              </div>

                           </div>

                        </div>

                     </div>

                  </div>





                  <div class="col-xxl-3 col-xl-4 col-lg-3 col-md-4 col-6">

                     <div class="product-box-2 bg-white alt-box my-2  flip_product ">

                        <div class="position-relative overflow-hidden">

                              <img src="{{ asset('frontend/img/product/4.jpg') }}" width="100%">

                           <div class="product-btns clearfix">

                              <button class="btn add-wishlist" title="Add to Wishlist" onclick="addToWishList(150)" tabindex="0">

                              <i class="la la-heart-o"></i>

                              </button>

                              <button class="btn add-compare" title="Add to Compare" onclick="addToCompare(150)" tabindex="0">

                              <i class="la la-refresh"></i>

                              </button>

                              <button class="btn quick-view" title="Quick view" onclick="showAddToCartModal(150)" tabindex="0">

                              <i class="la la-eye"></i>

                              </button>

                           </div>

                        </div>

                        <div class="p-3 border-top">

                           <h2 class="product-title p-0 text-truncate">

                              <a href="details.html" tabindex="0">BLUE AND PINK DAPPLE ABAYA</a>

                           </h2>

                           <div class="star-rating mb-1">

                              <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>

                           </div>

                           <div class="clearfix">

                              <div class="price-box float-left">

                                 <del class="old-product-price strong-400"><span>₹</span> 5500</del>

                                 <span class="product-price strong-600"><span>₹</span> 2750</span>

                              </div>

                           </div>

                        </div>

                     </div>

                  </div> --}}





                 {{--  <div class="col-xxl-3 col-xl-4 col-lg-3 col-md-4 col-6">

                     <div class="product-box-2 bg-white alt-box my-2  flip_product ">

                        <div class="position-relative overflow-hidden">

                              <img src="{{ asset('frontend/img/product/5.jpg') }}" width="100%">

                           <div class="product-btns clearfix">

                              <button class="btn add-wishlist" title="Add to Wishlist" onclick="addToWishList(150)" tabindex="0">

                              <i class="la la-heart-o"></i>

                              </button>

                              <button class="btn add-compare" title="Add to Compare" onclick="addToCompare(150)" tabindex="0">

                              <i class="la la-refresh"></i>

                              </button>

                              <button class="btn quick-view" title="Quick view" onclick="showAddToCartModal(150)" tabindex="0">

                              <i class="la la-eye"></i>

                              </button>

                           </div>

                        </div>

                        <div class="p-3 border-top">

                           <h2 class="product-title p-0 text-truncate">

                              <a href="details.html" tabindex="0">BLUE AND PINK DAPPLE ABAYA</a>

                           </h2>

                           <div class="star-rating mb-1">

                              <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>

                           </div>

                           <div class="clearfix">

                              <div class="price-box float-left">

                                 <del class="old-product-price strong-400"><span>₹</span> 5500</del>

                                 <span class="product-price strong-600"><span>₹</span> 2750</span>

                              </div>

                           </div>

                        </div>

                     </div>

                     

                  </div>

                  <div class="col-xxl-3 col-xl-4 col-lg-3 col-md-4 col-6">

                     <div class="product-box-2 bg-white alt-box my-2  flip_product ">

                        <div class="position-relative overflow-hidden">

                              <img src="{{ asset('frontend/img/product/6.jpg') }}" width="100%">

                           <div class="product-btns clearfix">

                              <button class="btn add-wishlist" title="Add to Wishlist" onclick="addToWishList(150)" tabindex="0">

                              <i class="la la-heart-o"></i>

                              </button>

                              <button class="btn add-compare" title="Add to Compare" onclick="addToCompare(150)" tabindex="0">

                              <i class="la la-refresh"></i>

                              </button>

                              <button class="btn quick-view" title="Quick view" onclick="showAddToCartModal(150)" tabindex="0">

                              <i class="la la-eye"></i>

                              </button>

                           </div>

                        </div>

                        <div class="p-3 border-top">

                           <h2 class="product-title p-0 text-truncate">

                              <a href="details.html" tabindex="0">BLUE AND PINK DAPPLE ABAYA</a>

                           </h2>

                           <div class="star-rating mb-1">

                              <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>

                           </div>

                           <div class="clearfix">

                              <div class="price-box float-left">

                                 <del class="old-product-price strong-400"><span>₹</span> 5500</del>

                                 <span class="product-price strong-600"><span>₹</span> 2750</span>

                              </div>

                           </div>

                        </div>

                     </div>

                     

                  </div>

                  <div class="col-xxl-3 col-xl-4 col-lg-3 col-md-4 col-6">

                     <div class="product-box-2 bg-white alt-box my-2  flip_product ">

                        <div class="position-relative overflow-hidden">

                              <img src="{{ asset('frontend/img/product/7.jpg') }}" width="100%">

                           <div class="product-btns clearfix">

                              <button class="btn add-wishlist" title="Add to Wishlist" onclick="addToWishList(150)" tabindex="0">

                              <i class="la la-heart-o"></i>

                              </button>

                              <button class="btn add-compare" title="Add to Compare" onclick="addToCompare(150)" tabindex="0">

                              <i class="la la-refresh"></i>

                              </button>

                              <button class="btn quick-view" title="Quick view" onclick="showAddToCartModal(150)" tabindex="0">

                              <i class="la la-eye"></i>

                              </button>

                           </div>

                        </div>

                        <div class="p-3 border-top">

                           <h2 class="product-title p-0 text-truncate">

                              <a href="details.html" tabindex="0">BLUE AND PINK DAPPLE ABAYA</a>

                           </h2>

                           <div class="star-rating mb-1">

                              <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>

                           </div>

                           <div class="clearfix">

                              <div class="price-box float-left">

                                 <del class="old-product-price strong-400"><span>₹</span> 5500</del>

                                 <span class="product-price strong-600"><span>₹</span> 2750</span>

                              </div>

                           </div>

                        </div>

                     </div>

                     

                  </div>

                  <div class="col-xxl-3 col-xl-4 col-lg-3 col-md-4 col-6">

                     <div class="product-box-2 bg-white alt-box my-2  flip_product ">

                        <div class="position-relative overflow-hidden">

                              <img src="{{ asset('frontend/img/product/8.jpg') }}" width="100%">

                           <div class="product-btns clearfix">

                              <button class="btn add-wishlist" title="Add to Wishlist" onclick="addToWishList(150)" tabindex="0">

                              <i class="la la-heart-o"></i>

                              </button>

                              <button class="btn add-compare" title="Add to Compare" onclick="addToCompare(150)" tabindex="0">

                              <i class="la la-refresh"></i>

                              </button>

                              <button class="btn quick-view" title="Quick view" onclick="showAddToCartModal(150)" tabindex="0">

                              <i class="la la-eye"></i>

                              </button>

                           </div>

                        </div>

                        <div class="p-3 border-top">

                           <h2 class="product-title p-0 text-truncate">

                              <a href="details.html" tabindex="0">BLUE AND PINK DAPPLE ABAYA</a>

                           </h2>

                           <div class="star-rating mb-1">

                              <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>

                           </div>

                           <div class="clearfix">

                              <div class="price-box float-left">

                                 <del class="old-product-price strong-400"><span>₹</span> 5500</del>

                                 <span class="product-price strong-600"><span>₹</span> 2750</span>

                              </div>

                           </div>

                        </div>

                     </div>

                     

                  </div>

                  <div class="col-xxl-3 col-xl-4 col-lg-3 col-md-4 col-6">

                     <div class="product-box-2 bg-white alt-box my-2  flip_product ">

                        <div class="position-relative overflow-hidden">

                           

                              <img src="{{ asset('frontend/img/product/1.jpg') }}" width="100%">

                             

                        

                           <div class="product-btns clearfix">

                              <button class="btn add-wishlist" title="Add to Wishlist" onclick="addToWishList(150)" tabindex="0">

                              <i class="la la-heart-o"></i>

                              </button>

                              <button class="btn add-compare" title="Add to Compare" onclick="addToCompare(150)" tabindex="0">

                              <i class="la la-refresh"></i>

                              </button>

                              <button class="btn quick-view" title="Quick view" onclick="showAddToCartModal(150)" tabindex="0">

                              <i class="la la-eye"></i>

                              </button>

                           </div>

                        </div>

                        <div class="p-3 border-top">

                           <h2 class="product-title p-0 text-truncate">

                              <a href="details.html" tabindex="0">BLUE AND PINK DAPPLE ABAYA</a>

                           </h2>

                           <div class="star-rating mb-1">

                              <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>

                           </div>

                           <div class="clearfix">

                              <div class="price-box float-left">

                                 <del class="old-product-price strong-400"><span>₹</span> 5500</del>

                                 <span class="product-price strong-600"><span>₹</span> 2750</span>

                              </div>

                           </div>

                        </div>

                     </div>

                  </div>

                  <div class="col-xxl-3 col-xl-4 col-lg-3 col-md-4 col-6">

                     <div class="product-box-2 bg-white alt-box my-2  flip_product ">

                        <div class="position-relative overflow-hidden">

                              <img src="{{ asset('frontend/img/product/2.jpg') }}" width="100%">

                           <div class="product-btns clearfix">

                              <button class="btn add-wishlist" title="Add to Wishlist" onclick="addToWishList(150)" tabindex="0">

                              <i class="la la-heart-o"></i>

                              </button>

                              <button class="btn add-compare" title="Add to Compare" onclick="addToCompare(150)" tabindex="0">

                              <i class="la la-refresh"></i>

                              </button>

                              <button class="btn quick-view" title="Quick view" onclick="showAddToCartModal(150)" tabindex="0">

                              <i class="la la-eye"></i>

                              </button>

                           </div>

                        </div>

                        <div class="p-3 border-top">

                           <h2 class="product-title p-0 text-truncate">

                              <a href="details.html" tabindex="0">BLUE AND PINK DAPPLE ABAYA</a>

                           </h2>

                           <div class="star-rating mb-1">

                              <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>

                           </div>

                           <div class="clearfix">

                              <div class="price-box float-left">

                                 <del class="old-product-price strong-400"><span>₹</span> 5500</del>

                                 <span class="product-price strong-600"><span>₹</span> 2750</span>

                              </div>

                           </div>

                        </div>

                     </div>

                     

                  </div>

                  <div class="col-xxl-3 col-xl-4 col-lg-3 col-md-4 col-6">

                     <div class="product-box-2 bg-white alt-box my-2  flip_product ">

                        <div class="position-relative overflow-hidden">

                              <img src="{{ asset('frontend/img/product/3.jpg') }}" width="100%">

                           <div class="product-btns clearfix">

                              <button class="btn add-wishlist" title="Add to Wishlist" onclick="addToWishList(150)" tabindex="0">

                              <i class="la la-heart-o"></i>

                              </button>

                              <button class="btn add-compare" title="Add to Compare" onclick="addToCompare(150)" tabindex="0">

                              <i class="la la-refresh"></i>

                              </button>

                              <button class="btn quick-view" title="Quick view" onclick="showAddToCartModal(150)" tabindex="0">

                              <i class="la la-eye"></i>

                              </button>

                           </div>

                        </div>

                        <div class="p-3 border-top">

                           <h2 class="product-title p-0 text-truncate">

                              <a href="details.html" tabindex="0">BLUE AND PINK DAPPLE ABAYA</a>

                           </h2>

                           <div class="star-rating mb-1">

                              <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>

                           </div>

                           <div class="clearfix">

                              <div class="price-box float-left">

                                 <del class="old-product-price strong-400"><span>₹</span> 5500</del>

                                 <span class="product-price strong-600"><span>₹</span> 2750</span>

                              </div>

                           </div>

                        </div>

                     </div>

                     

                  </div> --}}

                  {{-- <div class="col-xxl-3 col-xl-4 col-lg-3 col-md-4 col-6">

                     <div class="product-box-2 bg-white alt-box my-2  flip_product ">

                        <div class="position-relative overflow-hidden">

                              <img src="{{ asset('frontend/img/product/4.jpg') }}" width="100%">

                           <div class="product-btns clearfix">

                              <button class="btn add-wishlist" title="Add to Wishlist" onclick="addToWishList(150)" tabindex="0">

                              <i class="la la-heart-o"></i>

                              </button>

                              <button class="btn add-compare" title="Add to Compare" onclick="addToCompare(150)" tabindex="0">

                              <i class="la la-refresh"></i>

                              </button>

                              <button class="btn quick-view" title="Quick view" onclick="showAddToCartModal(150)" tabindex="0">

                              <i class="la la-eye"></i>

                              </button>

                           </div>

                        </div>

                        <div class="p-3 border-top">

                           <h2 class="product-title p-0 text-truncate">

                              <a href="details.html" tabindex="0">BLUE AND PINK DAPPLE ABAYA</a>

                           </h2>

                           <div class="star-rating mb-1">

                              <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>

                           </div>

                           <div class="clearfix">

                              <div class="price-box float-left">

                                 <del class="old-product-price strong-400"><span>₹</span> 5500</del>

                                 <span class="product-price strong-600"><span>₹</span> 2750</span>

                              </div>

                           </div>

                        </div>

                     </div>

                  </div> --}}

               </div>

            </div>

         </div>

      </div>

   </div>

</section>

@endsection

@push('scripts')

<script type="text/javascript">

   var rangeSlider = function(){

      var slider = $('.range-slider'),

      range = $('.range-slider__range'),

      value = $('.range-slider__value');

          

      slider.each(function(){



      value.each(function(){

         var value = $(this).prev().attr('value');

            $(this).html(value);

         });



         range.on('input', function(){

            $(this).next(value).html(this.value);

         });

      });

   };

   rangeSlider();

</script>

@endpush