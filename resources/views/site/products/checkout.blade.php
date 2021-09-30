@extends('site.partials.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')

@php
$noofproduct = 0;
$totalamm = 0;
$totalqunatity = 0;
$taxamm = 0;
$discount = 0;
$extra_discount = 0;
$shippingcharge = 0;
$offer_type = Request::get('offer_type') ? Request::get('offer_type'):null;
$offer_rate = Request::get('offer_rate') ? Request::get('offer_rate'):null;
@endphp

@if($cartProducts)
@foreach($cartProducts as $n)
@php
$totalamm += ($n->price * $n->quantity);
if(!empty($offer_type) && !empty($offer_rate)){
   if($offer_type==1){
      $discount = $offer_rate;
   }else{
      $discount = $totalamm*$offer_rate/100;
   }
}
@endphp
@endforeach
@endif

<section class="slice-xs sct-color-2 border-bottom">
<div class="container container-sm">
   <div class="row cols-delimited">
      <div class="col-4">
         <div class="icon-block icon-block--style-1-v5 text-center">
            
            <div class="block-content d-none d-md-block">
               <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">1. My Cart</h3>
            </div>
         </div>
      </div>
      <div class="col-4">
         <div class="icon-block icon-block--style-1-v5 text-center ">
            
            <div class="block-content d-none d-md-block">
               <h3 class="heading heading-sm strong-300 text-capitalize active">2. Shipping info</h3>
            </div>
         </div>
      </div>
      <div class="col-4">
         <div class="icon-block icon-block--style-1-v5 text-center">
            
            <div class="block-content d-none d-md-block">
               <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">3. Payment</h3>
            </div>
         </div>
      </div>
   </div>
