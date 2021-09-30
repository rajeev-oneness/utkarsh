@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="fixed-row">
        <div class="app-title">
            <div class="active-wrap">
                <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
                <div class="form-group">
                    <button class="btn btn-primary" type="button" id="btnSave"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Shipping charge</button>
                    <a class="btn btn-secondary" href="{{ route('admin.shippingcharge.index') }}"><i class="fa fa-fw fa-lg fa fa-angle-left"></i>Back</a>
                </div>
            </div>
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
        <div class="col-md-12 mx-auto">
            <div class="tile">
                <form action="{{ route('admin.shippingcharge.update') }}" method="POST" role="form" enctype="multipart/form-data" id="form1">
                    @csrf
                    <div class="tile-body form-body">
                        
                        <div class="form-group">
                            <label class="control-label" for="name">Select Category <span class="m-l-5 text-danger"> *</span></label>
                            <select class="form-control @error('categoryId') is-invalid @enderror" name="categoryId" id="categoryId">
                                <option value="">--Select Category--</option>
                                @foreach($category as $n)
                                <option value="{{$n->id}}"@if($n->id == $targetshippingCharge->categoryId) {{'selected'}} @endif>{{$n->name}}</option>
                                @endforeach
                            </select>
                            @error('categoryId') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="shippingcharge">Shipping Charge <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('shippingcharge') is-invalid @enderror" type="text" name="shippingcharge" id="shippingcharge" value="{{ old('shippingcharge', $targetshippingCharge->shippingcharge) }}"/>
                            <input type="hidden" name="id" value="{{ $targetshippingCharge->id }}">
                            @error('shippingcharge') {{ $message }} @enderror
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        $("#btnSave").on("click",function(){
            $('#form1').submit();
        })
    </script>
@endpush