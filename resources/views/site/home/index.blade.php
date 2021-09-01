@extends('site.partials.app')

@section('title') {{ $pageTitle }} @endsection

@section('content')

<section class="banner pt-0 pb-5 ">
	<div class="row no-gutters position-relative">
		<div class="col-lg-12 col-xs-12 slider">
			<div class="slider-banner owl-carousel owl-theme">
				@if($banners)
				@foreach($banners as $n)
				<div class="item">
					<a href=""><img src="{{ asset('/banners/'.$n->image) }}" alt="Slider Image"></a>
				</div>
				@endforeach

				@endif  
			</div>
		</div>
	</div>
</section><!--banner-->

<section class="mb-4 d-none">

<div class="container">

   <div class="row gutters-10">

      <!--@if($categories)

      @foreach($categories as $n)

      <div class="media-banner mb-3 @if($n->name=='women'){{ 'mb-lg-0 banner-bottom' }} @elseif($n->name=='Man'){{'mb-lg-0'}} @elseif($n->name=='Girls'){{ 'mb-lg-0 banner-bottom' }} @elseif($n->name=='Boys'){{ 'mb-lg-0 banner-top' }} @elseif($n->name=='Hijab'){{ 'mb-lg-0 banner-top' }}@endif">

         <a href=""  class="banner-container">

         <img src="{{ asset('categories/'.$n->image) }}" alt="" class="img-fluid" >

         </a>

      </div>

      @endforeach

      @endif-->

      <div class="media-banner mb-3 mb-lg-0 banner-bottom">

         <a href="{!! URL::to('product-list/8/women') !!}"  class="banner-container">

         <img src="{{ asset('frontend/img/women.jpg') }}" alt="" class="img-fluid" >

         </a>

      </div>

      <div class="media-banner mb-3 mb-lg-0">

         <a href="{!! URL::to('product-list/9/men') !!}"  class="banner-container">

         <img src="{{ asset('frontend/img/men.jpg') }}" alt="" class="img-fluid" >

         </a>

      </div>

      <div class="media-banner mb-3 mb-lg-0 banner-bottom">

         <a href="{!! URL::to('product-list/10/girls') !!}"  class="banner-container">

         <img src="{{ asset('frontend/img/girls.jpg') }}" alt="" class="img-fluid">

         </a>

      </div>

      <div class="media-banner mb-3 mb-lg-0 banner-top" >

         <a href="{!! URL::to('product-list/17/boys') !!}"  class="banner-container">

         <img src="{{ asset('frontend/img/boys.jpg') }}" alt="" class="img-fluid">

         </a>

      </div>

      <div class="media-banner mb-3 mb-lg-0 banner-top">

         <a href="{!! URL::to('product-list/12/hijab') !!}"  class="banner-container">

         <img src="{{ asset('frontend/img/hijab.jpg') }}" alt="" class="img-fluid">

         </a>

      </div>

   </div>

</div>

</section>

<section class="mb-4 dk d-none">

