<div class="tile">
    <form action="<?php echo e(route('admin.profile.update')); ?>" method="POST" role="form" id="formgeneral">
        <?php echo csrf_field(); ?>
        <h3 class="tile-title">General Settings</h3>
        <hr>
        <div class="tile-body">
            <div class="form-group">
                <label class="control-label" for="site_name">Name</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter name"
                    id="name"
                    name="name"
                    value="<?php echo e($profile->name); ?>"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="site_title">Email</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter Email ID"
                    id="email"
                    name="email"
                    value="<?php echo e($profile->email); ?>"
                    readonly
                />
            </div>
        </div>
    </form>
</div><?php /**PATH /home1/demo9tbi/utkarshelectricals.in/resources/views/admin/profile/includes/general.blade.php ENDPATH**/ ?>