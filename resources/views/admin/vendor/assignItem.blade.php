@extends('admin.app')
@section('title') {{ 'Vendor Create' }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ 'New vendor' }}</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">{{ 'Vendor Items' }}</h3>
                <hr>
                <form action="{{ route('admin.vendor.product.assign.post') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="control-label" for="vendor"> <span class="m-l-5 text-danger"> *</span></label>
                                <select class="form-control" name="vendor" id="vendor" onchange="getVendorProductListandItemsToAssign(this)">
                                    <option value="" hidden="">Select Vendor</option>
                                    @foreach($vendors as $key => $vendor)
                                        <option value="{{$vendor->id}}">{{$vendor->name}}</option>
                                    @endforeach
                                </select>
                                @error('vendor')<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                            <div class="form-group col-md-6" id="multipleProductSelection" style="display:none;">
                                <label class="control-label" for="products">Select Product <span class="m-l-5 text-danger"> *</span></label>
                                <select class="form-control" name="products[]" id="productMultipleSelection" multiple="" required>
                                    <option value="" selected="" hidden="">Select Product</option>
                                </select>
                                @error('products')<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Assign</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.blog.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        function getVendorProductListandItemsToAssign(data)
        {
            $.ajax({
                url : '{{route('admin.vendor.product.assign.list')}}',
                type : 'GET',
                dataType : 'JSON',
                data : {vendorId : data.value},
                success:function(response){
                    console.log(response);
                    var options = '<option value="" selected="" hidden="">Select Product</option>';
                    $.each(response.product, function(key,value){
                        options += '<option value="'+value.id+'" ';
                        $.each(response.vendorItem, function(vendorKey,vendorValue) {
                            if(vendorValue.productId == value.id){
                                options += 'selected';return;
                            }
                        });
                        options += '>('+value.id+') '+value.name+'</option>';
                    });
                    $('#productMultipleSelection').empty().append(options);
                    $('#multipleProductSelection').show();
                }
            });
        }
    </script>
@endpush