@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="fixed-row">
        <div class="app-title">
            <div class="active-wrap">
                <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
                <div class="form-group">
                    {{-- <button class="btn btn-primary" type="button" id="btnSave"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save product</button> --}}
                    <a class="btn btn-secondary" href="{{ route('admin.products.index') }}"><i style="vertical-align: baseline;" class="fa fa-chevron-left"></i>Back</a>
                </div>
            </div>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row section-mg row-md-body no-nav">
        <div class="col-md-12 mx-auto">
            <div class="tile">
                <form action="{{ route('admin.products.update') }}" method="POST" role="form" enctype="multipart/form-data" id="form1">
                    @csrf
                    <input type="hidden" name="id" value="{{$targetproduct->id}}">
                    <div class="tile-body form-body">
                        <div class="form-group">
                            <label class="control-label" for="name">Select Category <span class="m-l-5 text-danger"> *</span></label>
                            <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                                <option value="">Select Category</option>
                                @foreach($category as $n)
                                <option value="{{$n->id}}"@if($n->id==$targetproduct->category_id){{'selected'}} @endif>{{$n->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id') {{ $message }} @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label" for="name">Select Level1 </label>
                            <select class="form-control @error('level1_id') is-invalid @enderror" name="level1_id" id="level1_id">
                                <option value="">Select Level1</option>
                                @foreach($level1 as $n)
                                <option value="{{$n->id}}"@if($n->id==$targetproduct->level1_id){{'selected'}} @endif>{{$n->name}}</option>
                                @endforeach
                            </select>
                            @error('level1_id') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="name">Select level2 </label>
                            <select class="form-control @error('level2_id') is-invalid @enderror" name="level2_id" id="level2_id">
                                <option value="">Select level2</option>
                                @foreach($level2 as $n)
                                <option value="{{$n->id}}"@if($n->id==$targetproduct->level2_id){{'selected'}} @endif>{{$n->name}}</option>
                                @endforeach
                            </select>
                            @error('level2_id') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="name">Select level3 </label>
                            <select class="form-control @error('level3_id') is-invalid @enderror" name="level3_id" id="level3_id">
                                <option value="">Select level3</option>
                                @foreach($level3 as $n)
                                <option value="{{$n->id}}"@if($n->id==$targetproduct->level3_id){{'selected'}} @endif>{{$n->name}}</option>
                                @endforeach
                            </select>
                            @error('level3_id') {{ $message }} @enderror
                        </div>    
                        <div class="form-group">
                            <label class="control-label" for="name">Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ $targetproduct->name }}"/>
                            @error('name') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label"> Image<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" value="{{ $targetproduct->image }}"/>
                            @error('image') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label"> Multiple Images</label>
                            <input class="form-control @error('images[]') is-invalid @enderror" type="file" id="images[]" name="images[]"/ multiple>
                            @error('images[]') {{ $message }} @enderror
                        </div>
                  
                        <div class="form-group">
                            <label class="control-label" for="description">Description </label>
                            <textarea name="description" id="description" class="form-control ckeditor @error('description') is-invalid @enderror" rows="8">{{ $targetproduct->description }}</textarea>
                            @error('description') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="name">Select Brand </label>
                            <select class="form-control @error('brand') is-invalid @enderror" name="brand" id="brand">
                                <option value="">Select Brand</option>
                                @foreach($brand as $n)
                                <option value="{{$n->name}}"@if($n->name==$targetproduct->brand){{'selected'}} @endif>{{$n->name}}</option>
                                @endforeach
                            </select>
                            @error('brand') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="code">Sku Code</span></label>
                            <input class="form-control @error('code') is-invalid @enderror" type="text" name="code" id="code" value="{{ $targetproduct->code }}"/>
                            @error('code') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="code">HSN Code</span></label>
                            <input class="form-control @error('hsn') is-invalid @enderror" type="text" name="hsn" id="hsn" value="{{ $targetproduct->hsn }}"/>
                            @error('hsn') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="code">GST rate</span></label>
                            <input type="number" class="form-control @error('gst') is-invalid @enderror" type="text" name="gst" id="gst" value="{{ $targetproduct->gst }}"/>
                            @error('gst') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="product_tags">Product Tags</label>
                            <input class="form-control @error('product_tags') is-invalid @enderror" type="text" name="product_tags" id="product_tags" value="{{ $targetproduct->product_tags }}"/>
                            @error('product_tags') {{ $message }} @enderror
                        </div>

                        {{-- Country Wise India --}}

                        <label class="control-label" for="price"> <b>India </b> </label>
                         
                         <div class="form-group">
                            <label class="control-label" for="price">Price <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('inprice') is-invalid @enderror" type="text" name="inprice" id="inprice" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="{{ old('inprice',$targetproduct->inprice) }}" required/>
                            @error('inprice') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="inoffered_price">Offered Price <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('inoffered_price') is-invalid @enderror" type="text" name="inoffered_price" id="inoffered_price" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="{{ old('inoffered_price',$targetproduct->inoffered_price) }}" required/>
                            @error('inoffered_price') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="incurrency">Currency </label>
                            <input class="form-control @error('incurrency') is-invalid @enderror" type="text" name="incurrency" id="incurrency" value="{{ old('incurrency',$targetproduct->incurrency) }}"/>
                            @error('incurrency') {{ $message }} @enderror
                        </div>

                        <!--<div class="form-group">
                            <label class="control-label" for="inshipping_charge">Shipping Charge <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('inshipping_charge') is-invalid @enderror" type="text" name="inshipping_charge" id="inshipping_charge" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="{{ old('inshipping_charge',$targetproduct->inshipping_charge) }}"/>
                            @error('inshipping_charge') {{ $message }} @enderror
                        </div>-->

                        <div class="form-group">
                            <label class="control-label" for="inmeta_title">Meta Title </label>
                            <input class="form-control @error('inmeta_title') is-invalid @enderror" type="text" name="inmeta_title" id="inmeta_title" value="{{ old('inmeta_title',$targetproduct->inmeta_title) }}"/>
                            @error('inmeta_title') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="inmeta_keywords">Meta Keywords </label>
                            <input class="form-control @error('inmeta_keywords') is-invalid @enderror" type="text" name="inmeta_keywords" id="inmeta_keywords" value="{{ old('inmeta_keywords',$targetproduct->inmeta_keywords) }}"/>
                            @error('inmeta_keywords') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="inimg_alt_tag">Img Alt Tag </label>
                            <input class="form-control @error('inimg_alt_tag') is-invalid @enderror" type="text" name="inimg_alt_tag" id="inimg_alt_tag" value="{{ old('inimg_alt_tag',$targetproduct->inimg_alt_tag) }}"/>
                            @error('inimg_alt_tag') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="inmeta_description">Meta description </label>
                            <textarea name="inmeta_description" id="inmeta_description" class="form-control ckeditor @error('inmeta_description') is-invalid @enderror" rows="8">{{ $targetproduct->inmeta_description }}</textarea>
                            @error('inmeta_description') {{ $message }} @enderror
                        </div>

                        <label class="control-label" for="inmeta_description">Attributes</label>
                        <table class="table table-hover custom-data-table-style table-striped" id="">
                            <tr>
                                <td><input class="form-control" type="text" placeholder="Attribute1 Name" name="attr1_name" id="attr1_name"  value="{{ old('attr1_name',$targetproduct->attr1_name) }}"/></td>
                                <td><input class="form-control" type="text" placeholder="Attribute1 Value" name="attr1_value" id="attr1_value" value="{{ old('attr1_value',$targetproduct->attr1_value) }}"/></td>
                            </tr>
                            <tr>
                                <td><input class="form-control" type="text" placeholder="Attribute2 Name" name="attr2_name" id="attr2_name" value="{{ old('attr2_name',$targetproduct->attr2_name) }}"/></td>
                                <td><input class="form-control" type="text" placeholder="Attribute2 Value" name="attr2_value" id="attr2_value" value="{{ old('attr2_value',$targetproduct->attr2_value) }}"/></td>
                            </tr>
                            <tr>
                                <td><input class="form-control" type="text" placeholder="Attribute3 Name" name="attr3_name" id="attr3_name" value="{{ old('attr3_name',$targetproduct->attr3_name) }}"/></td>
                                <td><input class="form-control" type="text" placeholder="Attribute3 Value" name="attr3_value" id="attr3_value" value="{{ old('attr3_value',$targetproduct->attr3_value) }}"/></td>
                            </tr>
                            <tr>
                                <td><input class="form-control" type="text" placeholder="Attribute4 Name" name="attr4_name" id="attr4_name" value="{{ old('attr4_name',$targetproduct->attr4_name) }}"/></td>
                                <td><input class="form-control" type="text" placeholder="Attribute4 Value" name="attr4_value" id="attr4_value" value="{{ old('attr4_value',$targetproduct->attr4_value) }}"/></td>
                            </tr>
                            <tr>
                                <td><input class="form-control" type="text" placeholder="Attribute5 Name" name="attr5_name" id="attr5_name" value="{{ old('attr5_name',$targetproduct->attr5_name) }}"/></td>
                                <td><input class="form-control" type="text" placeholder="Attribute5 Value" name="attr5_value" id="attr5_value" value="{{ old('attr5_value',$targetproduct->attr5_value) }}"/></td>
                            </tr>
                             <tr>
                                <td><input class="form-control" type="text" placeholder="Attribute6 Name" name="attr6_name" id="attr6_name" value="{{ old('attr6_name',$targetproduct->attr6_name) }}"/></td>
                                <td><input class="form-control" type="text" placeholder="Attribute6 Value" name="attr6_value" id="attr6_value" value="{{ old('attr6_value',$targetproduct->attr6_value) }}"/></td>
                            </tr>
                             <tr>
                                <td><input class="form-control" type="text" placeholder="Attribute7 Name" name="attr7_name" id="attr7_name" value="{{ old('attr7_name',$targetproduct->attr7_name) }}"/></td>
                                <td><input class="form-control" type="text" placeholder="Attribute7 Value" name="attr7_value" id="attr7_value" value="{{ old('attr7_value',$targetproduct->attr7_value) }}"/></td>
                            </tr>
                             <tr>
                                <td><input class="form-control" type="text" placeholder="Attribute8 Name" name="attr8_name" id="attr8_name" value="{{ old('attr8_name',$targetproduct->attr8_name) }}"/></td>
                                <td><input class="form-control" type="text" placeholder="Attribute8 Value" name="attr8_value" id="attr8_value" value="{{ old('attr8_value',$targetproduct->attr8_value) }}"/></td>
                            </tr>
                             <tr>
                                <td><input class="form-control" type="text" placeholder="Attribute9 Name" name="attr9_name" id="attr9_name" value="{{ old('attr9_name',$targetproduct->attr9_name) }}"/></td>
                                <td><input class="form-control" type="text" placeholder="Attribute9 Value" name="attr9_value" id="attr9_value" value="{{ old('attr9_value',$targetproduct->attr9_value) }}"/></td>
                            </tr>
                             <tr>
                                <td><input class="form-control" type="text" placeholder="Attribute10 Name" name="attr10_name" id="attr10_name" value="{{ old('attr10_name',$targetproduct->attr10_name) }}"/></td>
                                <td><input class="form-control" type="text" placeholder="Attribute10 Value" name="attr10_value" id="attr10_value" value="{{ old('attr10_value',$targetproduct->attr10_value) }}"/></td>
                            </tr>
                        </table>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save product</button>
                            <a class="btn btn-secondary" href="{{ route('admin.products.index') }}"><i style="vertical-align: baseline;" class="fa fa-chevron-left"></i>Back</a>
                        </div>

                    </div>
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