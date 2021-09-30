
<?php $__env->startSection('title'); ?> <?php echo e($pageTitle); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="fixed-row">
        <div class="app-title">
            <div class="active-wrap">
                <h1><i class="fa fa-tags"></i> <?php echo e($pageTitle); ?></h1>
                
            </div>
        </div>
    </div>
    <?php echo $__env->make('admin.partials.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                        <span class="faicons" style="background-image:url(<?php echo asset('backend/file.png'); ?>);">
                        </span>
                        <h3>Drag files Here
                        <span><i>or</i> click to browse your files</span>
                        </h3>
                    </div> 
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/min/dropzone.min.js"></script>
    <script type="text/javascript">
        var myDropzone = new Dropzone("div#dropzone", {
            //url: "https://utkarshelectricals.in/public/upload.php",
            url: "http://thekuberagro.com/utkarsh/public/upload.php",
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

<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kaboi2pm1r04/public_html/utkarsh/resources/views/admin/product/upload_images.blade.php ENDPATH**/ ?>