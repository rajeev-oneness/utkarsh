<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $__env->yieldContent('title'); ?> - <?php echo e(config('app.name')); ?></title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('backend/css/main.css')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('backend/css/font-awesome/4.7.0/css/font-awesome.min.css')); ?>"/>
    <?php echo $__env->yieldContent('styles'); ?>
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body class="app sidebar-mini rtl">
    <?php echo $__env->make('admin.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main class="app-content" id="app">
        <?php echo $__env->yieldContent('content'); ?>
    </main>
    <script src="<?php echo e(asset('backend/js/jquery-3.2.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/js/main.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/js/plugins/pace.min.js')); ?>"></script>
    
    <script>
        tinymce.init({
            selector: "textarea:not(.detail_ad)",
            paste_data_images: true,
            height : "250",
            plugins: [
              "advlist autolink lists link image charmap print preview hr anchor pagebreak",
              "searchreplace wordcount visualblocks visualchars code fullscreen",
              "insertdatetime media nonbreaking save table contextmenu directionality",
              "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
            toolbar2: "print preview media | forecolor backcolor emoticons",
            image_advtab: true,
            file_picker_callback: function(callback, value, meta) {
              if (meta.filetype == 'image') {
                $('#upload').trigger('click');
                $('#upload').on('change', function() {
                  var file = this.files[0];
                  var reader = new FileReader();
                  reader.onload = function(e) {
                    callback(e.target.result, {
                      alt: ''
                    });
                  };
                  reader.readAsDataURL(file);
                });
              }
            },
          });
    </script>
    <script type="text/javascript">
        jQuery( "#page_type" ).on('change',function() {
          if(this.value == 'Categories'){
            $('#category_type select').removeAttr('disabled');
            $('#category_type').show();
            $('#country select').attr('disabled', 'disabled');
            $('#country').hide();
          }else if(this.value == 'Location'){
            $('#country select').removeAttr('disabled');
            $('#country').show();
            $('#category_type select').attr('disabled', 'disabled');
            $('#category_type').hide();
          }
          else{
            $('#category_type select').attr('disabled', 'disabled');
            $('#category_type').hide();
            $('#country select').attr('disabled', 'disabled');
            $('#country').hide();
          }
        });
    </script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html><?php /**PATH /home/kaboi2pm1r04/public_html/utkarsh/resources/views/admin/app.blade.php ENDPATH**/ ?>