</div>
</section>
<section class="py-4 gry-bg">
<div class="container">
   <div class="row cols-xs-space cols-sm-space cols-md-space">
      <div class="col-lg-8">
         <form class="form-default" data-toggle="validator" action="{{ route('site.reviewbooking',base64_encode($bookings[0]->id)) }}"  id="guest_address" role="form" method="post">
            @csrf
            <input type="hidden" name="discount_amount" id="discount_amount" value="{{ $discount }}"> 
            <div class="card cart-card">
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label class="control-label">Name</label>
                           <input type="text" class="form-control" name="name" value="@if(Auth::guard('users')->check()) {{ Auth::guard('users')->user()->name }} @endif" required>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label class="control-label">Email</label>
                           <input type="email" class="form-control email_text" name="email" value="@if(Auth::guard('users')->check()) {{ Auth::guard('users')->user()->email }} @endif" required>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label class="control-label">Address</label>
                           <input type="text" class="form-control" name="shipping_address" value="" required>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group has-feedback">
                           <label class="control-label">Landmark</label>
                           <input type="text" min="0" class="form-control" placeholder="Landmark" name="shipping_landmark" required>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                   
                     <div class="col-md-6">
                        <div class="form-group">
                           <label class="control-label">Select your country</label>
                           <select id="user_new_address_country" class="form-control custome-control" name="shipping_country" data-live-search="true" required>
                              <option data-country-val="101" value="India" selected="">India</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label class="control-label">Enter State</label>
                           <input type="text" minlength="10" maxlength="10" class="form-control" value="" name="shipping_state" id="state_id">
                        </div>
                     </div>
                     <div class="col-md-6" style="">
                        <div class="form-group">
                           <label class="control-label">Enter City</label>
                           <!--<select class="form-control custome-control" data-live-search="true" name="shipping_city" id="city_id" required="">-->
                           <!--   <option value="">Select City</option>-->
                           <!--</select>-->
                           <input type="text" minlength="10" maxlength="10" class="form-control" value="" name="shipping_city" id="city_id">
                        </div>
                     </div>
                     
                     <div class="col-md-6">
                        <div class="form-group has-feedback">
                           <label class="control-label">Alternate Number</label>
                         
                           <input type="text" minlength="10" maxlength="10" class="form-control" value="" name="phone" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group has-feedback">
                           <label class="control-label">Postal code</label>
                           <input type="text" minlength="6" autocomplete="off" maxlength="6" class="form-control " name="shipping_pin" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="" required>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group has-feedback">
                           <label class="control-label">Phone</label>
                       
                           <input type="text" minlength="10" maxlength="10" class="form-control" value="" onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="mobile" required>
                        </div>
                     </div>
                  </div>
                  <input type="hidden" name="checkout_type" value="logged">
               </div>
            </div>
            <div class="row align-items-center pt-4">
               <div class="col-6">
                  <a href="{{ route('site.viewcart') }}" class="link link--style-3">
                  <i class="ion-android-arrow-back"></i>
                  Return to shop
                  </a>
               </div>
               <div class="col-6 text-right">
                  {{-- <a href="" class="btn btn-styled btn-base-1">Continue to Payment</a> --}}
                  <button type="submit" class="btn btn-styled btn-base-1">Continue to Payment</button>
               </div>
            </div>
         </form>
      </div>
      <div class="col-lg-4 ml-lg-auto">
         
         <div id="cs_summary">
            <div class="card sticky-top">
               <div class="card-title">
                  <div class="row align-items-center">
                     <div class="col-6">
                        <h3 class="heading heading-3 strong-400 mb-0">
                           <span>Summary</span>
                        </h3>
                     </div>
                     <div class="col-6 text-right">
                        <span class="badge badge-md badge-success">{{ count($cartProducts) }} Items</span>
                     </div>
                  </div>
               </div>
               <div class="card-body">
                  <table class="table-cart table-cart-review">
                     <thead>
                        <tr>
                           <th class="product-name">Product</th>
                           <th class="product-total text-right">Total</th>
                        </tr>
                     </thead>
                     <tbody>

                        @if($cartProducts)
                           @foreach($cartProducts as $n)

                            @php
                              
                              $totalqunatity += $n->quantity;
                              if($n->price >=1000){
                                 $taxamm += (($n->price/112) *12) * $n->quantity;
                              } else {
                                 $taxamm += (($n->price/105)*5) * $n->quantity;
                              }
                           @endphp
                           <tr class="cart_item">
                              <td class="product-name">
                                 {{ $n->product_name }}
                                 <strong class="product-quantity">× {{ $n->quantity }}</strong>
                              </td>
                              <td class="product-total text-right">
                                 <span class="pl-4">₹  @if( ($n->quantity * $n->price) >=1000 ) 
                                 <!--{{ intval(($n->quantity * $n->price) - (($n->quantity * $n->price)) * .12) }}-->
                                 {{ number_format(($n->quantity * (($n->price*100)/112)),2) }}
                                    @else 
                                <!--{{ intval(($n->quantity * $n->price) - (($n->quantity * $n->price)) * .05) }} -->
                                {{ number_format(($n->quantity * (($n->price*100)/105)),2) }}
                                @endif
                                </span>
                              </td>
                           </tr>
                           @endforeach
                        @endif

                     </tbody>
                  </table>
                  <!--<table class="table-cart table-cart-review my-4">
                     <thead>
                        <tr>
                           <th class="product-name">Product Shipping charge</th>
                           <th class="product-total text-right">Amount</th>
                        </tr>
                     </thead>
                     <tbody>

                        @if($cartProducts)
                           @foreach($cartProducts as $key => $n)
                           <tr class="cart_item">
                              <td class="product-name">
                                 {{ $n->product_name }}
                                 <strong class="product-quantity">× {{ $n->quantity }}</strong>
                              </td>
                              <td class="product-total text-right">
                                 <span class="pl-4">₹ 0 (Flat rate)</span>
                              </td>
                              @if($n->quantity==1 && $key==0)
                              @php  $shippingcharge += $n->shippingcharge; @endphp
                              @elseif($n->quantity>1 && $key==0)
                              @php $shippingcharge += $n->shippingcharge + (($n->shippingcharge/2) *($n->quantity - 1)) @endphp
                              @elseif($n->quantity>1)
                              @php $shippingcharge += $n->shippingcharge/2 + (($n->shippingcharge/2) *($n->quantity - 1)) @endphp
                              @else
                              @php $shippingcharge += $n->shippingcharge/2 @endphp
                              @endif
                           </tr>
                        @endforeach
                        @endif

                     </tbody>
                  </table>-->
                  <table class="table-cart table-cart-review">
                     <tfoot>
                         
                        <tr class="cart-subtotal">
                           <th>Subtotal</th>
                           <td class="text-right">
                              <span class="strong-600">₹ {{ number_format(($totalamm - $taxamm),2) }}</span>
                           </td>
                        </tr>
                        
                        <!--<tr class="cart-subtotal">
                           <th>Subtotal</th>
                           <td class="text-right">
                              <span class="strong-600">₹ {{ intval(($totalamm - $taxamm) + $shippingcharge) }}</span>
                           </td>
                        </tr>-->
                        
                        <tr class="cart-subtotal">
                           <th>Billing Amount</th>
                           <td class="text-right">
                              <span class="strong-600" id="billingamount" val="{{ round(($totalamm),2) }}">₹ {{ number_format(($totalamm),2) }}</span>
                           </td>
                        </tr>
                        <tr class="cart-shipping">
                           <th>Tax</th>
                           <td class="text-right">
                              <span class="text-italic">₹ {{ number_format(($taxamm),2) }}</span>
                           </td>
                        </tr>
                        <tr class="cart-total">
                           <th><span class="strong-600">Discount</span></th>
                           <td class="text-right">
                              <strong><span id="discount">₹ {{ number_format(($discount),2) }}</span></strong>
                           </td>
                        </tr>
                        <!--<tr class="cart-shipping">
                           <th>Total Shipping</th>
                           <td class="text-right">
                              <span class="text-italic">₹ {{ intval($shippingcharge) }}</span>
                           </td>
                        </tr>-->
                        
                        <!--<tr class="cart-total">
                           <th><span class="strong-600">Total</span></th>
                           <td class="text-right">
                              <strong><span>₹ {{ number_format(($totalamm),2) }}</span></strong>
                           </td>
                        </tr>-->
                        
                        <!--<tr class="cart-total">
                           <th><span class="strong-600">Total</span></th>
                           <td class="text-right">
                              <strong><span>₹ {{ intval($totalamm + $shippingcharge) }}</span></strong>
                           </td>
                        </tr>-->
                        
                     </tfoot>
                  </table>
                  <div class="mt-3">
                     <form class="form-inline" action="<!--{{ route('site.check') }}-->" method="post">
                     @csrf
                     <input type="hidden" name="bookingId" value="{{ $bookings[0]->id }}">         
                        <div class="form-group flex-grow-1">
                           <input type="text" class="form-control w-100" name="code" id="code" placeholder="Have coupon code? Enter here" required="">
                        </div>
                        <button type="button" class="btn" id="couponcode"  style="background-color: #d9a05a !important;">Apply</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         </script>
      </div>
   </div>
