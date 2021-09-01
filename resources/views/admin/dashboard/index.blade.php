@extends('admin.app')
@section('title') Dashboard @endsection
@section('content')
@php
$users = App\Models\User::where('is_deleted','0')->where('type',1)->get();
$delivery_boys = App\Models\User::where('is_deleted','0')->where('type',2)->get();
$new_orders = App\Models\Booking::where('is_deleted','0')->where('status',1)->get();
$shipped_orders = App\Models\Booking::where('is_deleted','0')->where('status',2)->get();
$completed_orders = App\Models\Booking::where('is_deleted','0')->where('status',3)->get();
$cancelled_orders = App\Models\Booking::where('is_deleted','0')->where('status',4)->get();
$order_result = DB::select("select sum(total_amount) as total_amount from bookings where status in (1,2,3)");
$active_products = App\Models\Booking::where('is_deleted','0')->where('is_active',1)->get();

$latest_orders = App\Models\Booking::where('is_deleted','0')->get();
@endphp
    <div class="fixed-row">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-tags"></i> Dashboard</h1>
            </div>
            
        </div>
    </div>
    <div class="row section-mg row-md-body no-nav">
        <div class="col-md-6 col-lg-3">
            <div class="widget-small primary coloured-icon">
                <i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                    <h4>No Of Customers</h4>
                    <p><b>{{count($users)}} </b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small primary coloured-icon">
                <i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                    <h4>Delivery Boys</h4>
                    <p><b>{{count($delivery_boys)}} </b></p>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 col-lg-3">
            <div class="widget-small warning coloured-icon">
                <i class="icon fa fa-files-o fa-3x"></i>
                <div class="info">
                    <h4>New Orders</h4>
                    <p><b>{{count($new_orders)}} </b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small warning coloured-icon">
                <i class="icon fa fa-files-o fa-3x"></i>
                <div class="info">
                    <h4>Shipped Orders</h4>
                    <p><b>{{count($shipped_orders)}} </b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small warning coloured-icon">
                <i class="icon fa fa-files-o fa-3x"></i>
                <div class="info">
                    <h4>Completed Orders</h4>
                    <p><b>{{count($completed_orders)}} </b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small warning coloured-icon">
                <i class="icon fa fa-files-o fa-3x"></i>
                <div class="info">
                    <h4>Cancelled Orders</h4>
                    <p><b>{{count($cancelled_orders)}} </b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small danger coloured-icon">
                <i class="icon fa fa-star fa-3x"></i>
                <div class="info">
                    <h4>Order Value</h4>
                    <p><b>Rs. {{$order_result[0]->total_amount}} </b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small danger coloured-icon">
                <i class="icon fa fa-star fa-3x"></i>
                <div class="info">
                    <h4>Active Products</h4>
                    <p><b>{{count($active_products)}} </b></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3>Latest Orders</h3>
                <div class="tile-body">
                    
                    <table class="table table-hover custom-data-table-style table-striped" id="">
                        <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Order Id</th>
                            <th>Customer Details</th>
                            <th>Order Date</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Payment Details</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                            @php $slno =1; @endphp
                            @foreach($latest_orders as $products)
                                <tr>
                                    <td>{{ $slno }}</td>
                                    <td>{{ $products->unique_code }}</td>
                                    <td>{{ $products->name }}<br>{{ $products->mobile }}</td>
                                    <td>{{ date("d/M/Y", strtotime($products->order_date_time)) }}</td>
                                    <td>Rs. {{ $products->total_amount }}</td>
                                    <td>
                                    @if($products->status==1){{'New Order'}}
                                    @elseif($products->status==2){{'Order Shipped'}}
                                    @elseif($products->status==3){{'Order Completed'}}
                                    @elseif($products->status==4){{'Order Modified'}}
                                    @elseif($products->status==5){{'Payment Link Raised'}}
                                    @elseif($products->status==6){{'Order Cancelled'}}
                                    @endif
                                    </td>

                                    <td>
                                    @if($products->payment_mode==1){{'Online Payment'}}
                                    @elseif($products->payment_mode==2){{'With Wallet'}}
                                    @elseif($products->payment_mode==3){{'COD'}}
                                    @endif
                                    <br/>
                                    Transaction Id: <br>
                                    {{ $products->transaction_id }}
                                    </td>
                             

                                
                            @php $slno++ @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection