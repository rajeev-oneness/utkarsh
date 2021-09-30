@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="fixed-row">
        <div class="app-title">
            <div class="active-wrap">
                <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
                <div class="form-group">
                    <a class="btn btn-secondary" href="{{ route('admin.brand.index') }}"><i style="vertical-align: baseline;" class="fa fa-chevron-left"></i>Back</a>
                </div>
            </div>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row section-mg row-md-body no-nav">
        <div class="col-md-12 mx-auto">
            <div class="tile">
                <form action="{{ route('admin.brand.importsave') }}" method="POST" role="form" enctype="multipart/form-data" id="form1">
                    @csrf
                    <div class="tile-body form-body">
                        <div class="form-group">
                            <label class="control-label" for="file">File <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('file') is-invalid @enderror" type="file" name="file" id="file" value="{{ old('file') }}"/>
                            @error('file') {{ $message }} @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Brands</button>
                        <a class="btn btn-secondary" href="{{ route('admin.brand.index') }}"><i style="vertical-align: baseline;" class="fa fa-chevron-left"></i>Back</a>
                    </div>

                    <p><a href="{{ asset('/csv/brand.csv') }}" target="_blank">Download Sample File Here</a></p>

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