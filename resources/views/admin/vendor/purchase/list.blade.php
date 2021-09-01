@extends('admin.app')
@section('title') {{ 'Purchase Order' }} @endsection
@section('content')
   <div class="fixed-row">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-file-text"></i> {{ 'Purchase Order' }}</h1>
            <p>{{ 'Purchase Order List' }}</p>
        </div>
        <a href="{{ route('admin.vendor.purchase.order.create') }}" class="btn btn-primary pull-right">Add New</a>
    </div>
    </div>
    @include('admin.partials.flash')
    <div class="alert alert-success" id="success-msg" style="display: none;">
        <span id="success-text"></span>
    </div>
    <div class="alert alert-danger" id="error-msg" style="display: none;">
        <span id="error-text"></span>
    </div>
    <div class="row section-mg row-md-body no-nav">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-striped" id="sampleTable">
                        <thead>
                            <tr>
                                <th> PO Number </th>
                                <th> Vendor Info </th>
                                <th> Ship To</th>
                                <th> View </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($purchaseOrder as $key => $order)
                                <tr>
                                    <td>UTK-{{$order->id}}</td>
                                    <td>
                                        @if($order->vendor)
                                            <ul>
                                                <li>vendor Id : {{$order->vendor->id}}</li>
                                                <li>vendor Name : {{$order->vendor->name}}</li>
                                                <li>vendor Email : {{$order->vendor->email}}</li>
                                            </ul>
                                        @else
                                            {{('N/A')}}
                                        @endif
                                    </td>
                                    <td>{{$order->ship_to}}</td>
                                    <td><a href="{{route('admin.vendor.purchase.order.view',[$order->id])}}">View</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $purchaseOrder->links() }}
            </div>
        </div>
    </div>
@endsection
@push('styles')
@endpush
@push('scripts')
    
@endpush