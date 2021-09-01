@extends('site.partials.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')

   <div class="container">
      <div class="row">
         <div class="col">			<nav aria-label="breadcrumb">				<ol class="title-items breadcrumb">				  <li class="breadcrumb-item title-item"><a href="{{ route('site.home') }}">Home</a></li>				  <li class="breadcrumb-item active">All Categories</li>				</ol>			</nav>
         </div>
         <div class="col">
            <div class="text-right">
               <a href="{{ route('site.deletecomparelist') }}"  class="btn btn-link btn-base-5 btn-sm">Reset Compare List</a>
            </div>
         </div>
      </div>
   </div>

<section class="gry-bg py-4">
   <div class="container">
      <div class="row">
         <div class="col">
            <div class="card mb-4">
               <div class="card-header text-center p-2">
                  <div class="heading-5">Comparison</div>
               </div>
               @if(!empty($comparelist))
               <div class="card-body">
                  <table class="table table-bordered compare-table mb-0">
                     <thead>
                        <tr>
                           <th scope="col"  class="font-weight-bold width1">
                              Name
                           </th>
                           @foreach($comparelist as $n)
                           @php $key = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $n->name)) @endphp
                           <th scope="col"  class="font-weight-bold width2">
                              <a href="{!! URL::to('details/'.$n->id.'/'.$key) !!}" target="_blank">{{ $n->name }}</a>
                           </th>
                           @endforeach
                           {{-- <th scope="col" class="font-weight-bold width2">
                              <a href="">BLUE CHECKERED SLEEVES ~ Casual wear jilbab dress for women</a>
                           </th> --}}
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <th scope="row">Image</th>
                           @foreach($comparelist as $n)
                           @php $key = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $n->name)) @endphp
                           <td>
                              <a href="{!! URL::to('details/'.$n->id.'/'.$key) !!}" target="_blank">
                              <img src="{{ asset('books/'.$n->image) }}" alt="Product Image" class="img-fluid py-4">
                              </a>
                           </td>
                           @endforeach
                           {{-- <td>
                              <img src="{{ asset('frontend/img/product/2.jpg') }}" alt="Product Image" class="img-fluid py-4">
                           </td> --}}
                        </tr>
                        <tr>
                           <th scope="row">Price</th>
                           @foreach($comparelist as $n)
                           <td>₹ {{ $n->inoffered_price }}</td>
                           @endforeach
                           {{-- <td>₹ 4000</td> --}}
                        </tr>
                        <tr>
                           <th scope="row">Description</th>
                           @foreach($comparelist as $n)
                           <td>{!! $n->description !!}</td>
                           @endforeach
                           {{-- <td>
                              <p>
                                Mashroo brings to you the stylish blue jilbab dress for women made up of Modal fabric woven with semi-synthetic cellulose fiber. Its Fabric is breathable and about fifty percent more absorbent to water than cotton, which makes it ideal for active wear, at the same time it is as almost a smooth as silk. Wash and iron it normally without having to worry about any shrinkage. The stretch of checkered burberry like fabric on its sleeves completes its look.The elegance of a jilbab&nbsp;and the comfort of active wear, this one has it all.
                              </p>
                              <p><strong>NOTE : This product will be dispatched on the 4th working day after the order has been placed.</strong><br></p>
                           </td> --}}

                        </tr>
                        <tr>
                           <th scope="row"></th>
                           @foreach($comparelist as $n)
                           <form action="{{ route('site.addcart') }}" method="post">
                           @csrf
                           <input type="hidden" name="quantity" value="1"/>
                           <input type="hidden" name="product_name" value="{{ $n->name }}"/>
                           <input type="hidden" name="product_id" value="{{ $n->id }}"/>
                           <input type="hidden" name="product_code" value="{{ $n->code }}"/>
                           <input type="hidden" name="product_image" value="{{ asset('/books/'.$n->image) }}"/>
                           <input type="hidden" name="price" value="{{ $n->inoffered_price }}"/>
                           <input type="hidden" name="gst" value="{{ $n->gst }}"/>
                           <td class="text-center py-4">
                              <button type="submit" class="btn btn-base-1 btn-circle btn-icon-left">
                              <i class="icon ion-android-cart"></i>Add to cart
                              </button>
                           </td>
                           </form>
                           @endforeach
                           {{-- <td class="text-center py-4">
                              <button type="submit" class="btn btn-base-1 btn-circle btn-icon-left">
                              <i class="icon ion-android-cart"></i>Add to cart
                              </button>
                           </td> --}}
                        </tr>
                     </tbody>
                  </table>
               </div>
               @else
               <p style="text-align: center; margin-top: 20px;"><strong> No data found </strong> </p>
               @endif
            </div>
         </div>
      </div>
   </div>
</section>
@endsection