</div>
</section>
@endsection
@push('scripts')
<script type="text/javascript">
$(document).ready(function(){
   $('#state_id').bind("change",firstChangeHandler);
})
function firstChangeHandler(){

   var state_id = $(this).val();

   var url = "{!! URL::to('api/city/') !!}"+'/'+state_id;
      
   $.ajax({
      type: "GET",
      url: url,
      cache: false,
      success: function(result) {
            if (result.status == 1) {
               console.log("result>>"+result);
               var level1 = result.city;
               var optHtml = '';
               optHtml += '<option value="">Select City</option>';
               for(var i=0;i<level1.length;i++){
               optHtml += '<option value="'+level1[i].name+'">'+level1[i].name+'</option>';
            }

            $('#city_id').html(optHtml);
         } else {
            alert("No City found for this state");
         }
      }
   });
}
</script>
<script type="text/javascript">
$('#couponcode').click(function(){
      var couponcode = $('#code').val();
      var totalamm = parseInt($('#billingamount').attr("val"));
      var discount = 0;
      var url = "{!! URL::to('api/coupon/') !!}"+'/'+couponcode;
      $.ajax({
      type: "GET",
      url: url,
      data:{ code:couponcode },
      success: function(result) {
            if (result.status == 1) {
               console.log("result>>"+result);
               var offer_type = result.offer_type;
               var offer_rate = result.offer_rate;

               if(offer_type!='' && offer_rate!=''){
                  if(offer_type==1){
                     discount = offer_rate;
                     //alert('flat offer'+discount);
                  }else{
                     discount = totalamm*offer_rate/100;
                     //alert('percent offer'+totalamm);
                  }
               }
               //alert('last'+discount);
            alert("coupon applied sucessfully");  
            $('#discount_amount').val(discount);
            $('#discount').html(discount);
         } else {
            alert("coupon is invalid");
         }
      }
   });
});
</script>
@endpush