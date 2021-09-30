<div class="tile">
    <form id="social-links-form" action="<?php echo e(route('admin.settings.update')); ?>" method="POST" role="form">
        <?php echo csrf_field(); ?>
        <h3 class="tile-title">Social Links</h3>
        <hr>
        <div class="tile-body">
            <div class="form-group">
                <label class="control-label" for="social_facebook">Facebook Profile</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter facebook profile link"
                    id="social_facebook"
                    name="social_facebook"
                    value="<?php echo e($setting::get('social_facebook')); ?>"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="social_twitter">Twitter Profile</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter twitter profile link"
                    id="social_twitter"
                    name="social_twitter"
                    value="<?php echo e($setting::get('social_twitter')); ?>"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="social_instagram">Instagram Profile</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter instagram profile link"
                    id="social_instagram"
                    name="social_instagram"
                    value="<?php echo e($setting::get('social_instagram')); ?>"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="social_linkedin">LinkedIn Profile</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter linkedin profile link"
                    id="social_linkedin"
                    name="social_linkedin"
                    value="<?php echo e($setting::get('social_linkedin')); ?>"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="social_pinterest">Pinterest Profile</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter Pinterest Profile link"
                    id="social_pinterest"
                    name="social_pinterest"
                    value="<?php echo e($setting::get('social_pinterest')); ?>"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="social_youtube">Youtube Profile</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter Youtube Profile link"
                    id="social_youtube"
                    name="social_youtube"
                    value="<?php echo e($setting::get('social_youtube')); ?>"
                />
            </div>
        </div>
    </form>
</div><?php /**PATH /home/kaboi2pm1r04/public_html/utkarsh/resources/views/admin/settings/includes/social_links.blade.php ENDPATH**/ ?>