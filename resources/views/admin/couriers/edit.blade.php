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
                        <a class="btn btn-secondary" href="{{ route('admin.couriers.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </span>
                </h3>
                <hr>
                <form action="{{ route('admin.couriers.update') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $courier->id }}" >
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="name"> Courier Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name',$courier->name) }}" autocomplete="off"/>
                            @error('name') {{ $message ?? '' }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="weight"> Weight <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('weight') is-invalid @enderror" type="text" name="weight" id="weight" value="{{ old('weight',$courier->weight) }}" onkeypress="return event.charCode >= 48 && event.charCode <= 57" autocomplete="off"/>
                            @error('weight') {{ $message ?? '' }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="weight_denomination">Weight Denomination<span class="m-l-5 text-danger"> *</span></label>
                            <select class="form-control @error('weight_denomination') is-invalid @enderror" name="weight_denomination" id="weight_denomination">
                                <option value="Kgs"@if($courier->weight_denomination=='Kgs'){{'selected'}} @endif>Kgs</option>
                                <option value="Grams"@if($courier->weight_denomination=='Grams'){{'selected'}} @endif>Grams</option>
                            </select>
                            @error('weight_denomination') {{ $message }} @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label" for="economy"> Economy Price <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('economy') is-invalid @enderror" type="text" name="economy" id="economy" value="{{ old('economy',$courier->economy) }}" onkeypress="return event.charCode >= 48 && event.charCode <= 57" autocomplete="off"/>
                            @error('economy') {{ $message ?? '' }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="express"> Express Price <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('express') is-invalid @enderror" type="text" name="express" id="express" value="{{ old('express',$courier->express) }}" onkeypress="return event.charCode >= 48 && event.charCode <= 57" autocomplete="off"/>
                            @error('express') {{ $message ?? '' }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="cod"> COD Charges <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('cod') is-invalid @enderror" type="text" name="cod" id="cod" value="{{ old('cod',$courier->cod) }}" onkeypress="return event.charCode >= 48 && event.charCode <= 57" autocomplete="off"/>
                            @error('cod') {{ $message ?? '' }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="website"> Website <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('website') is-invalid @enderror" type="text" name="website" id="website" value="{{ old('website',$courier->website) }}"/>
                            @error('website') {{ $message ?? '' }} @enderror
                        </div>

                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save couriers</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.couriers.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection