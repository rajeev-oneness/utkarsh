@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
    </div>
    @include('admin.partials.flash')
    @php
    $start_date = (isset($_GET['start_date']) && $_GET['start_date']!='')?$_GET['start_date']:'';
    $end_date = (isset($_GET['end_date']) && $_GET['end_date']!='')?$_GET['end_date']:'';
    @endphp
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form action="">
                    <table class="table table-hover custom-data-table-style table-striped" id="">
                        <tbody>
                            <tr>
                                <td>
                                    <input type="date" class="form-control" name="start_date" placeholder="Order Date" value="{{$start_date}}">
                                </td>
                                <td>
                                    <input type="date" class="form-control" name="end_date" placeholder="Order Date" value="{{$end_date}}">
                                </td>
                                <td>
                                    <button class="btn btn-primary" type="submit" id="btnSave"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    </form>
                    <table class="table table-hover custom-data-table-style table-striped" id="">
                        <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Order Id</th>
                            <th>Customer Details</th>
                            <th>Order Date</th>
                            <th>Amount</th>
                            <!-- <th>Status</th> -->
                            <th>Payment Details</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                            @php
                            $slno =1;
                            $total_amount = 0;
                            @endphp
                            @foreach($orders as $products)
                                <tr>
                                    <td>{{ $slno }}</td>
                                    <td>{{ $products->unique_code }}<br>
                                     (@if($products->status==1){{'New Order'}}
                                    @elseif($products->status==2){{'Order Shipped'}}
                                    @elseif($products->status==3){{'Order Completed'}}
                                    @elseif($products->status==4){{'Order Modified'}}
                                    @elseif($products->status==5){{'Payment Link Raised'}}
                                    @elseif($products->status==6){{'Order Cancelled'}}
                                    @endif)</td>
                                    <td>{{ $products->name }}<br>{{ $products->mobile }}</td>
                                    <td>{{ date("d/M/Y", strtotime($products->order_date_time)) }}</td>
                                    <td>Rs. {{ $products->total_amount }}</td>
                                    
                                    <td>
                                    @if($products->payment_mode==1){{'Online Payment'}}
                                    @elseif($products->payment_mode==2){{'With Wallet'}}
                                    @elseif($products->payment_mode==3){{'COD'}}
                                    @endif
                                    <br/>
                                    Transaction Id: <br>
                                    {{ $products->transaction_id }}
                                    </td>
                                
                            @php 
                            $slno++;
                            $total_amount = $total_amount+$products->total_amount;
                             @endphp
                            @endforeach
                            <tr>
                                <td colspan="4">Total Orders</td>
                                <td colspan="2"><b>{{$slno-1}}</b></td>
                            </tr>
                            <tr>
                                <td colspan="4">Total Order Value</td>
                                <td colspan="2"><b>Rs. {{$total_amount}}</b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
