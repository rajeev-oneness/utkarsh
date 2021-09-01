@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="fixed-row">
        <div class="app-title">
            <div class="active-wrap">
                <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
                <div class="form-group">
                    <a class="btn btn-secondary" href="{{ route('admin.productstock.index') }}"><i style="vertical-align: baseline;" class="fa fa-chevron-left"></i>Back</a>
                </div>
            </div>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row section-mg row-md-body no-nav">
        <div class="col-md-12 mx-auto">
            <div class="tile">
                <form action="{{ route('admin.productstock.store') }}" method="POST" role="form" enctype="multipart/form-data" id="form1">
                    @csrf
                    <div class="tile-body form-body">

                        <div class="form-group">
                            <label class="control-label" for="product_id">Select Product <span class="m-l-5 text-danger"> *</span></label>
                            <select class="form-control @error('product_id') is-invalid @enderror" name="product_id" id="product_id">
                                <option value="">Select Product</option>
                                @foreach($products as $n)
                                <option value="{{$n->id}}">{{$n->name}}</option>
                                @endforeach
                            </select>
                            @error('product_id') {{ $message }} @enderror
                        </div>

                       <!-- <div class="form-group">
                            <label class="control-label" for="size_id">Select size <span class="m-l-5 text-danger"> *</span></label>
                            <select class="form-control @error('size_id') is-invalid @enderror" name="size_id" id="size_id">
                                <option value="">Select size</option>
                                @foreach($sizes as $n)
                                <option value="{{$n->id}}">{{$n->sizes}}</option>
                                @endforeach
                            </select>
                            @error('size_id') {{ $message }} @enderror
                        </div> -->

                        <div class="form-group">
                            <label class="control-label" for="current_stock">Current Stock <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('current_stock') is-invalid @enderror" type="text" name="current_stock" id="current_stock" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="" />
                            @error('current_stock') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="stock_alert">Stock Alert<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('stock_alert') is-invalid @enderror" type="text" name="stock_alert" id="stock_alert" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="" />
                            @error('stock_alert') {{ $message }} @enderror
                        </div>

                        <button class="btn btn-primary" type="submit" ><i class="fa fa-fw fa-lg fa-check-circle"></i>Save product Stock</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script type="text/javascript" src="{{ asset('backend/js/plugins/ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/js/plugins/ckeditor/adapters/jquery.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#btnSave").on("click",function(){
            $('#form1').submit();
        })
    })
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#product_id').bind("change",firstChangeHandler);
    })

    function firstChangeHandler(){
        var parent_id = $(this).val();
        var url = "{!! URL::to('admin/productstock/sizes') !!}"+'/'+parent_id;
        //var dataString = "parent_id="+parent_id;
        
        $.ajax({
            type: "GET",
            url: url,
            cache: false,
            success: function(result) {
                //Preloader.hide();
                console.log("result>>"+result);
                if (result.status == 1) {
                    //console.log("result>>"+result);
                    var level1 = result.sizes;
                    
                    var optHtml = '';
                    optHtml += '<option value="">Choose Sizes</option>';
                    for(var i=0;i<level1.length;i++){
                        optHtml += '<option value="'+level1[i].id+'">'+level1[i].sizes+'</option>';
                    }

                    $('#size_id').html(optHtml);
                } else {
                    alert("No Sub category found for this level of category");
                }
            }
        });
    }
@endpush