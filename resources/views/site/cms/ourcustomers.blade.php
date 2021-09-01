@extends('site.partials.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')

@push('styles')
<link rel="stylesheet" href="{{ asset('frontend/css/jquery.carousel-3d.default.css') }}" type="text/css">
<script src="{{ asset('frontend/js/jquery.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.resize.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.waitforimages.js') }}"></script>
<script src="{{ asset('frontend/js/modernizr.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.carousel-3d.js') }}"></script>
@endpush
<div class="wrapper">
<div data-carousel-3d>
   <div>
      <img src="{{ asset('frontend/img/product/1.jpg') }}" selected ></img>
      <h2 class="post-title">
         <a href="javascript:void(0)"></a>
      </h2>
   </div>
   <div>
      <img src="{{ asset('frontend/img/product/2.jpg') }}" selected ></img>
      <h2 class="post-title">
         <a href="javascript:void(0)"></a>
      </h2>
   </div>
   <div>
      <img src="{{ asset('frontend/img/product/3.jpg') }}" selected ></img>
      <h2 class="post-title">
         <a href="javascript:void(0)"></a>
      </h2>
   </div>
   <div>
      <img src="{{ asset('frontend/img/product/4.jpg') }}" selected ></img>
      <h2 class="post-title">
         <a href="javascript:void(0)"></a>
      </h2>
   </div>
   <div>
      <img src="{{ asset('frontend/img/product/5.jpg') }}" selected ></img>
      <h2 class="post-title">
         <a href="javascript:void(0)"></a>
      </h2>
   </div>
   <div>
      <img src="{{ asset('frontend/img/product/6.jpg') }}" selected ></img>
      <h2 class="post-title">
         <a href="javascript:void(0)"></a>
      </h2>
   </div>
   <div>
      <img src="{{ asset('frontend/img/product/7.jpg') }}" selected ></img>
      <h2 class="post-title">
         <a href="javascript:void(0)"></a>
      </h2>
   </div>
   <div>
      <img src="{{ asset('frontend/img/product/8.jpg') }}" selected ></img>
      <h2 class="post-title">
         <a href="javascript:void(0)"></a>
      </h2>
   </div>
</div>
</div>
<script>
function slide_next(){
    $("[data-carousel-3d] [data-next-button]").trigger('click');
}

$(document).ready(function(){
    myVar = setInterval("slide_next()", 3000);
});
</script>
@endsection