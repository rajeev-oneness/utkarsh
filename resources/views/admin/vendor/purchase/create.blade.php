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
                <form action="{{ route('admin.vendor.purchase.order.save') }}" method="POST" role="form" enctype="multipart/form-data">
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
                            <div class="form-group col-md-6">
                                <label class="control-label" for="ship_to"> Ship to<span class="m-l-5 text-danger"> *</span></label>
                                <textarea name="ship_to" placeholder="Ship to" class="form-control"></textarea>
                                @error('ship_to')<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                        </div>
                        <hr>
                        <h3>Items</h3>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>Items</label>
                                <select name="items[]" class="vendorItems form-control" required=""><option value="" selected="" hidden="">Select Product</option></select>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Quantity</label>
                                <input type="text" name="quantity[]" class="form-control" required="">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Unit Price</label>
                                <input type="text" class="form-control" class="form-control unitPrice" readonly="">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Price</label>
                                <input type="text" class="form-control" class="form-control overAllPrice" readonly="">
                            </div>
                            <div class="form-group col-md-1">
                                <label></label>
                                <a href="javascript:void(0)" class="addMoreRow">+</a>
                            </div>
                        </div>
                        <div id="newRowtoBeInsertHere"></div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
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
        var options = '<option value="" selected="" hidden="">Select Product</option>';
        function getVendorProductListandItemsToAssign(data)
        {
            $.ajax({
                url : '{{route('admin.vendor.purchase.order.create')}}',
                type : 'GET',
                dataType : 'JSON',
                data : {vendorId : data.value},
                success:function(response){
                    console.log(response);
                    options = '<option value="" selected="" hidden="">Select Product</option>';
                    $.each(response.vendorItem, function(key,value){
                        options += '<option value="'+value.id+'" ';
                        options += '>('+value.id+') '+value.product.name+'</option>';
                    });
                    $('.vendorItems').empty().append(options);
                }
            });
        }

        $(document).on('click','.addMoreRow',function(){
            $('.addMoreRow').addClass('removeRow text-danger').text('X');
            $('.removeRow').removeClass('addMoreRow');
            var newRow = '<div class="row"><div class="form-group col-md-3"><label>Items</label><select name="items[]" class="vendorItems form-control" required="">'+options+'</select></div><div class="form-group col-md-2"><label>Quantity</label><input type="text" name="quantity[]" class="form-control" required=""></div><div class="form-group col-md-3"><label>Unit Price</label><input type="text" class="form-control" class="form-control unitPrice" readonly=""></div><div class="form-group col-md-3"><label>Price</label><input type="text" class="form-control" class="form-control overAllPrice" readonly=""></div><div class="form-group col-md-1"><label></label><a href="javascript:void(0)" class="addMoreRow">+</a></div></div>';
            $('#newRowtoBeInsertHere').append(newRow);
        });

        $(document).on('click','.removeRow',function(){
            var thisClicked = $(this);
            thisClicked.closest('.row').remove();
        });
    </script>
@endpush