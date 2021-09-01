@extends('admin.app')
@section('title') {{ 'Vendor' }} @endsection
@section('content')
   <div class="fixed-row">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-file-text"></i> {{ 'Vendor' }}</h1>
            <p>{{ 'Vendor List' }}</p>
        </div>
        <a href="{{ route('admin.vendor.create') }}" class="btn btn-primary pull-right">Add New</a>
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
                    <table class="table table-hover table-responsive custom-data-table-style table-striped" id="sampleTable">
                        <thead>
                            <tr>
                                <th> Id </th>
                                <th> Name </th>
                                <th> Contact Person</th>
                                <th> Contact Number</th>
                                <th> Email</th>
                                <th> Address</th>
                                <th> State</th>
                                <th> PAN</th>
                                <th> Description </th>
                                <th> Tin Number</th>
                                <th> GSTIN Number</th>
                                <th> Service Tax Number</th>
                                <th> GST Category</th>
                                <th> Bank Account</th>
                                <th> IFSC</th>
                                <th> Bank Address</th>
                                <th> Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($vendor as $key => $ven)
                                <tr>
                                    <td>{{$ven->id}}</td>
                                    <td>{{$ven->name}}</td>
                                    <td>{{$ven->contact_person}}</td>
                                    <td>{{$ven->contact_mobile}}</td>
                                    <td>{{$ven->email}}</td>
                                    <td>{!! $ven->address !!}</td>
                                    <td>{{($ven->state_data ? $ven->state_data->name : 'N/A')}}</td>
                                    <td>{{$ven->pan}}</td>
                                    <td>{!! Str::limit($ven->description,100) !!}</td>
                                    <td>{{$ven->tin_number}}</td>
                                    <td>{{$ven->gstin_number}}</td>
                                    <td>{{$ven->servicetax_number}}</td>
                                    <td>{{$ven->gst_category}}</td>
                                    <td>{{$ven->account_number}}</td>
                                    <td>{{$ven->ifsc_code}}</td>
                                    <td>{{$ven->bank_address}}</td>
                                    <td><a href="{{route('admin.vendor.edit',$ven->id)}}">Edit</a> | <a class="text-danger" href="{{route('admin.vendor.delete',$ven->id)}}">Delete</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $vendor->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
@push('styles')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
@endpush
@push('scripts')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
    <script type="text/javascript">
        $('#sampleTable').DataTable({"ordering": false});
    </script>
    <script type="text/javascript">
        $('input[id="toggle-block"]').change(function() {
            var user_id = $(this).data('user_id');
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var is_active = 0;
          if($(this).is(":checked")){
              is_active = 1;
          }else{
            is_active = 0;
          }
          $.ajax({
                type:'POST',
                dataType:'JSON',
                url:"{{route('admin.couponcode.updateStatus')}}",
                data:{ _token: CSRF_TOKEN, id:user_id, is_active:is_active},
                success:function(response)
                {
                  swal("Success!", response.message, "success");
                },
                error: function(response)
                {
                    
                  swal("Error!", response.message, "error");
                }
              });
        });
    </script>
@endpush