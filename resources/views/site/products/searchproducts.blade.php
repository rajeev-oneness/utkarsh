@extends('site.partials.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')

<div class="breadcrumb-area">
   <div class="container">
      <div class="row">
         <div class="col">
            <ul class="breadcrumb">
               <li><a href="{{ route('site.home') }}">Home</a></li>
               <li><a href="{{ route('site.home') }}">All Search Result</a></li>
            </ul>
         </div>
      </div>
   </div>
</div>
<section class="gry-bg py-4">
   <div class="container">
      <div class="row">
         <!--<div class="col-xl-3 d-none d-xl-block">-->
         <!--    <div class="bg-white sidebar-box mb-3">-->
         <div class="col-xl-3 ">
            <div class="bg-white sidebar-box mb-3 d-none d-xl-block">
               <div class="box-title text-center">
                  Categories
               </div>
               <div class="box-content">
                  <div class="category-accordion">
                     <div class="single-category">
                        <ul  class="sub-sub-category-list">
                           <!--@if($categories)
                           @foreach($categories as $n)
                           <li><input type="checkbox" class="subsubcategory_checkbox" name="" value="">&nbsp {{ $n->name }} </li>
                           @endforeach
                           @endif-->
                          {{--  <li><input type="checkbox" class="subsubcategory_checkbox" name="" value="" > ABAYAS &amp; JILBABS</li> --}}
                        </ul>
                       
                     </div>
                  </div>
               </div>
            </div>
          
         </div>
         <div class="col-xl-9">
            <!-- <div class="bg-white"> -->
            <div class="brands-bar row no-gutters pb-3 bg-white p-3">
               <div class="col-11">
                  <div class="brands-collapse-box" id="brands-collapse-box">
                     <ul class="inline-links">
                        <li><a href="s">
                           <img src="{{ asset('frontend/img/logo.png') }}" alt="" class="img-fluid"></a></li>
                     </ul>
                  </div>
               </div>
            </div>
            <form class="" id="search-form" action="" method="GET">
                 <input type="hidden" name="search_keyword" value="{{ Request::get('search_keyword') }}">
               <div class="sort-by-bar row no-gutters bg-white mb-3 px-3">
                  <div class="col-md-12 offset-lg-8">
                     <div class="row no-gutters">
                        <div class="col-4">
                           <div class="sort-by-box px-1">
                              <div class="form-group">
                                 <label>Sort by</label>
                                 <select class="form-control sortSelect" name="sort_by" onchange="this.form.submit();">
                                    <option value="1" @if(Request::get('sort_by')==1) {{ 'selected' }} @endif>Newest</option>
                                    <option value="2" @if(Request::get('sort_by')==2) {{ 'selected' }} @endif>Oldest</option>
                                    <option value="3" @if(Request::get('sort_by')==3) {{ 'selected' }} @endif>Price low to high</option>
                                    <option value="4" @if(Request::get('sort_by')==4) {{ 'selected' }} @endif>Price high to low</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <!-- <hr class=""> -->
            <div class="products-box-bar p-3 bg-white">
               <div class="row sm-no-gutters gutters-5">
                  @if($products)
                  @foreach($products as $n)
                  @php $key = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $n->name)) @endphp
                  <div class="col-xxl-3 col-xl-4 col-lg-3 col-md-4 col-6">
                     <div class="product-box-2 bg-white alt-box my-2  flip_product ">
                        <div class="position-relative overflow-hidden">
                           <a href="{!! URL::to('details/'.$n->id.'/'.$key) !!}">
                              <img src="{{ asset('books/'.$n->image) }}" width="100%">
                           </a>
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
                              <a href="{!! URL::to('details/'.$n->id.'/'.$key) !!}" tabindex="0">{{ $n->name }}</a>
                           </h2>
                           <div class="star-rating mb-1">
                              <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>
                           </div>
                           <div class="clearfix">
                              <div class="price-box float-left">
                                 <del class="old-product-price strong-400">₹ {{ $n->inprice }}</del>
                                 <span class="product-price strong-600">₹ {{ $n->inoffered_price }}</span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
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
                                 <del class="old-product-price strong-400">₹ 5500</del>
                                 <span class="product-price strong-600">₹ 2750</span>
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