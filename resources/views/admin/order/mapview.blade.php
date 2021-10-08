@extends('admin.app')
@section('title') Booking Map View @endsection
@section('content')
    <div class="fixed-row">
        <div class="app-title">
            <div class="col-6">
                <h1><i class="fa fa-tags"></i> Booking ({{$booking->unique_code}})</h1>
                <p>{{$booking->shipping_landmark}}</p>
            </div>
            <div class="active-wrap">
                <div class="form-group">
                    <a class="btn btn-secondary" href="{{ URL::previous() }}"><i style="vertical-align: baseline;" class="fa fa-chevron-left"></i>Back</a>
                </div>
            </div>
        </div>
    @include('admin.partials.flash')
        
    </div>
    <div class="row row-md-body">
        <div class="alert alert-success" id="success-msg" style="display: none;">
            <span id="success-text"></span>
        </div>
        <div class="alert alert-danger" id="error-msg" style="display: none;">
            <span id="error-text"></span>
        </div>
        <div class="col-md-12 p-0">
            <div id="map" class="map_section"></div>
        </div>
    </div>
    <input type="hidden" id="lat" value="">
    <input type="hidden" id="lat" value="">
@endsection
@push('styles')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
<style>
    .map_section {
        height: 400px;
    }
    .row-md-body {
        margin-top: 110px;
    }
</style>
@endpush
@push('scripts')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
    <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDPuZ9AcP4PHUBgbUsT6PdCRUUkyczJ66I&callback=initMap&libraries=&v=weekly"
    async
  ></script>
    <script type="text/javascript">
        // Initialize and add the map
        function initMap() {
            const location = { lat: Number("{{$booking->lat}}"), lng: Number("{{$booking->lon}}") };
            console.log(location);
            const place = location;
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 20,
                center: place,
            });
            const marker = new google.maps.Marker({
                position: place,
                map: map,
            });
        }
    </script>
@endpush