

<?php $__env->startSection('title'); ?> <?php echo e($pageTitle); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="fixed-row">
        <div class="app-title">
            <div class="active-wrap">
                <h1><i class="fa fa-user"></i> <?php echo e($pageTitle); ?></h1>
                <div class="form-group">
                    <button class="btn btn-primary" id="btnSave" type="button"><i class="fa fa-check-circle"></i>Update <span id="btn-name"></span></button>
                    <!-- <button class="btn btn-primary" id="btnSave1" type="button" style="display: none;"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update <span id="btn-name"></span> Password</button> -->
                    <a class="btn btn-secondary" href="<?php echo e(URL::previous()); ?>"><i style="vertical-align: baseline;" class="fa fa-chevron-left"></i>Back</a>
                </div>
            </div>
        </div>
        <div class="user">
            <div class="col-md-12 nopadding">
                <div class="tile p-0">
                    <ul class="nav nav-tabs user-tabs" id="myTab">
                        <li class="nav-item"><a class="nav-link active" href="#general" data-toggle="tab">General</a></li>
                        <li class="nav-item"><a class="nav-link" href="#password" data-toggle="tab">Change Password</a></li>
                    </ul>
                </div>
            </div>  
        </div>
    </div>
    <?php echo $__env->make('admin.partials.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row row-md-body">
        <div class="col-md-12">
            <div class="tab-content">
                <div class="tab-pane active" id="general">
                    <?php echo $__env->make('admin.profile.includes.general', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="tab-pane fade" id="password">
                    <?php echo $__env->make('admin.profile.includes.password', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
var hash = "#general";
$(function(){
  $("#btn-name").text("Profile");
  //hash && $('ul.nav a[href="' + hash + '"]').tab('show');

  // $('.nav-tabs a').click(function (e) {
  //   //$(this).tab('show');
  //   var scrollmem = $('body').scrollTop();
  //   window.location.hash = this.hash;
  //   $('html,body').scrollTop(scrollmem);
  // });
});

    $('.nav-tabs > li > a').click( function() {
        hash = $(this).attr('href');
        if(hash=='#general'){
            $("#btn-name").text("Profile");
            window.location.hash = hash;
        }else if(hash=='#password'){
            $("#btn-name").text("Password");
            window.location.hash = hash;
        }
    });

    $("#btnSave").on("click",function(){
        //alert("hello >>"+hash);
        if(hash=='#general'){
            $('#formgeneral').submit();
        }else if(hash=='#password'){
            $('#formpassword').submit();
        }
        window.location.hash = hash;
    })

    
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kaboi2pm1r04/public_html/utkarshelectricals.in/resources/views/admin/profile/index.blade.php ENDPATH**/ ?>