<div class="container">

   <div class="row gutters-10">

      <!--@php $slno = 1;  @endphp

      @foreach($categories as $n)

      @php $key = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $n->name)) @endphp

      @if($slno!=3)

       <div class="col-lg-4 col-md-4">

         <div class="media-banner mb-3 mb-lg-0 @if($slno == 1 || $slno == 2){{ 'banner-bottom' }} @elseif($slno == 3 || $slno == 4){{ 'banner-top' }}@endif">

            <a href="{!! URL::to('product-list/'.$n->id.'/'.$key) !!}"  class="banner-container">

            <img src="{{ asset('categories/'.$n->image) }}" alt="" class="img-fluid" >

            </a>

         </div>

      </div>

      @else

      <div class="col-lg-4 col-md-4">

         <div class="media-banner mb-3 mb-lg-0">

            <a href="{!! URL::to('product-list/'.$n->id.'/'.$key) !!}" class="banner-container">

            <img src="{{ asset('categories/'.$n->image) }}" alt="" class="img-fluid" >

            </a>

         </div>

      </div>

      @endif

      @php $slno++; @endphp

      @endforeach-->

      

      <div class="col-lg-4 col-md-4">

         <div class="media-banner mb-3 mb-lg-0 banner-bottom">

            <a href="{!! URL::to('product-list/8/women') !!}"  class="banner-container">

            <img src="{{ asset('frontend/img/357_300women.jpg') }}" alt="" class="img-fluid" >

            </a>

         </div>

         <div class="media-banner mb-3 mb-lg-0 banner-bottom">

            <a href="{!! URL::to('product-list/10/girls') !!}"  class="banner-container">

            <img src="{{ asset('frontend/img/357_190_girls.jpg') }}" alt="" class="img-fluid">

            </a>

         </div>

      </div>



      <div class="col-lg-4 col-md-4">

         <div class="media-banner mb-3 mb-lg-0">

            <a href="{!! URL::to('product-list/9/men') !!}"  class="banner-container">

            <img src="{{ asset('frontend/img/377_500_men.jpg') }}" alt="" class="img-fluid" >

            </a>

         </div>

      </div>



      <div class="col-lg-4 col-md-4">

         <div class="media-banner mb-3 mb-lg-0 banner-top">

            <a href="{!! URL::to('product-list/17/boys') !!}"  class="banner-container">

            <img src="{{ asset('frontend/img/357_300boys.jpg') }}" alt="" class="img-fluid">

            </a>

         </div>

         <div class="media-banner mb-3 mb-lg-0 banner-top">

            <a href="{!! URL::to('product-list/12/hijab') !!}"  class="banner-container">

            <img src="{{ asset('frontend/img/357_190_hijab.jpg') }}" alt="" class="img-fluid">

            </a>

         </div>

      </div>

      {{-- <div class="col-lg-4 col-md-4">

         <div class="media-banner mb-3 mb-lg-0 banner-top">

            <a href="list.html"  class="banner-container">

            <img src="{{ asset('frontend/img/357_300boys.jpg') }}" alt="" class="img-fluid">

            </a>

         </div>

         <div class="media-banner mb-3 mb-lg-0 banner-top">

            <a href="list.html"  class="banner-container">

            <img src="{{ asset('frontend/img/357_190_hijab.jpg') }}" alt="" class="img-fluid">

            </a>

         </div>

      </div> --}}



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

         @if($flashdeals)

         @foreach($flashdeals as $n)

         @php $key = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $n->name)) @endphp
		 
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

				<a href="{!!URL::to('details/'.$n->id.'/'.$key)!!}" class="d-block">

					<img src="{{ asset('books/'.$n->image) }}" width="100%">

				</a>

				<div class="product-info text-center">
					<h5 class="product-name">
						<a href="{!!URL::to('details/'.$n->id.'/'.$key)!!}" tabindex="0">{{ $n->name }}</a>
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
								<span>₹</span> {{ $n->inprice }}
							</del>
							<ins>
								<span>₹</span> {{ $n->inoffered_price }}
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

                     <a href="{!!URL::to('details/'.$n->id.'/'.$key)!!}" class="d-block">

                     <img src="{{ asset('books/'.$n->image) }}" width="100%">

                     </a>

                  </div>

                  <div class="p-3">

                     <div class="price-box">

                        <del class="old-product-price strong-400"><span>₹</span> {{ $n->inprice }}</del>

                        <span class="product-price strong-600"><span>₹</span> {{ $n->inoffered_price }}</span>

                     </div>

                     <div class="star-rating star-rating-sm mt-1">

                        <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>

                     </div>

                     <h1 class="product-title p-0 text-truncate-2">

                        <a href="{!!URL::to('details/'.$n->id.'/'.$key)!!}">{{ $n->name }}</a>

                     </h1>

                  </div>

               </div>

            </div>

         @endforeach

         @endif



            {{-- <div class="product-card-2 card card-product m-2 shop-cards shop-tech">

               <div class="card-body p-0">

                  <div class="card-image">

                     <a href="" class="d-block">

                     <img src="{{ asset('frontend/img/product/2.jpg') }}" width="100%">

                     </a>

                  </div>

                  <div class="p-3">

                     <div class="price-box">

                        <del class="old-product-price strong-400"><span>₹</span> 2499</del>

                        <span class="product-price strong-600"><span>₹</span> 1250</span>

                     </div>

                     <div class="star-rating star-rating-sm mt-1">

                        <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>

                     </div>

                     <h1 class="product-title p-0 text-truncate-2">

                        <a href="">AL MARJAAN MENS</a>

                     </h1>

                  </div>

               </div>

            </div>

            <div class="product-card-2 card card-product m-2 shop-cards shop-tech">

               <div class="card-body p-0">

                  <div class="card-image">

                     <a href="" class="d-block">

                     <img src="{{ asset('frontend/img/product/3.jpg') }}" width="100%">

                     </a>

                  </div>

                  <div class="p-3">

                     <div class="price-box">

                        <del class="old-product-price strong-400"><span>₹</span> 3199</del>

                        <span class="product-price strong-600"><span>₹</span> 1600</span>

                     </div>

                     <div class="star-rating star-rating-sm mt-1">

                        <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>

                     </div>

                     <h1 class="product-title p-0 text-truncate-2">

                        <a href="">ORNATE GREY &amp; WHITE</a>

                     </h1>

                  </div>

               </div>

            </div>

            <div class="product-card-2 card card-product m-2 shop-cards shop-tech">

               <div class="card-body p-0">

                  <div class="card-image">

                     <a href="" class="d-block">

                     <img src="{{ asset('frontend/img/product/4.jpg') }}" width="100%">

                     </a>

                  </div>

                  <div class="p-3">

                     <div class="price-box">

                        <del class="old-product-price strong-400"><span>₹</span> 2799</del>

                        <span class="product-price strong-600"><span>₹</span> 1400</span>

                     </div>

                     <div class="star-rating star-rating-sm mt-1">

                        <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>

                     </div>

                     <h1 class="product-title p-0 text-truncate-2">

                        <a href="">MOONWALKER</a>

                     </h1>

                  </div>

               </div>

            </div>

            <div class="product-card-2 card card-product m-2 shop-cards shop-tech">

               <div class="card-body p-0">

                  <div class="card-image">

                     <a href="" class="d-block">

                     <img src="{{ asset('frontend/img/product/5.jpg') }}" width="100%">

                     </a>

                  </div>

                  <div class="p-3">

                     <div class="price-box">

                        <del class="old-product-price strong-400"><span>₹</span> 2499</del>

                        <span class="product-price strong-600"><span>₹</span> 1250</span>

                     </div>

                     <div class="star-rating star-rating-sm mt-1">

                        <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>

                     </div>

                     <h1 class="product-title p-0 text-truncate-2">

                        <a href="">BRAZEN GREY</a>

                     </h1>

                  </div>

               </div>

            </div>

            <div class="product-card-2 card card-product m-2 shop-cards shop-tech">

               <div class="card-body p-0">

                  <div class="card-image">

                     <a href="" class="d-block">

                     <img src="{{ asset('frontend/img/product/6.jpg') }}" width="100%">

                     </a>

                  </div>

                  <div class="p-3">

                     <div class="price-box">

                        <del class="old-product-price strong-400"><span>₹</span> 2499</del>

                        <span class="product-price strong-600"><span>₹</span> 1250</span>

                     </div>

                     <div class="star-rating star-rating-sm mt-1">

                        <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>

                     </div>

                     <h1 class="product-title p-0 text-truncate-2">

                        <a href="">SINCH</a>

                     </h1>

                  </div>

               </div>

            </div>

            <div class="product-card-2 card card-product m-2 shop-cards shop-tech">

               <div class="card-body p-0">

                  <div class="card-image">

                     <a href="" class="d-block">

                     <img src="{{ asset('frontend/img/product/7.jpg') }}" width="100%">

                     </a>

                  </div>

                  <div class="p-3">

                     <div class="price-box">

                        <del class="old-product-price strong-400"><span>₹</span> 2499</del>

                        <span class="product-price strong-600"><span>₹</span> 1250</span>

                     </div>

                     <div class="star-rating star-rating-sm mt-1">

                        <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>

                     </div>

                     <h1 class="product-title p-0 text-truncate-2">

                        <a href="">BLUE ZIPPER</a>

                     </h1>

                  </div>

               </div>

            </div>

            <div class="product-card-2 card card-product m-2 shop-cards shop-tech">

               <div class="card-body p-0">

                  <div class="card-image">

                     <a href="" class="d-block">

                     <img src="{{ asset('frontend/img/product/8.jpg') }}" width="100%">

                     </a>

                  </div>

                  <div class="p-3">

                     <div class="price-box">

                        <del class="old-product-price strong-400"><span>₹</span> 2499</del>

                        <span class="product-price strong-600"><span>₹</span> 1250</span>

                     </div>

                     <div class="star-rating star-rating-sm mt-1">

                        <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>

                     </div>

                     <h1 class="product-title p-0 text-truncate-2">

                        <a href="">BROWN ABSTRACT</a>

                     </h1>

                  </div>

               </div>

            </div> --}}

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

         @if($trending)

         @foreach($trending as $n)

         @php $key = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $n->name)) @endphp
       
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

            <a href="{!!URL::to('details/'.$n->id.'/'.$key)!!}" class="d-block">

               <img src="{{ asset('books/'.$n->image) }}" width="100%">

            </a>

            <div class="product-info text-center">
               <h5 class="product-name">
                  <a href="{!!URL::to('details/'.$n->id.'/'.$key)!!}" tabindex="0">{{ $n->name }}</a>
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
                        <span>₹</span> {{ $n->inprice }}
                     </del>
                     <ins>
                        <span>₹</span> {{ $n->inoffered_price }}
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

                     <a href="{!!URL::to('details/'.$n->id.'/'.$key)!!}" class="d-block">

                     <img src="{{ asset('books/'.$n->image) }}" width="100%">

                     </a>

                  </div>

                  <div class="p-3">

                     <div class="price-box">

                        <del class="old-product-price strong-400"><span>₹</span> {{ $n->inprice }}</del>

                        <span class="product-price strong-600"><span>₹</span> {{ $n->inoffered_price }}</span>

                     </div>

                     <div class="star-rating star-rating-sm mt-1">

                        <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>

                     </div>

                     <h1 class="product-title p-0 text-truncate-2">

                        <a href="{!!URL::to('details/'.$n->id.'/'.$key)!!}">{{ $n->name }}</a>

                     </h1>

                  </div>

               </div>

            </div>

         @endforeach

         @endif

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

               @if($womentrending)

               @foreach($womentrending as $n)

                @php $key = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $n->name)) @endphp
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

						<a href="{!! URL::to('details/'.$n->id.'/'.$key) !!}" class="d-block product-image">

							<img src="{{ asset('books/'.$n->image) }}" width="100%">

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
							<a href="{{ route('site.add.compare',$n->id) }}" title="Add to Compare" onclick="addToCompare(306)" tabindex="0">
							<div class="quick-cart">
								<i class="ti-reload"></i>
							</div>
							</a>
							<a htitle="Quick view" href="{!! URL::to('details/'.$n->id.'/'.$key) !!}" tabindex="0">
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

                        <a href="{!! URL::to('details/'.$n->id.'/'.$key) !!}" class="d-block product-image h-100">

                        <img src="{{ asset('books/'.$n->image) }}" width="100%">

                        </a>

                        <div class="product-btns clearfix">

                           <a class="btn add-wishlist" title="Add to Wishlist" href="{{ route('site.addwistlist',$n->id) }}" tabindex="0">

                           <i class="fa fa-heart-o"></i>

                           </a>

                           

                            <a href="{{ route('site.add.compare',$n->id) }}" class="btn add-compare" title="Add to Compare" onclick="addToCompare(306)" tabindex="0">

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

               </div>

               @endforeach

               @endif



               {{-- <div class="col-xl-4 col-lg-6 col-md-6 col-12">

                  <div class="product-box-2 bg-white alt-box my-2">

                     <div class="position-relative overflow-hidden">

                        <a href="" class="d-block product-image h-100">

                        <img src="{{ asset('frontend/img/product/2.jpg') }}" width="100%">

                        </a>

                        <div class="product-btns clearfix">

                           <button class="btn add-wishlist" title="Add to Wishlist" onclick="addToWishList(264)" tabindex="0">

                           <i class="fa fa-heart-o"></i>

                           </button>

                           <button class="btn add-compare" title="Add to Compare" onclick="addToCompare(264)" tabindex="0">

                           <i class="fa fa-refresh"></i>

                           </button>

                           <button class="btn quick-view" title="Quick view" onclick="showAddToCartModal(264)" tabindex="0">

                           <i class="fa fa-eye"></i>

                           </button>

                        </div>

                     </div>

                     <div class="p-3 border-top">

                        <h2 class="product-title p-0 text-truncate">

                           <a href="" tabindex="0">BLUE CHECKERED SLEEVES ~ Casual wear jilbab dress for women</a>

                        </h2>

                        <div class="star-rating mb-1">

                           <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>

                        </div>

                        <div class="clearfix">

                           <div class="price-box float-left">

                              <del class="old-product-price strong-400"><span>₹</span> 4000</del>

                              <span class="product-price strong-600"><span>₹</span> 2399</span>

                           </div>

                        </div>

                     </div>

                  </div>

               </div>



               <div class="col-xl-4 col-lg-6 col-md-6 col-12">

                  <div class="product-box-2 bg-white alt-box my-2">

                     <div class="position-relative overflow-hidden">

                        <a href="" class="d-block product-image h-100">

                        <img src="{{ asset('frontend/img/product/3.jpg') }}" width="100%">

                        </a>

                        <div class="product-btns clearfix">

                           <button class="btn add-wishlist" title="Add to Wishlist" onclick="addToWishList(263)" tabindex="0">

                           <i class="fa fa-heart-o"></i>

                           </button>

                           <button class="btn add-compare" title="Add to Compare" onclick="addToCompare(263)" tabindex="0">

                           <i class="fa fa-refresh"></i>

                           </button>

                           <button class="btn quick-view" title="Quick view" onclick="showAddToCartModal(263)" tabindex="0">

                           <i class="fa fa-eye"></i>

                           </button>

                        </div>

                     </div>

                     <div class="p-3 border-top">

                        <h2 class="product-title p-0 text-truncate">

                           <a href="" tabindex="0">BLUE &amp; WHITE EMPIRE WAST ~ Casual wear jilbab dress for women</a>

                        </h2>

                        <div class="star-rating mb-1">

                           <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>

                        </div>

                        <div class="clearfix">

                           <div class="price-box float-left">

                              <del class="old-product-price strong-400"><span>₹</span> 4200</del>

                              <span class="product-price strong-600"><span>₹</span> 2999</span>

                           </div>

                        </div>

                     </div>

                  </div>

               </div>

               <div class="col-xl-4 col-lg-6 col-md-6 col-12">

                  <div class="product-box-2 bg-white alt-box my-2">

                     <div class="position-relative overflow-hidden">

                        <a href="" class="d-block product-image h-100">

                        <img src="{{ asset('frontend/img/product/4.jpg') }}" width="100%">

                        </a>

                        <div class="product-btns clearfix">

                           <button class="btn add-wishlist" title="Add to Wishlist" onclick="addToWishList(246)" tabindex="0">

                           <i class="fa fa-heart-o"></i>

                           </button>

                           <button class="btn add-compare" title="Add to Compare" onclick="addToCompare(246)" tabindex="0">

                           <i class="fa fa-refresh"></i>

                           </button>

                           <button class="btn quick-view" title="Quick view" onclick="showAddToCartModal(246)" tabindex="0">

                           <i class="fa fa-eye"></i>

                           </button>

                        </div>

                     </div>

                     <div class="p-3 border-top">

                        <h2 class="product-title p-0 text-truncate">

                           <a href="" tabindex="0">THE PINK CAPOTE ~ Shrug abaya for women</a>

                        </h2>

                        <div class="star-rating mb-1">

                           <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>

                        </div>

                        <div class="clearfix">

                           <div class="price-box float-left">

                              <del class="old-product-price strong-400"><span>₹</span> 4000</del>

                              <span class="product-price strong-600"><span>₹</span> 2799</span>

                           </div>

                        </div>

                     </div>

                  </div>

               </div>

               <div class="col-xl-4 col-lg-6 col-md-6 col-12">

                  <div class="product-box-2 bg-white alt-box my-2">

                     <div class="position-relative overflow-hidden">

                        <a href="" class="d-block product-image h-100">

                        <img src="{{ asset('frontend/img/product/5.jpg') }}" width="100%">

                        </a>

                        <div class="product-btns clearfix">

                           <button class="btn add-wishlist" title="Add to Wishlist" onclick="addToWishList(244)" tabindex="0">

                           <i class="fa fa-heart-o"></i>

                           </button>

                           <button class="btn add-compare" title="Add to Compare" onclick="addToCompare(244)" tabindex="0">

                           <i class="fa fa-refresh"></i>

                           </button>

                           <button class="btn quick-view" title="Quick view" onclick="showAddToCartModal(244)" tabindex="0">

                           <i class="fa fa-eye"></i>

                           </button>

                        </div>

                     </div>

                     <div class="p-3 border-top">

                        <h2 class="product-title p-0 text-truncate">

                           <a href="" tabindex="0">BLACK &amp; GREEN CAPE COAT ~ Shrug abaya for women</a>

                        </h2>

                        <div class="star-rating mb-1">

                           <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>

                        </div>

                        <div class="clearfix">

                           <div class="price-box float-left">

                              <del class="old-product-price strong-400"><span>₹</span> 4000</del>

                              <span class="product-price strong-600"><span>₹</span> 2799</span>

                           </div>

                        </div>

                     </div>

                  </div>

               </div>

               <div class="col-xl-4 col-lg-6 col-md-6 col-12">

                  <div class="product-box-2 bg-white alt-box my-2">

                     <div class="position-relative overflow-hidden">

                        <a href="" class="d-block product-image h-100">

                        <img src="{{ asset('frontend/img/product/6.jpg') }}" width="100%">

                        </a>

                        <div class="product-btns clearfix">

                           <button class="btn add-wishlist" title="Add to Wishlist" onclick="addToWishList(149)" tabindex="0">

                           <i class="fa fa-heart-o"></i>

                           </button>

                           <button class="btn add-compare" title="Add to Compare" onclick="addToCompare(149)" tabindex="0">

                           <i class="fa fa-refresh"></i>

                           </button>

                           <button class="btn quick-view" title="Quick view" onclick="showAddToCartModal(149)" tabindex="0">

                           <i class="fa fa-eye"></i>

                           </button>

                        </div>

                     </div>

                     <div class="p-3 border-top">

                        <h2 class="product-title p-0 text-truncate">

                           <a href="product/BLACK-MOTLED-Everyday-wear-jilbab-dress-for-women-dwyw7.html" tabindex="0">BLACK MOTLED ~ Everyday wear jilbab dress for women</a>

                        </h2>

                        <div class="star-rating mb-1">

                           <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>

                        </div>

                        <div class="clearfix">

                           <div class="price-box float-left">

                              <del class="old-product-price strong-400"><span>₹</span> 4800</del>

                              <span class="product-price strong-600"><span>₹</span> 2799</span>

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

              @if($mentrending)

              @foreach($mentrending as $n)

              @php $key = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $n->name)) @endphp
			  
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

					<a href="{!! URL::to('details/'.$n->id.'/'.$key) !!}" class="d-block product-image h-100">

						<img src="{{ asset('books/'.$n->image) }}" width="100%">

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
			  

               <div class="col-xl-4 col-lg-6 col-md-6 col-12 d-none">

                  <div class="product-box-2 bg-white alt-box my-2">

                     <div class="position-relative overflow-hidden">

                        <a href="{!! URL::to('details/'.$n->id.'/'.$key) !!}" class="d-block product-image h-100">

                        <img src="{{ asset('books/'.$n->image) }}" width="100%">

                        </a>

                        <div class="product-btns clearfix">

                           <a class="btn add-wishlist" title="Add to Wishlist" href="{{ route('site.addwistlist',$n->id) }}" tabindex="0">

                           <i class="fa fa-heart-o"></i>

                           </a>

                           

                           <a href="{{ route('site.add.compare',$n->id) }}" class="btn add-compare" title="Add to Compare" tabindex="0">

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

               </div>

               @endforeach

               @endif



               {{-- <div class="col-xl-4 col-lg-6 col-md-6 col-12">

                  <div class="product-box-2 bg-white alt-box my-2">

                     <div class="position-relative overflow-hidden">

                        <a href="" class="d-block product-image h-100">

                        <img src="{{ asset('frontend/img/product/2.jpg') }}" width="100%">

                        </a>

                        <div class="product-btns clearfix">

                           <button class="btn add-wishlist" title="Add to Wishlist" onclick="addToWishList(231)" tabindex="0">

                           <i class="fa fa-heart-o"></i>

                           </button>

                           <button class="btn add-compare" title="Add to Compare" onclick="addToCompare(231)" tabindex="0">

                           <i class="fa fa-refresh"></i>

                           </button>

                           <button class="btn quick-view" title="Quick view" onclick="showAddToCartModal(231)" tabindex="0">

                           <i class="fa fa-eye"></i>

                           </button>

                        </div>

                     </div>

                     <div class="p-3 border-top">

                        <h2 class="product-title p-0 text-truncate">

                           <a href="" tabindex="0">WHITE CLASSIC EMRATI</a>

                        </h2>

                        <div class="star-rating mb-1">

                           <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>

                        </div>

                        <div class="clearfix">

                           <div class="price-box float-left">

                              <del class="old-product-price strong-400"><span>₹</span> 2999</del>

                              <span class="product-price strong-600"><span>₹</span> 2399</span>

                           </div>

                        </div>

                     </div>

                  </div>

               </div>



               <div class="col-xl-4 col-lg-6 col-md-6 col-12">

                  <div class="product-box-2 bg-white alt-box my-2">

                     <div class="position-relative overflow-hidden">

                        <a href="" class="d-block product-image h-100">

                        <img src="{{ asset('frontend/img/product/3.jpg') }}" width="100%">

                        </a>

                        <div class="product-btns clearfix">

                           <button class="btn add-wishlist" title="Add to Wishlist" onclick="addToWishList(139)" tabindex="0">

                           <i class="fa fa-heart-o"></i>

                           </button>

                           <button class="btn add-compare" title="Add to Compare" onclick="addToCompare(139)" tabindex="0">

                           <i class="fa fa-refresh"></i>

                           </button>

                           <button class="btn quick-view" title="Quick view" onclick="showAddToCartModal(139)" tabindex="0">

                           <i class="fa fa-eye"></i>

                           </button>

                        </div>

                     </div>

                     <div class="p-3 border-top">

                        <h2 class="product-title p-0 text-truncate">

                           <a href="" tabindex="0">NEW GREEN SIMPLE SAUDI</a>

                        </h2>

                        <div class="star-rating mb-1">

                           <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>

                        </div>

                        <div class="clearfix">

                           <div class="price-box float-left">

                              <del class="old-product-price strong-400"><span>₹</span> 2999</del>

                              <span class="product-price strong-600"><span>₹</span> 2399</span>

                           </div>

                        </div>

                     </div>

                  </div>

               </div>



               <div class="col-xl-4 col-lg-6 col-md-6 col-12">

                  <div class="product-box-2 bg-white alt-box my-2">

                     <div class="position-relative overflow-hidden">

                        <a href="" class="d-block product-image h-100">

                        <img src="{{ asset('frontend/img/product/4.jpg') }}" width="100%">

                        </a>

                        <div class="product-btns clearfix">

                           <button class="btn add-wishlist" title="Add to Wishlist" onclick="addToWishList(130)" tabindex="0">

                           <i class="fa fa-heart-o"></i>

                           </button>

                           <button class="btn add-compare" title="Add to Compare" onclick="addToCompare(130)" tabindex="0">

                           <i class="fa fa-refresh"></i>

                           </button>

                           <button class="btn quick-view" title="Quick view" onclick="showAddToCartModal(130)" tabindex="0">

                           <i class="fa fa-eye"></i>

                           </button>

                        </div>

                     </div>

                     <div class="p-3 border-top">

                        <h2 class="product-title p-0 text-truncate">

                           <a href="" tabindex="0">BLACK TWILL EMRATI</a>

                        </h2>

                        <div class="star-rating mb-1">

                           <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>

                        </div>

                        <div class="clearfix">

                           <div class="price-box float-left">

                              <del class="old-product-price strong-400"><span>₹</span> 2999</del>

                              <span class="product-price strong-600"><span>₹</span> 2399</span>

                           </div>

                        </div>

                     </div>

                  </div>

               </div>



               <div class="col-xl-4 col-lg-6 col-md-6 col-12">

                  <div class="product-box-2 bg-white alt-box my-2">

                     <div class="position-relative overflow-hidden">

                        <a href="" class="d-block product-image h-100">

                        <img src="{{ asset('frontend/img/product/5.jpg') }}" width="100%">

                        </a>

                        <div class="product-btns clearfix">

                           <button class="btn add-wishlist" title="Add to Wishlist" onclick="addToWishList(34)" tabindex="0">

                           <i class="fa fa-heart-o"></i>

                           </button>

                           <button class="btn add-compare" title="Add to Compare" onclick="addToCompare(34)" tabindex="0">

                           <i class="fa fa-refresh"></i>

                           </button>

                           <button class="btn quick-view" title="Quick view" onclick="showAddToCartModal(34)" tabindex="0">

                           <i class="fa fa-eye"></i>

                           </button>

                        </div>

                     </div>

                     <div class="p-3 border-top">

                        <h2 class="product-title p-0 text-truncate">

                           <a href="" tabindex="0">DENIM CAVALLEAR MENS</a>

                        </h2>

                        <div class="star-rating mb-1">

                           <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>

                        </div>

                        <div class="clearfix">

                           <div class="price-box float-left">

                              <del class="old-product-price strong-400"><span>₹</span> 2499</del>

                              <span class="product-price strong-600"><span>₹</span> 1999</span>

                           </div>

                        </div>

                     </div>

                  </div>

               </div>



               <div class="col-xl-4 col-lg-6 col-md-6 col-12">

                  <div class="product-box-2 bg-white alt-box my-2">

                     <div class="position-relative overflow-hidden">

                        <a href="" class="d-block product-image h-100">

                        <img src="{{ asset('frontend/img/product/6.jpg') }}" width="100%">

                        </a>

                        <div class="product-btns clearfix">

                           <button class="btn add-wishlist" title="Add to Wishlist" onclick="addToWishList(32)" tabindex="0">

                           <i class="fa fa-heart-o"></i>

                           </button>

                           <button class="btn add-compare" title="Add to Compare" onclick="addToCompare(32)" tabindex="0">

                           <i class="fa fa-refresh"></i>

                           </button>

                           <button class="btn quick-view" title="Quick view" onclick="showAddToCartModal(32)" tabindex="0">

                           <i class="fa fa-eye"></i>

                           </button>

                        </div>

                     </div>

                     <div class="p-3 border-top">

                        <h2 class="product-title p-0 text-truncate">

                           <a href="" tabindex="0">DRY FITTER</a>

                        </h2>

                        <div class="star-rating mb-1">

                           <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>

                        </div>

                        <div class="clearfix">

                           <div class="price-box float-left">

                              <del class="old-product-price strong-400"><span>₹</span> 2499</del>

                              <span class="product-price strong-600"><span>₹</span> 1999</span>

                           </div>

                        </div>

                     </div>

                  </div>

               </div>

            </div>

         </div>

         <div class="tab-pane fade " id="subsubcat-22">

            <div class="row gutters-5 sm-no-gutters">

               <div class="col-xl-4 col-lg-6 col-md-6 col-12">

                  <div class="product-box-2 bg-white alt-box my-2">

                     <div class="position-relative overflow-hidden">

                        <a href="" class="d-block product-image h-100">

                        <img src="{{ asset('frontend/img/product/7.jpg') }}" width="100%">

                        </a>

                        <div class="product-btns clearfix">

                           <button class="btn add-wishlist" title="Add to Wishlist" onclick="addToWishList(275)" tabindex="0">

                           <i class="fa fa-heart-o"></i>

                           </button>

                           <button class="btn add-compare" title="Add to Compare" onclick="addToCompare(275)" tabindex="0">

                           <i class="fa fa-refresh"></i>

                           </button>

                           <button class="btn quick-view" title="Quick view" onclick="showAddToCartModal(275)" tabindex="0">

                           <i class="fa fa-eye"></i>

                           </button>

                        </div>

                     </div>

                     <div class="p-3 border-top">

                        <h2 class="product-title p-0 text-truncate">

                           <a href="" tabindex="0">GOLD PATHANI SUIT FOR MEN</a>

                        </h2>

                        <div class="star-rating mb-1">

                           <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>

                        </div>

                        <div class="clearfix">

                           <div class="price-box float-left">

                              <del class="old-product-price strong-400"><span>₹</span> 3000</del>

                              <span class="product-price strong-600"><span>₹</span> 1500</span>

                           </div>

                        </div>

                     </div>

                  </div>

               </div>

               <div class="col-xl-4 col-lg-6 col-md-6 col-12">

                  <div class="product-box-2 bg-white alt-box my-2">

                     <div class="position-relative overflow-hidden">

                        <a href="" class="d-block product-image h-100">

                        <img src="{{ asset('frontend/img/product/8.jpg') }}" width="100%">

                        </a>

                        <div class="product-btns clearfix">

                           <button class="btn add-wishlist" title="Add to Wishlist" onclick="addToWishList(231)" tabindex="0">

                           <i class="fa fa-heart-o"></i>

                           </button>

                           <button class="btn add-compare" title="Add to Compare" onclick="addToCompare(231)" tabindex="0">

                           <i class="fa fa-refresh"></i>

                           </button>

                           <button class="btn quick-view" title="Quick view" onclick="showAddToCartModal(231)" tabindex="0">

                           <i class="fa fa-eye"></i>

                           </button>

                        </div>

                     </div>

                     <div class="p-3 border-top">

                        <h2 class="product-title p-0 text-truncate">

                           <a href="" tabindex="0">WHITE CLASSIC EMRATI</a>

                        </h2>

                        <div class="star-rating mb-1">

                           <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>

                        </div>

                        <div class="clearfix">

                           <div class="price-box float-left">

                              <del class="old-product-price strong-400"><span>₹</span> 2999</del>

                              <span class="product-price strong-600"><span>₹</span> 2399</span>

                           </div>

                        </div>

                     </div>

                  </div>

               </div>

               <div class="col-xl-4 col-lg-6 col-md-6 col-12">

                  <div class="product-box-2 bg-white alt-box my-2">

                     <div class="position-relative overflow-hidden">

                        <<a href="" class="d-block product-image h-100">

                        <img src="{{ asset('frontend/img/product/1.jpg') }}" width="100%">

                        </a>

                        <div class="product-btns clearfix">

                           <button class="btn add-wishlist" title="Add to Wishlist" onclick="addToWishList(139)" tabindex="0">

                           <i class="fa fa-heart-o"></i>

                           </button>

                           <button class="btn add-compare" title="Add to Compare" onclick="addToCompare(139)" tabindex="0">

                           <i class="fa fa-refresh"></i>

                           </button>

                           <button class="btn quick-view" title="Quick view" onclick="showAddToCartModal(139)" tabindex="0">

                           <i class="fa fa-eye"></i>

                           </button>

                        </div>

                     </div>

                     <div class="p-3 border-top">

                        <h2 class="product-title p-0 text-truncate">

                           <a href="" tabindex="0">NEW GREEN SIMPLE SAUDI</a>

                        </h2>

                        <div class="star-rating mb-1">

                           <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>

                        </div>

                        <div class="clearfix">

                           <div class="price-box float-left">

                              <del class="old-product-price strong-400"><span>₹</span> 2999</del>

                              <span class="product-price strong-600"><span>₹</span> 2399</span>

                           </div>

                        </div>

                     </div>

                  </div>

               </div>

               <div class="col-xl-4 col-lg-6 col-md-6 col-12">

                  <div class="product-box-2 bg-white alt-box my-2">

                     <div class="position-relative overflow-hidden">

                        <a href="" class="d-block product-image h-100">

                        <img src="{{ asset('frontend/img/product/2.jpg') }}" width="100%">

                        </a>

                        <div class="product-btns clearfix">

                           <button class="btn add-wishlist" title="Add to Wishlist" onclick="addToWishList(130)" tabindex="0">

                           <i class="fa fa-heart-o"></i>

                           </button>

                           <button class="btn add-compare" title="Add to Compare" onclick="addToCompare(130)" tabindex="0">

                           <i class="fa fa-refresh"></i>

                           </button>

                           <button class="btn quick-view" title="Quick view" onclick="showAddToCartModal(130)" tabindex="0">

                           <i class="fa fa-eye"></i>

                           </button>

                        </div>

                     </div>

                     <div class="p-3 border-top">

                        <h2 class="product-title p-0 text-truncate">

                           <a href="" tabindex="0">BLACK TWILL EMRATI</a>

                        </h2>

                        <div class="star-rating mb-1">

                           <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>

                        </div>

                        <div class="clearfix">

                           <div class="price-box float-left">

                              <del class="old-product-price strong-400"><span>₹</span> 2999</del>

                              <span class="product-price strong-600"><span>₹</span> 2399</span>

                           </div>

                        </div>

                     </div>

                  </div>

               </div>

               <div class="col-xl-4 col-lg-6 col-md-6 col-12">

                  <div class="product-box-2 bg-white alt-box my-2">

                     <div class="position-relative overflow-hidden">

                        <a href="" class="d-block product-image h-100">

                        <img src="{{ asset('frontend/img/product/3.jpg') }}" width="100%">

                        </a>

                        <div class="product-btns clearfix">

                           <button class="btn add-wishlist" title="Add to Wishlist" onclick="addToWishList(34)" tabindex="0">

                           <i class="fa fa-heart-o"></i>

                           </button>

                           <button class="btn add-compare" title="Add to Compare" onclick="addToCompare(34)" tabindex="0">

                           <i class="fa fa-refresh"></i>

                           </button>

                           <button class="btn quick-view" title="Quick view" onclick="showAddToCartModal(34)" tabindex="0">

                           <i class="fa fa-eye"></i>

                           </button>

                        </div>

                     </div>

                     <div class="p-3 border-top">

                        <h2 class="product-title p-0 text-truncate">

                           <a href="" tabindex="0">DENIM CAVALLEAR MENS</a>

                        </h2>

                        <div class="star-rating mb-1">

                           <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>

                        </div>

                        <div class="clearfix">

                           <div class="price-box float-left">

                              <del class="old-product-price strong-400"><span>₹</span> 2499</del>

                              <span class="product-price strong-600"><span>₹</span> 1999</span>

                           </div>

                        </div>

                     </div>

                  </div>

               </div> --}}

               {{-- <div class="col-xl-4 col-lg-6 col-md-6 col-12">

                  <div class="product-box-2 bg-white alt-box my-2">

                     <div class="position-relative overflow-hidden">

                        <a href="" class="d-block product-image h-100">

                        <img src="{{ asset('frontend/img/product/3.jpg') }}" width="100%">

                        </a>

                        <div class="product-btns clearfix">

                           <button class="btn add-wishlist" title="Add to Wishlist" onclick="addToWishList(32)" tabindex="0">

                           <i class="fa fa-heart-o"></i>

                           </button>

                           <button class="btn add-compare" title="Add to Compare" onclick="addToCompare(32)" tabindex="0">

                           <i class="fa fa-refresh"></i>

                           </button>

                           <button class="btn quick-view" title="Quick view" onclick="showAddToCartModal(32)" tabindex="0">

                           <i class="fa fa-eye"></i>

                           </button>

                        </div>

                     </div>

                     <div class="p-3 border-top">

                        <h2 class="product-title p-0 text-truncate">

                           <a href="" tabindex="0">DRY FITTER</a>

                        </h2>

                        <div class="star-rating mb-1">

                           <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>

                        </div>

                        <div class="clearfix">

                           <div class="price-box float-left">

                              <del class="old-product-price strong-400"><span>₹</span> 2499</del>

                              <span class="product-price strong-600"><span>₹</span> 1999</span>

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



           @if($ProductReview)

           @foreach($ProductReview as $n)

            <div class="product-card-2 card card-product m-2 shop-cards shop-tech">

               <div class="card-body p-3" style="text-align:center">

                  <div class="card-image">

                     <img src="{{ asset('frontend/img/review/new-google-favicon-512.png') }}" style="float:right" height="30px">  

                  </div>

                  <div class="card-image pt-5">

                     <a href="#" class="d-d-block product-image h-100" tabindex="0">

                     <img src="{{ asset('frontend/img/review/icon%20male.png') }}" style="margin:auto; border-radius:50%" height="60px"> 

                     </a>

                  </div>

                  <div class="p-3">

                     <div class="price-box">

                        <span class="product-price strong-600">{{ empty($n->user->name) ? '' :$n->user->name }}</span>

                     </div>

                     <div class="star-rating star-rating-sm mt-1 clr">

                        @php for ($i=0; $i < $n->rating; $i++): @endphp

                           <i class="fa fa-star"></i>

                        @php endfor @endphp

                        {{-- <i class="fa fa-star"></i>

                        <i class="fa fa-star"></i>

                        <i class="fa fa-star"></i>

                        <i class="fa fa-star"></i>

                        <i class="fa fa-star"></i> --}}

                     </div>

                     <h1 class="product-title p-0 text-truncate-2" style="height:210px;font-size:15px">

                        {!! $n->review !!}

                     </h1>

                  </div>

               </div>

            </div>

            @endforeach

            @endif

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

@include('site.partials.modal')

@endsection