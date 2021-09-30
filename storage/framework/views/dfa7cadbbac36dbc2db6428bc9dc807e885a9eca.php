<div class="tile">
    <form id="payments-form" action="<?php echo e(route('admin.settings.update')); ?>" method="POST" role="form">
        <?php echo csrf_field(); ?>
        <h3 class="tile-title">Currency</h3>
        <hr>
        <div class="tile-body">
            
            <div class="form-group">
                <label class="control-label" for="currency_name">Currency Name</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter currency name"
                    id="currency_name"
                    name="currency_name"
                    value="<?php echo e($setting::get('currency_name')); ?>"
                />
            </div>
            <div class="form-group pb-2">
                <label class="control-label" for="currency_code">Currency Code</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter Currency secret key"
                    id="currency_code"
                    name="currency_code"
                    value="<?php echo e($setting::get('currency_code')); ?>"
                />
            </div>
            
        </div>
    </form>
</div><?php /**PATH /home/kaboi2pm1r04/public_html/utkarsh/resources/views/admin/settings/includes/payments.blade.php ENDPATH**/ ?>