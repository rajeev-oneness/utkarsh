@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="fixed-row">
        <div class="app-title">
            <div class="active-wrap">
                <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
                <div class="form-group">
                    <a class="btn btn-secondary" href="{{ route('admin.products.index') }}"><i style="vertical-align: baseline;" class="fa fa-chevron-left"></i>Back</a>
                </div>
            </div>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row section-mg row-md-body no-nav">
        <div class="col-md-12 mx-auto">
            <div class="tile">
                <form action="{{ route('admin.products.addsizestore') }}" method="POST" role="form" enctype="multipart/form-data" id="form1">
                    @csrf
                    <input type="hidden" name="productid" value="{{ $productid }}">
                    <div class="tile-body form-body">

                        <div class="form-group">
                            <label class="control-label" for="sizes">Select Size <span class="m-l-5 text-danger"> *</span></label>
                            <select class="form-control @error('sizes') is-invalid @enderror" name="sizes" id="sizes">
                                <option value="">Select Size</option>
                                @foreach($sizes as $n)
                                <option value="{{$n->id}}">{{$n->sizes}}</option>
                                @endforeach
                            </select>
                            @error('sizes') {{ $message }} @enderror
                        </div>

                        {{-- <div class="form-group">
                            <label class="control-label" for="name">Select <span class="m-l-5 text-danger"> *</span></label>
                            <select class="form-control @error('brand') is-invalid @enderror" name="" id="brand">
                                <option value="">Select </option>
                            </select>
                            @error('brand') {{ $message }} @enderror
                        </div> --}}

                        {{-- Country Wise India --}}
                        <label class="control-label" for="price"><b>India</b> </label>

                        <div class="form-group">
                            <label class="control-label" for="inprice">Price <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('inprice') is-invalid @enderror" type="text" name="inprice" id="inprice" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="0" />
                            @error('inprice') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="inoffered_price">Offered Price <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('inoffered_price') is-invalid @enderror" type="text" name="inoffered_price" id="inoffered_price" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="0" />
                            @error('inoffered_price') {{ $message }} @enderror
                        </div>

                        {{-- Country Wise Us --}}
                        <label class="control-label" for="price"><b> Us</b> </label>
                        <div class="form-group">
                            <label class="control-label" for="price">Price <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('usprice') is-invalid @enderror" type="text" name="usprice" id="usprice" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="0" />
                            @error('usprice') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="usoffered_price">Offered Price <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('usoffered_price') is-invalid @enderror" type="text" name="usoffered_price" id="usoffered_price" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="0" />
                            @error('usoffered_price') {{ $message }} @enderror
                        </div>

                        {{-- Country wise Uk --}}

                        <label class="control-label" for="price"><b>Uk </b> </label>

                        <div class="form-group">
                            <label class="control-label" for="ukprice">Price <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('ukprice') is-invalid @enderror" type="text" name="ukprice" id="ukprice" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="0" />
                            @error('ukprice') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="ukoffered_price">Offered Price <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('ukoffered_price') is-invalid @enderror" type="text" name="ukoffered_price" id="ukoffered_price" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="0" />
                            @error('ukoffered_price') {{ $message }} @enderror
                        </div>

                        {{-- Country wise Row --}}

                        <label class="control-label" > <b>Row </b> </label>

                        <div class="form-group">
                            <label class="control-label" for="rowprice">Price <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('rowprice') is-invalid @enderror" type="text" name="rowprice" id="rowprice" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="0" />
                            @error('rowprice') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="rowoffered_price">Offered Price <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('rowoffered_price') is-invalid @enderror" type="text" name="rowoffered_price" id="rowoffered_price" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="0" />
                            @error('rowoffered_price') {{ $message }} @enderror
                        </div>

                        <button class="btn btn-primary" type="submit" ><i class="fa fa-fw fa-lg fa-check-circle"></i>Save product Size</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script type="text/javascript" src="{{ asset('backend/js/plugins/ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/js/plugins/ckeditor/adapters/jquery.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#btnSave").on("click",function(){
            $('#form1').submit();
        })
    })
</script>
@endpush