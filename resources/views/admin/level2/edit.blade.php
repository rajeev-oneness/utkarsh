@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="fixed-row">
        <div class="app-title">
            <div class="active-wrap">
                <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
                <div class="form-group">
                    <button class="btn btn-primary" type="button" id="btnSave"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Level2</button>
                    <a class="btn btn-secondary" href="{{ route('admin.level2.index') }}"><i class="fa fa-fw fa-lg fa fa-angle-left"></i>Back</a>
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
                <form action="{{ route('admin.level2.update') }}" method="POST" role="form" enctype="multipart/form-data" id="form1">
                    @csrf
                    <div class="tile-body form-body">
                        <div class="form-group">
                            <label class="control-label" for="name">Select Category <span class="m-l-5 text-danger"> *</span></label>
                            <select class="form-control @error('parent_id') is-invalid @enderror" name="parent_id" id="parent_id">
                                @foreach($Level1 as $n)
                                <option value="{{$n->id}}"@if($n->id==$targetLevel2->parent_id){{'selected'}} @endif>{{$n->name}}</option>
                                @endforeach
                            </select>
                            @error('parent_id') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="name">Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name', $targetLevel2->name) }}"/>
                            <input type="hidden" name="id" value="{{ $targetLevel2->id }}">
                            @error('name') {{ $message }} @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label">Size Chart</label>
                            <input class="form-control @error('size_chart') is-invalid @enderror" type="file" id="size_chart" name="size_chart" value="{{ old('size_chart', $targetLevel2->size_chart) }}"/>
                            @error('size_chart') {{ $message }} @enderror
                        </div>
                        
                        <div class="form-group">
                        <label class="control-label" for="shipping_charge">Shipping Charge <span class="m-l-5 text-danger"> *</span></label>
                        <input class="form-control @error('shipping_charge') is-invalid @enderror" type="text" name="shipping_charge" id="shipping_charge" value="{{ old('shipping_charge', $targetLevel2->shipping_charge) }}"/>
                        @error('shipping_charge') {{ $message }} @enderror
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