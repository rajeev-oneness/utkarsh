@extends('admin.app')
@section('title') {{ 'Vendor Create' }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <!-- <h1><i class="fa fa-tags"></i> {{ '' }}</h1> -->
        </div>
    </div>
    <br><br>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">{{ 'Purchase Order' }} <span class="float-right">UTK-{{$order->id}}</span></h3>
                <hr>
                <div class="tile-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Vendor</label>
                            @if($order->vendor)
                                <input type="text" name="" class="form-control" value="{{$order->vendor->name}}" readonly="">
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label" for="ship_to"> Ship to<span class="m-l-5 text-danger"> *</span></label>
                            <textarea name="ship_to" placeholder="Ship to" class="form-control" readonly="">{{$order->ship_to}}</textarea>
                            @error('ship_to')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <hr><h3>Items</h3>
                        @php  $total = 0; @endphp
                        @foreach($order->purchase_items as $index => $items)
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label>Items</label>
                                    <input type="text" class="form-control" value="{{$items->product->name}}" readonly>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Quantity</label>
                                    <input type="text" class="form-control" value="{{$items->quantity}}" readonly>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Unit Price</label>
                                    <input type="text" class="form-control unitPrice" value="{{number_format($items->product->inprice,2)}}" readonly>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Price</label>
                                    <input type="text" class="form-control overAllPrice" value="{{number_format($items->product->inprice * $items->quantity,2)}}" readonly>
                                </div>
                            </div>
                            @php  $total += ($items->product->inprice * $items->quantity); @endphp
                        @endforeach
                        <div class="row">
                            <div class="form-group col-md-8">
                                <h3>Total : {{number_format($total,2)}}</h3>
                            </div>
                            <div class="form-group col-md-4"></div>
                        </div>
                    </div>
                </div>
                <center><button class="printthepage">Print</button></center>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        $(document).on('click','.printthepage',function(){
            window.print();return false;
        });
    </script>
@endpush