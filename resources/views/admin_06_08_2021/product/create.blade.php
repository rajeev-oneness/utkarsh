@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="fixed-row">
        <div class="app-title">
            <div class="active-wrap">
                <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
                <div class="form-group">
                    <!--<button class="btn btn-primary" type="button" id="btnSave"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save product</button>-->
                    <a class="btn btn-secondary" href="{{ route('admin.products.index') }}"><i style="vertical-align: baseline;" class="fa fa-chevron-left"></i>Back</a>
                </div>
            </div>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row section-mg row-md-body no-nav">
        <div class="col-md-12 mx-auto">
            <div class="tile">
                <form action="{{ route('admin.products.store') }}" method="POST" role="form" enctype="multipart/form-data" id="form1">
                    @csrf
                    <div class="tile-body form-body">
                        <div class="form-group">
                            <label class="control-label" for="name">Select Category <span class="m-l-5 text-danger"> *</span></label>
                            <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                                <option value="">Select Category</option>
                                @foreach($category as $n)
                                <option value="{{$n->id}}">{{$n->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="name">Select Level1</label>
                            <select class="form-control @error('level1_id') is-invalid @enderror" name="level1_id" id="level1_id">
                                <option value="">Select Level1</option>
                                @foreach($level1 as $n)
                                <option value="{{$n->id}}">{{$n->name}}</option>
                                @endforeach
                            </select>
                            @error('level1_id') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="name">Select level2 </label>
                            <select class="form-control @error('level2_id') is-invalid @enderror" name="level2_id" id="level2_id">
                                <option value="">Select level2</option>
                                @foreach($level2 as $n)
                                <option value="{{$n->id}}">{{$n->name}}</option>
                                @endforeach
                            </select>
                            @error('level2_id') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="name">Select level3 </label>
                            <select class="form-control @error('level3_id') is-invalid @enderror" name="level3_id" id="level3_id">
                                <option value="">Select level3</option>
                                @foreach($level3 as $n)
                                <option value="{{$n->id}}">{{$n->name}}</option>
                                @endforeach
                            </select>
                            @error('level3_id') {{ $message }} @enderror
                        </div>    
                        <div class="form-group">
                            <label class="control-label" for="name">Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name') }}"/>
                            @error('name') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label"> Image<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"/>
                            @error('image') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label"> Multiple Images</label>
                            <input class="form-control @error('images[]') is-invalid @enderror" type="file" id="images[]" name="images[]"/ multiple>
                            @error('images[]') {{ $message }} @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label" for="description">Description</label>
                            <textarea name="description" id="description" class="form-control ckeditor @error('description') is-invalid @enderror" rows="8" required></textarea>
                            @error('description') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="name">Select Brand </label>
                            <select class="form-control @error('brand') is-invalid @enderror" name="brand" id="brand">
                                @foreach($brand as $n)
                                <option value="">Select Brand</option>
                                <option value="{{$n->name}}">{{$n->name}}</option>
                                @endforeach
                            </select>
                            @error('brand') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="code">Sku Code</span></label>
                            <input class="form-control @error('code') is-invalid @enderror" type="text" name="code" id="code" value="{{ old('code') }}"/>
                            @error('code') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="product_tags">Product Tags</label>
                            <input class="form-control @error('product_tags') is-invalid @enderror" type="text" name="product_tags" id="product_tags" value="{{ old('product_tags') }}"/>
                            @error('product_tags') {{ $message }} @enderror
                        </div>

                        {{-- Country Wise India --}}

                        <label class="control-label" for="price"><b>India</b> </label>
                        
                        <div class="form-group">
                            <label class="control-label" for="price">Price <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('inprice') is-invalid @enderror" type="text" name="inprice" id="inprice" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="{{ old('inprice') }}" required/>
                            @error('inprice') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="inoffered_price">Offered Price <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('inoffered_price') is-invalid @enderror" type="text" name="inoffered_price" id="inoffered_price" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="{{ old('inoffered_price') }}" required/>
                            @error('inoffered_price') {{ $message }} @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label" for="incurrency">Currency </label>
                            <input class="form-control @error('incurrency') is-invalid @enderror" type="text" name="incurrency" id="incurrency" value="{{ old('incurrency') }}"/>
                            @error('incurrency') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="link">shipping charges <span class="m-l-5 text-danger"> *</span></label>
                            <label class="radio-inline">
                            <input type="radio" class="grey" name="in_is_shipping_charges_include" value="1" checked>
                            Included
                            </label>
                            <label class="radio-inline">
                            <input type="radio" class="grey" name="in_is_shipping_charges_include" value="2">
                            Not Included
                            </label>
                        </div>

                        <!--<div class="form-group">
                            <label class="control-label" for="inshipping_charge">Shipping Charge <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('inshipping_charge') is-invalid @enderror" type="text" name="inshipping_charge" id="inshipping_charge" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="{{ old('inshipping_charge') }}"/>
                            @error('inshipping_charge') {{ $message }} @enderror
                        </div>-->

                        <div class="form-group">
                            <label class="control-label" for="inmeta_title">Meta Title </label>
                            <input class="form-control @error('inmeta_title') is-invalid @enderror" type="text" name="inmeta_title" id="inmeta_title" value="{{ old('inmeta_title') }}"/>
                            @error('inmeta_title') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="inmeta_keywords">Meta Keywords </label>
                            <input class="form-control @error('inmeta_keywords') is-invalid @enderror" type="text" name="inmeta_keywords" id="inmeta_keywords" value="{{ old('inmeta_keywords') }}"/>
                            @error('inmeta_keywords') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="inimg_alt_tag">Img Alt Tag</label>
                            <input class="form-control @error('inimg_alt_tag') is-invalid @enderror" type="text" name="inimg_alt_tag" id="inimg_alt_tag" value="{{ old('inimg_alt_tag') }}"/>
                            @error('inimg_alt_tag') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="inmeta_description">Meta Description</label>
                            <textarea name="inmeta_description" id="inmeta_description" class="form-control ckeditor @error('inmeta_description') is-invalid @enderror" rows="8"></textarea>
                            @error('inmeta_description') {{ $message }} @enderror
                        </div>

                        {{-- Country Wise Us --}}

                        <!--<label class="control-label" for="price"><b> Us</b> </label>-->
                        
                        <!--<div class="form-group">-->
                        <!--    <label class="control-label" for="price">Price <span class="m-l-5 text-danger"> *</span></label>-->
                        <!--    <input class="form-control @error('usprice') is-invalid @enderror" type="text" name="usprice" id="usprice" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="{{ old('usprice') }}" required/>-->
                        <!--    @error('usprice') {{ $message }} @enderror-->
                        <!--</div>-->

                        <!--<div class="form-group">-->
                        <!--    <label class="control-label" for="usoffered_price">Offered Price <span class="m-l-5 text-danger"> *</span></label>-->
                        <!--    <input class="form-control @error('usoffered_price') is-invalid @enderror" type="text" name="usoffered_price" id="usoffered_price" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="{{ old('usoffered_price') }}" required/>-->
                        <!--    @error('usoffered_price') {{ $message }} @enderror-->
                        <!--</div>-->

                        <!--<div class="form-group">-->
                        <!--    <label class="control-label" for="uscurrency">Currency </label>-->
                        <!--    <input class="form-control @error('uscurrency') is-invalid @enderror" type="text" name="uscurrency" id="uscurrency" value="{{ old('uscurrency') }}"/>-->
                        <!--    @error('uscurrency') {{ $message }} @enderror-->
                        <!--</div>-->

                        <!--<div class="form-group">-->
                        <!--    <label class="control-label" for="link">shipping charges <span class="m-l-5 text-danger"> *</span></label>-->
                        <!--    <label class="radio-inline">-->
                        <!--    <input type="radio" class="grey" name="us_is_shipping_charges_include" value="1" checked>-->
                        <!--    Included-->
                        <!--    </label>-->
                        <!--    <label class="radio-inline">-->
                        <!--    <input type="radio" class="grey" name="us_is_shipping_charges_include" value="2">-->
                        <!--    Not Included-->
                        <!--    </label>-->
                        <!--</div>-->

                        <!--<div class="form-group">
                        <!--    <label class="control-label" for="usshipping_charge">Shipping Charge <span class="m-l-5 text-danger"> *</span></label>-->
                        <!--    <input class="form-control @error('usshipping_charge') is-invalid @enderror" type="text" name="usshipping_charge" id="usshipping_charge" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="{{ old('usshipping_charge') }}"/>-->
                        <!--    @error('usshipping_charge') {{ $message }} @enderror-->
                        <!--</div>-->-->

                        <!--<div class="form-group">-->
                        <!--    <label class="control-label" for="usmeta_title">Meta Title </label>-->
                        <!--    <input class="form-control @error('usmeta_title') is-invalid @enderror" type="text" name="usmeta_title" id="usmeta_title" value="{{ old('usmeta_title') }}"/>-->
                        <!--    @error('usmeta_title') {{ $message }} @enderror-->
                        <!--</div>-->

                        <!--<div class="form-group">-->
                        <!--    <label class="control-label" for="usmeta_keywords">Meta Keywords </label>-->
                        <!--    <input class="form-control @error('usmeta_keywords') is-invalid @enderror" type="text" name="usmeta_keywords" id="usmeta_keywords" value="{{ old('usmeta_keywords') }}"/>-->
                        <!--    @error('usmeta_keywords') {{ $message }} @enderror-->
                        <!--</div>-->

                        <!--<div class="form-group">-->
                        <!--    <label class="control-label" for="usimg_alt_tag">Img Alt Tag</label>-->
                        <!--    <input class="form-control @error('usimg_alt_tag') is-invalid @enderror" type="text" name="usimg_alt_tag" id="usimg_alt_tag" value="{{ old('usimg_alt_tag') }}"/>-->
                        <!--    @error('usimg_alt_tag') {{ $message }} @enderror-->
                        <!--</div>-->

                        <!--<div class="form-group">-->
                        <!--    <label class="control-label" for="usmeta_description">Meta Description</label>-->
                        <!--    <textarea name="usmeta_description" id="usmeta_description" class="form-control ckeditor @error('usmeta_description') is-invalid @enderror" rows="8"></textarea>-->
                        <!--    @error('usmeta_description') {{ $message }} @enderror-->
                        <!--</div>-->


                        {{-- Country wise Uk --}}

                        <!--<label class="control-label" for="price"><b>Uk </b> </label>-->
                        
                        <!--<div class="form-group">-->
                        <!--    <label class="control-label" for="price">Price <span class="m-l-5 text-danger"> *</span></label>-->
                        <!--    <input class="form-control @error('ukprice') is-invalid @enderror" type="text" name="ukprice" id="ukprice" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="{{ old('ukprice') }}" required/>-->
                        <!--    @error('ukprice') {{ $message }} @enderror-->
                        <!--</div>-->

                        <!--<div class="form-group">-->
                        <!--    <label class="control-label" for="ukoffered_price">Offered Price <span class="m-l-5 text-danger"> *</span></label>-->
                        <!--    <input class="form-control @error('ukoffered_price') is-invalid @enderror" type="text" name="ukoffered_price" id="ukoffered_price" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="{{ old('ukoffered_price') }}" required/>-->
                        <!--    @error('ukoffered_price') {{ $message }} @enderror-->
                        <!--</div>-->
                        
                        <!--<div class="form-group">-->
                        <!--    <label class="control-label" for="ukcurrency">Currency </label>-->
                        <!--    <input class="form-control @error('ukcurrency') is-invalid @enderror" type="text" name="ukcurrency" id="ukcurrency" value="{{ old('ukcurrency') }}"/>-->
                        <!--    @error('ukcurrency') {{ $message }} @enderror-->
                        <!--</div>-->

                        <!--<div class="form-group">-->
                        <!--    <label class="control-label" for="link">shipping charges <span class="m-l-5 text-danger"> *</span></label>-->
                        <!--    <label class="radio-inline">-->
                        <!--    <input type="radio" class="grey" name="uk_is_shipping_charges_include" value="1" checked>-->
                        <!--    Included-->
                        <!--    </label>-->
                        <!--    <label class="radio-inline">-->
                        <!--    <input type="radio" class="grey" name="uk_is_shipping_charges_include" value="2">-->
                        <!--    Not Included-->
                        <!--    </label>-->
                        <!--</div>-->

                        <!--<div class="form-group">
                        <!--    <label class="control-label" for="ukshipping_charge">Shipping Charge <span class="m-l-5 text-danger"> *</span></label>-->
                        <!--    <input class="form-control @error('ukshipping_charge') is-invalid @enderror" type="text" name="ukshipping_charge" id="ukshipping_charge" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="{{ old('ukshipping_charge') }}"/>-->
                        <!--    @error('ukshipping_charge') {{ $message }} @enderror-->
                        <!--</div>-->-->

                        <!--<div class="form-group">-->
                        <!--    <label class="control-label" for="ukmeta_title">Meta Title </label>-->
                        <!--    <input class="form-control @error('ukmeta_title') is-invalid @enderror" type="text" name="ukmeta_title" id="ukmeta_title" value="{{ old('ukmeta_title') }}"/>-->
                        <!--    @error('ukmeta_title') {{ $message }} @enderror-->
                        <!--</div>-->

                        <!--<div class="form-group">-->
                        <!--    <label class="control-label" for="ukmeta_keywords">Meta Keywords </label>-->
                        <!--    <input class="form-control @error('ukmeta_keywords') is-invalid @enderror" type="text" name="ukmeta_keywords" id="ukmeta_keywords" value="{{ old('ukmeta_keywords') }}"/>-->
                        <!--    @error('ukmeta_keywords') {{ $message }} @enderror-->
                        <!--</div>-->

                        <!--<div class="form-group">-->
                        <!--    <label class="control-label" for="ukimg_alt_tag">Img Alt Tag</label>-->
                        <!--    <input class="form-control @error('ukimg_alt_tag') is-invalid @enderror" type="text" name="ukimg_alt_tag" id="ukimg_alt_tag" value="{{ old('ukimg_alt_tag') }}"/>-->
                        <!--    @error('ukimg_alt_tag') {{ $message }} @enderror-->
                        <!--</div>-->

                        <!--<div class="form-group">-->
                        <!--    <label class="control-label" for="ukmeta_description">Meta Description </label>-->
                        <!--    <textarea name="ukmeta_description" id="ukmeta_description" class="form-control ckeditor @error('ukmeta_description') is-invalid @enderror" rows="8"></textarea>-->
                        <!--    @error('ukmeta_description') {{ $message }} @enderror-->
                        <!--</div>-->

                        {{-- Country wise Row --}}

                        <!--<label class="control-label" > <b>Row </b> </label>-->
                        

                        <!--<div class="form-group">-->
                        <!--    <label class="control-label" for="price">Price <span class="m-l-5 text-danger"> *</span></label>-->
                        <!--    <input class="form-control @error('rowprice') is-invalid @enderror" type="text" name="rowprice" id="rowprice" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="{{ old('rowprice') }}" required/>-->
                        <!--    @error('rowprice') {{ $message }} @enderror-->
                        <!--</div>-->

                        <!--<div class="form-group">-->
                        <!--    <label class="control-label" for="rowoffered_price">Offered Price <span class="m-l-5 text-danger"> *</span></label>-->
                        <!--    <input class="form-control @error('rowoffered_price') is-invalid @enderror" type="text" name="rowoffered_price" id="rowoffered_price" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="{{ old('rowoffered_price') }}" required/>-->
                        <!--    @error('rowoffered_price') {{ $message }} @enderror-->
                        <!--</div>-->
                        
                        <!--<div class="form-group">-->
                        <!--    <label class="control-label" for="rowcurrency">Currency </label>-->
                        <!--    <input class="form-control @error('rowcurrency') is-invalid @enderror" type="text" name="rowcurrency" id="rowcurrency" value="{{ old('rowcurrency') }}"/>-->
                        <!--    @error('rowcurrency') {{ $message }} @enderror-->
                        <!--</div>-->

                        <!--<div class="form-group">-->
                        <!--    <label class="control-label" for="link">shipping charges <span class="m-l-5 text-danger"> *</span></label>-->
                        <!--    <label class="radio-inline">-->
                        <!--    <input type="radio" class="grey" name="row_is_shipping_charges_include" value="1" checked>-->
                        <!--    Included-->
                        <!--    </label>-->
                        <!--    <label class="radio-inline">-->
                        <!--    <input type="radio" class="grey" name="row_is_shipping_charges_include" value="2">-->
                        <!--    Not Included-->
                        <!--    </label>-->
                        <!--</div>-->

                        <!--<div class="form-group">
                        <!--    <label class="control-label" for="rowshipping_charge">Shipping Charge <span class="m-l-5 text-danger"> *</span></label>-->
                        <!--    <input class="form-control @error('rowshipping_charge') is-invalid @enderror" type="text" name="rowshipping_charge" id="rowshipping_charge" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="{{ old('rowshipping_charge') }}"/>-->
                        <!--    @error('rowshipping_charge') {{ $message }} @enderror-->
                        <!--</div>-->-->

                        <!--<div class="form-group">-->
                        <!--    <label class="control-label" for="rowmeta_title">Meta Title </label>-->
                        <!--    <input class="form-control @error('rowmeta_title') is-invalid @enderror" type="text" name="rowmeta_title" id="rowmeta_title" value="{{ old('rowmeta_title') }}"/>-->
                        <!--    @error('rowmeta_title') {{ $message }} @enderror-->
                        <!--</div>-->

                        <!--<div class="form-group">-->
                        <!--    <label class="control-label" for="rowmeta_keywords">Meta Keywords </label>-->
                        <!--    <input class="form-control @error('rowmeta_keywords') is-invalid @enderror" type="text" name="rowmeta_keywords" id="rowmeta_keywords" value="{{ old('rowmeta_keywords') }}"/>-->
                        <!--    @error('rowmeta_keywords') {{ $message }} @enderror-->
                        <!--</div>-->

                        <!--<div class="form-group">-->
                        <!--    <label class="control-label" for="rowimg_alt_tag">Img Alt Tag</label>-->
                        <!--    <input class="form-control @error('rowimg_alt_tag') is-invalid @enderror" type="text" name="rowimg_alt_tag" id="rowimg_alt_tag" value="{{ old('rowimg_alt_tag') }}"/>-->
                        <!--    @error('rowimg_alt_tag') {{ $message }} @enderror-->
                        <!--</div>-->

                        <!--<div class="form-group">-->
                        <!--    <label class="control-label" for="rowmeta_description">Meta Description</label>-->
                        <!--    <textarea name="rowmeta_description" id="rowmeta_description" class="form-control ckeditor @error('rowmeta_description') is-invalid @enderror" rows="8"></textarea>-->
                        <!--    @error('rowmeta_description') {{ $message }} @enderror-->
                        <!--</div>-->
                        
                        <button class="btn btn-primary" type="submit" ><i class="fa fa-fw fa-lg fa-check-circle"></i>Save product</button>
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