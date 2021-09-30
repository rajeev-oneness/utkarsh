@extends('site.partials.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')

<section class="gry-bg py-4 profile">
   <div class="container">
      <div class="row cols-xs-space cols-sm-space cols-md-space">
        @include('site.auth.partials.profile')
        <div class="col-lg-9">
            <div class="main-content">
        <!-- Page title -->
       <div class="page-title">
          <div class="row align-items-center">
             <div class="col-md-6 col-12">
                <h2 class="heading heading-6 text-capitalize strong-600 mb-0">
                   Purchase History
                </h2>
             </div>
             <div class="col-md-6 col-12">
                <div class="float-md-right">
                   <ul class="breadcrumb">
                      <li><a href="">Home</a></li>
                      <li><a href="">Dashboard</a></li>
                      <li class="active"><a href="">Manage Profile</a></li>
                   </ul>
                </div>
             </div>
          </div>
       </div>
       
       <div class="row" style="margin-top: 20px;">
          @if($bookings)
          @foreach($bookings as $n)
              <div class="col-md-4">
              <div class="order-box">
                 <div class="order">
                    <div class="row">
                       <div class="col-md-6">
                       <h2>Order Id</h2>
                       <h2>Order Date</h2>
                       <h2>Order Time</h2>
                       <h2>Order Price</h2>
                    </div>
                    <div class="col-md-6">
                       <h3>{{ $n->unique_code }}</h3>
                       <h3>{{ Carbon\Carbon::parse($n->order_date_time)->format('d/M/Y') }}</h3>
                       <h3>{{ Carbon\Carbon::parse($n->order_date_time)->format('H:i a') }}</h3>
                       <h3>Rs: {{ $n->total_amount }}</h3>
                    </div>
                    </div>
                    <hr>
                 </div>                                       
              </div>
            </div>
          @endforeach
          @endif
           {{-- <div class="col-md-4">
              <div class="order-box">
                 <div class="order">
                    <div class="row">
                       <div class="col-md-6">
                       <h2>Order Id</h2>
                       <h2>Order Date</h2>
                       <h2>Order Time</h2>
                       <h2>Order Price</h2>
                    </div>
                    <div class="col-md-6">
                       <h3>#mashroos009</h3>
                       <h3>15/10/2020</h3>
                       <h3>06:50 pm</h3>
                       <h3>Rs: 2399</h3>
                    </div>
                    </div>
                    <hr>
                 </div>
                 <div class="rep"><input type="submit" value="Repeat Order"></div>                                       
              </div>
           </div>
           <div class="col-md-4">
              <div class="order-box">
                 <div class="order">
                    <div class="row">
                       <div class="col-md-6">
                       <h2>Order Id</h2>
                       <h2>Order Date</h2>
                       <h2>Order Time</h2>
                       <h2>Order Price</h2>
                    </div>
                    <div class="col-md-6">
                       <h3>#mashroos009</h3>
                       <h3>15/10/2020</h3>
                       <h3>06:50 pm</h3>
                       <h3>Rs: 2399</h3>
                    </div>
                    </div>
                    <hr>
                 </div>
                 <div class="rep"><input type="submit" value="Repeat Order"></div>                                       
              </div>
           </div> --}}
        </div>
    </div>
</div>
</div>
</div>
</section>
@endsection        