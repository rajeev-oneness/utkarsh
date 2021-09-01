@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="fixed-row">
        <div class="app-title">
            <div class="active-wrap">
                <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
                <div class="form-group">
                    <button class="btn btn-primary" type="button" id="btnSave"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Level2</button>
                    <a class="btn btn-secondary" href="{{ route('admin.level2.index') }}"><i style="vertical-align: baseline;" class="fa fa-chevron-left"></i>Back</a>
                </div>
            </div>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row section-mg row-md-body no-nav">
        <div class="col-md-12 mx-auto">
            <div class="tile">
                <form action="{{ route('admin.level2.store') }}" method="POST" role="form" enctype="multipart/form-data" id="form1">
                    @csrf
                    <div class="tile-body form-body">
                        <div class="form-group">
                            <label class="control-label" for="name">Select Category <span class="m-l-5 text-danger"> *</span></label>
                            <select class="form-control @error('parent_id') is-invalid @enderror" name="parent_id" id="parent_id">
                                @foreach($lelve1 as $n)
                                <option value="{{$n->id}}">{{$n->name}}</option>
                                @endforeach
                            </select>
                            @error('parent_id') {{ $message }} @enderror
                        </div>    
                        <div class="form-group">
                            <label class="control-label" for="name">Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name') }}"/>
                            @error('name') {{ $message }} @enderror
                        </div>
                        
                    <div class="form-group">
                        <label class="control-label">Size Chart</label>
                        <input class="form-control @error('size_chart') is-invalid @enderror" type="file" id="size_chart" name="size_chart"/>
                        @error('size_chart') {{ $message }} @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="shipping_charge">Shipping Charge <span class="m-l-5 text-danger"> *</span></label>
                        <input class="form-control @error('shipping_charge') is-invalid @enderror" type="text" name="shipping_charge" id="shipping_charge" value="{{ old('shipping_charge') }}"/>
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
    $(document).ready(function(){
        $("#btnSave").on("click",function(){
            $('#form1').submit();
        })
    })
</script>
@endpush