

<?php $__env->startSection('title'); ?> <?php echo e($pageTitle); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="fixed-row">
        <div class="app-title">
            <div class="active-wrap">
                <h1><i class="fa fa-cogs"></i> <?php echo e($pageTitle); ?></h1>
                <div class="form-group">
                <button class="btn btn-primary" id="btnSave" type="button"><i class="fa fa-check-circle"></i>Update <span id="btn-name"></span> Settings</button>
                <a class="btn btn-secondary" href="<?php echo e(URL::previous()); ?>"><i style="vertical-align: baseline;" class="fa fa-chevron-left"></i>Back</a>
                </div>
            </div>
        </div>
        <div class="user">
            <div class="col-md-12 nopadding">
                <div class="tile p-0">
                    <ul class="nav nav-tabs user-tabs">
                        <li class="nav-item"><a class="nav-link active" href="#general" data-toggle="tab">General</a></li>
                        <!-- <li class="nav-item"><a class="nav-link" href="#site-logo" data-toggle="tab">Site Logo</a></li>
                        <li class="nav-item"><a class="nav-link" href="#footer-seo" data-toggle="tab">Footer &amp; SEO</a></li> -->
                        <li class="nav-item"><a class="nav-link" href="#social-links" data-toggle="tab">Social Links</a></li>
                        
                        <li class="nav-item"><a class="nav-link" href="#payments" data-toggle="tab">Currency</a></li>
                        
                        <!-- <li class="nav-item"><a class="nav-link" href="#" data-toggle="tab">Sitemap</a></li> -->
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
                    <?php echo $__env->make('admin.settings.includes.general', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="tab-pane fade" id="site-logo">
                    <?php echo $__env->make('admin.settings.includes.logo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="tab-pane fade" id="footer-seo">
                    <?php echo $__env->make('admin.settings.includes.footer_seo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="tab-pane fade" id="social-links">
                    <?php echo $__env->make('admin.settings.includes.social_links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="tab-pane fade" id="analytics">
                    <?php echo $__env->make('admin.settings.includes.analytics', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="tab-pane fade" id="payments">
                    <?php echo $__env->make('admin.settings.includes.payments', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="tab-pane fade" id="Currency">
                    <?php echo $__env->make('admin.settings.includes.currency', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
$(function(){
    var hash = $('.nav-tabs a.active').attr('href');
    var activeTab = $('.nav-tabs a.active').text();
    $("#btn-name").text(activeTab);
    //hash && $('ul.nav a[href="' + hash + '"]').tab('show');

    $("#btnSave").on("click",function(){
        $(hash+"-form").submit();
    });

    $('.nav-tabs a').click(function (e) {
        activeTab = $(this).text();
        hash = $(this).attr('href');
        $("#btn-name").text(activeTab);
    });
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kaboi2pm1r04/public_html/utkarsh/resources/views/admin/settings/index.blade.php ENDPATH**/ ?>