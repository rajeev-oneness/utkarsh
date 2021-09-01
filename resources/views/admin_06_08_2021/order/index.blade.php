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
                    <table class="table table-hover custom-data-table-style table-striped" id="sampleTable">
                        <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Order Id</th>
                            <th>Name</th>
                            <th>Mobile No</th>
                            <th>Order Date</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Payment Mode</th>
                            <th>Transaction Id</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php $slno =1; @endphp
                            @foreach($order as $products)
                                <tr>
                                    <td>{{ $slno }}</td>
                                    <td>{{ $products->unique_code }}</td>
                                    
                                    <td>{{ $products->name }}</td>
                                    <td>{{ $products->mobile }}</td>
                                    <td>{{ date("d/M/Y", strtotime($products->order_date_time)) }}</td>

                                    <td>{{ $products->total_amount +  $products->tax_amount }}</td>
                                    <td>
                                    @if($products->status==1){{'Order Pending'}}
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
                                    </td>
                                    <td>{{ $products->transaction_id }}</td>
                                    
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{ route('admin.orders.invoice', $products->id) }}" class="btn btn-sm btn-primary">Invoice</a>
                                            <a href="{{ route('admin.orders.detail', $products->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                                            @if($products->status == 1)
                                            <a href="javascript:void(0);" data-toggle="modal" data-target="#myModal1{{$products['id']}}" class="btn btn-sm btn-primary"><i class="fa fa-truck" aria-hidden="true"></i></a>
                                            @else
                                            <a href="javascript:void(0);" data-toggle="modal" data-target="#myModal2{{$products['id']}}" class="btn btn-sm btn-primary">Courier Details</a>
                                            @endif
                                            <a href="#" data-id="{{$products['id']}}" class="sa-remove btn btn-sm btn-danger edit-btn"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                    </tr>

                                    {{-- Modal Courier Details  --}}

                                    <div class="modal fade myModal2{{$products['id']}}" tabindex="-1" role="dialog" id="myModal2{{$products['id']}}">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Courier Details</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p>Courier Name : <b>{{ $products['courier_name'] }} </b></p>
                                                <p>POD No : <b>{{ $products['pod_no'] }} </b></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                    </div>

                                    {{-- Modal Courier Details end --}}

                                    {{-- Modal Add Courier --}}

                                    <div class="modal fade" tabindex="-1" role="dialog" id="myModal1{{$products['id']}}">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Courier Details</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('admin.orders.updatecourier',$products['id']) }}" method="post">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label class="control-label">
                                                                    Courier Name 
                                                                </label>
                                                               
                                                                <select class="form-control" id="courier_name" name="courier_name" required="required"
                                                                >
                                                                <option value="">Select Courier</option>  
                                                                <?php
                                                                foreach ($couriers as $c) {
                                                                ?>
                                                                <option value="<?=$c->name?>"><?=$c->name?></option>
                                                                <?php
                                                                }
                                                                ?> 
                                                                </select>

                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">
                                                                    POD No 
                                                                </label>
                                                                <input type="text" placeholder="Insert POD No" class="form-control" id="pod_no" name="pod_no" required="required">
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <button class="btn btn-yellow btn-block" type="submit">
                                                                        Assign Courier <i class="fa fa-arrow-circle-right"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->

                                {{-- Modal Add Courier End --}}

                                
                            @php $slno++ @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('styles')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
@endpush
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable({"ordering": false});
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
    <script type="text/javascript">
    $('.sa-remove').on("click",function(){
        var categoryId = $(this).data('id');
        swal({
          title: "Are you sure?",
          text: "Your will not be able to recover the record!",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Yes, delete it!",
          closeOnConfirm: false
        },
        function(isConfirm){
          if (isConfirm) {
            window.location.href = "orders/"+categoryId+"/delete";
            } else {
              swal("Cancelled", "Record is safe", "error");
            }
        });
    });
    </script>
@endpush