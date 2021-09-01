@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="fixed-row">
        <div class="app-title">
            <div class="active-wrap">
                <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
                
            </div>
        </div>
    </div>
    @include('admin.partials.flash')
     <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/basic.css" rel="stylesheet" type="text/css" />
     <style type="text/css">
         .dropzone {
        border:2px dashed #999999;
        border-radius: 10px;
    }
    .dropzone .dz-default.dz-message {
        height: 0;
        padding-top: 200px;
    }
    .dropzone .dz-default.dz-message span {
        display: block;
        text-align: center;
        line-height: 170px;
        font-size: 18px;
        font-weight: normal;
        font-family: Montserrat;
    }
     </style>
    <div class="row section-mg row-md-body no-nav">
        <div class="col-md-12 mx-auto">
            <div class="tile">
                <div id ="dropzone" class="dropzone upload-photo">
                    <div class="file-up">
                        <span class="faicons" style="background-image:url({!!asset('backend/file.png')!!});">
                        </span>
                        <h3>Drag files Here
                        <span><i>or</i> click to browse your files</span>
                        </h3>
                    </div> 
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/min/dropzone.min.js"></script>
    <script type="text/javascript">
        var myDropzone = new Dropzone("div#dropzone", {
            //url: "https://utkarshelectricals.in/public/upload.php",
            url: "http://localhost/utkarsh/public/upload.php",
            success: function(file, response) {
                console.log(response);
                $('form').append('<input type="hidden" class="doc" name="document[]" value="' + response.name + '">')
            }
        });

        myDropzone = {
            maxFilesize: 12,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            timeout: 5000,
            success: function(file, response) {
                console.log(response);
            },
        };

    </script>

@endpush