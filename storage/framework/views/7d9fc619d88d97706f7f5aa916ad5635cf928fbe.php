<?php $__env->startSection('title'); ?> <?php echo e('Vendor'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
   <div class="fixed-row">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-file-text"></i> <?php echo e('Vendor'); ?></h1>
            <p><?php echo e('Vendor List'); ?></p>
        </div>
        <div>
            <a href="<?php echo e(route('admin.vendor.import')); ?>" class="btn btn-primary pull-right ml-3">Bulk Import</a>
            <a href="<?php echo e(route('admin.vendor.create')); ?>" class="btn btn-primary pull-right">Add New</a>
        </div>
    </div>
    </div>
    <?php echo $__env->make('admin.partials.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="alert alert-success" id="success-msg" style="display: none;">
        <span id="success-text"></span>
    </div>
    <div class="alert alert-danger" id="error-msg" style="display: none;">
        <span id="error-text"></span>
    </div>
    <div class="row section-mg row-md-body no-nav">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-responsive custom-data-table-style table-striped" id="sampleTable">
                        <thead>
                            <tr>
                                <th> Id </th>
                                <th> Name </th>
                                <th> Contact Person</th>
                                <th> Contact Number</th>
                                <th> Email</th>
                                <th> Address</th>
                                <th> State</th>
                                <th> PAN</th>
                                <th> Description </th>
                                <th> Tin Number</th>
                                <th> GSTIN Number</th>
                                <th> Service Tax Number</th>
                                <th> GST Category</th>
                                <th> Bank Account</th>
                                <th> IFSC</th>
                                <th> Bank Address</th>
                                <th> Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $vendor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $ven): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($ven->id); ?></td>
                                    <td><?php echo e($ven->name); ?></td>
                                    <td><?php echo e($ven->contact_person); ?></td>
                                    <td><?php echo e($ven->contact_mobile); ?></td>
                                    <td><?php echo e($ven->email); ?></td>
                                    <td><?php echo $ven->address; ?></td>
                                    <td><?php echo e(($ven->state_data ? $ven->state_data->name : 'N/A')); ?></td>
                                    <td><?php echo e($ven->pan); ?></td>
                                    <td><?php echo Str::limit($ven->description,100); ?></td>
                                    <td><?php echo e($ven->tin_number); ?></td>
                                    <td><?php echo e($ven->gstin_number); ?></td>
                                    <td><?php echo e($ven->servicetax_number); ?></td>
                                    <td><?php echo e($ven->gst_category); ?></td>
                                    <td><?php echo e($ven->account_number); ?></td>
                                    <td><?php echo e($ven->ifsc_code); ?></td>
                                    <td><?php echo e($ven->bank_address); ?></td>
                                    <td><a href="<?php echo e(route('admin.vendor.edit',$ven->id)); ?>">Edit</a> | <a class="text-danger" href="<?php echo e(route('admin.vendor.delete',$ven->id)); ?>">Delete</a></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php echo e($vendor->links()); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('styles'); ?>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('backend/js/plugins/jquery.dataTables.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('backend/js/plugins/dataTables.bootstrap.min.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
    <script type="text/javascript">
        $('#sampleTable').DataTable({"ordering": false});
    </script>
    <script type="text/javascript">
        $('input[id="toggle-block"]').change(function() {
            var user_id = $(this).data('user_id');
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var is_active = 0;
          if($(this).is(":checked")){
              is_active = 1;
          }else{
            is_active = 0;
          }
          $.ajax({
                type:'POST',
                dataType:'JSON',
                url:"<?php echo e(route('admin.couponcode.updateStatus')); ?>",
                data:{ _token: CSRF_TOKEN, id:user_id, is_active:is_active},
                success:function(response)
                {
                  swal("Success!", response.message, "success");
                },
                error: function(response)
                {
                    
                  swal("Error!", response.message, "error");
                }
              });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\utkarsh\resources\views/admin/vendor/list.blade.php ENDPATH**/ ?>