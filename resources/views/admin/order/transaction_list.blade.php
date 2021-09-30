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
    
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    
                    <table class="table table-hover custom-data-table-style table-striped" id="">
                        <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Order Id</th>
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
                                    <td>{{ $products->unique_code }}</td>
                                    <td>{{ date("d/M/Y", strtotime($products->order_date_time)) }}</td>
                                    <td>Rs. {{ $products->total_amount }}</td>
                                    <td>{{ $products->transaction_id }}</td>
                                
                            @php 
                            $slno++;
                            $total_amount = $total_amount+$products->total_amount;
                             @endphp
                            @endforeach
                            <tr>
                                <td colspan="3">Total Transactions</td>
                                <td colspan="2"><b>{{$slno-1}}</b></td>
                            </tr>
                            <tr>
                                <td colspan="3">Total Order Value</td>
                                <td colspan="2"><b>Rs. {{$total_amount}}</b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
