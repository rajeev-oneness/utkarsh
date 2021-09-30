@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">{{ $subTitle }}
                    <span class="top-form-btn">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Banner</button>
                        <a class="btn btn-secondary" href="{{ route('admin.banner.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </span>
                </h3>
                <hr>
                <form action="{{ route('admin.banner.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        
                    <div class="form-group">
                        <label class="control-label" for="name">Select Category <span class="m-l-5 text-danger"> *</span></label>
                        <select class="form-control @error('categoryId') is-invalid @enderror" name="categoryId" id="categoryId">
                            <option value="">--Select Category--</option>
                            @foreach($category as $n)
                            <option value="{{$n->id}}">{{$n->name}}</option>
                            @endforeach
                        </select>
                        @error('categoryId') {{ $message }} @enderror
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label" for="name">Banner Title <span class="m-l-5 text-danger"> *</span></label>
                        <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title') }}"/>
                        @error('title') {{ $message ?? '' }} @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label">Banner Image<span class="m-l-5 text-danger"> *</span></label>
                        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"/>
                        @error('image') {{ $message }} @enderror
                    </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="name">Link <span class="m-l-5 text-danger"> *</span></label>
                        <input class="form-control @error('link') is-invalid @enderror" type="text" name="link" id="link" value="{{ old('link') }}"/>
                        @error('link') {{ $message ?? '' }} @enderror
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Banner</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.banner.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection