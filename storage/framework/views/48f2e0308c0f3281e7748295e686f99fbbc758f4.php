<div class="tile">
    <form action="<?php echo e(route('admin.settings.update')); ?>" method="POST" role="form" id="general-form">
        <?php echo csrf_field(); ?>
        <h3 class="tile-title">General</h3>
        <hr>
        <div class="tile-body">
            <div class="form-group">
                <label class="control-label" for="site_name">Site Name</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter site name"
                    id="site_name"
                    name="site_name"
                    value="<?php echo e($setting::get('site_name')); ?>"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="site_title">Site Title</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter site title"
                    id="site_title"
                    name="site_title"
                    value="<?php echo e($setting::get('site_title')); ?>"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="default_email_address">Default Email Address</label>
                <input
                    class="form-control"
                    type="email"
                    placeholder="Enter default email address"
                    id="default_email_address"
                    name="default_email_address"
                    value="<?php echo e($setting::get('default_email_address')); ?>"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="phone">Phone Number</label>
                <input
                    class="form-control"
                    type="email"
                    placeholder="Enter Phone Number"
                    id="phone"
                    name="phone"
                    value="<?php echo e($setting::get('phone')); ?>"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="currency_symbol">Address</label>
                <textarea class="form-control" name="address" id="address"><?php echo e($setting::get('address')); ?></textarea>
            </div>
            <div class="form-group">
                <label class="control-label" for="currency_code">Privacy</label>
                <textarea class="form-control" name="Privacy" id="Privacy"><?php echo e($setting::get('Privacy')); ?></textarea>
            </div>
            <div class="form-group">
                <label class="control-label" for="currency_symbol">Terms & Conditions</label>
                <textarea class="form-control" name="terms" id="terms"><?php echo e($setting::get('terms')); ?></textarea>
            </div>
        </div>
    </form>
</div><?php /**PATH /home1/demo9tbi/utkarshelectricals.in/resources/views/admin/settings/includes/general.blade.php ENDPATH**/ ?>