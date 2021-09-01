<div class="tile">
    <form id="analytics-form" action="<?php echo e(route('admin.settings.update')); ?>" method="POST" role="form">
        <?php echo csrf_field(); ?>
        <h3 class="tile-title">Currenry</h3>
        <hr>
        <div class="tile-body">
            <div class="form-group">
                <label class="control-label" for="currency_name">Currenry Name</label>
                <textarea
                    class="form-control"
                    rows="4"
                    placeholder="Enter google analytics code"
                    id="currency_name"
                    name="currency_name"
                ><?php echo $setting::get('currency_name'); ?></textarea>
            </div>
            <div class="form-group">
                <label class="control-label" for="curreny_code">Currenry Code</label>
                <textarea
                    class="form-control"
                    rows="4"
                    placeholder="Enter facebook pixel code"
                    id="curreny_code"
                    name="curreny_code"
                ><?php echo $setting::get('curreny_code'); ?></textarea>
            </div>
        </div>
    </form>
</div><?php /**PATH /Volumes/WorkArea/Oneness/utkarsh/resources/views/admin/settings/includes/currency.blade.php ENDPATH**/ ?>