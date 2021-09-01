
<?php $__env->startSection('title'); ?> <?php echo e($pageTitle); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
   <div class="fixed-row">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-file-text"></i> <?php echo e($pageTitle); ?></h1>
            <p><?php echo e($subTitle); ?></p>
        </div>
        <a href="<?php echo e(route('admin.couriers.create')); ?>" class="btn btn-primary pull-right">Add New</a>
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
                    <table class="table table-hover custom-data-table-style table-striped" id="sampleTable">
                        <thead>
                            <tr>
                                <th>Sr No</th>
                                <th>Name</th>
                                <th>Weight</th>
                                <th>Weight in Gram</th>
                                <th>Economy Price</th>
                                <th>Express Price</th>
                                <th>COD Charges</th>
                                <th>Free Shipping</th>
                                <th>Website</th>
                                <th> Status </th>
                                <th class="align-center" style="width:100px; min-width:30px;" class=""> Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $slno =1; ?>
                            <?php $__currentLoopData = $courier; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $courier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td> <?php echo e($slno); ?></td>
                                    <td><?php echo e($courier['name']); ?></td>
                                    <td><?php echo e($courier['weight']); ?> <?php echo e($courier['weight_denomination']); ?></td>
                                    <td> 
                                      <?php if($courier['weight_denomination']=='Kgs'): ?><?php echo e($courier['weight'] * 1000); ?>

                                      <?php elseif($courier['weight_denomination']=='Grams'): ?> <?php echo e($courier['weight']); ?>

                                      <?php else: ?> <?php echo e('Not Specified'); ?> 
                                      <?php endif; ?> </td>
                                    <td></td>

                                    <td> <?php echo e($courier['economy']); ?></td>
                                    <td> <?php echo e($courier['express']); ?></td>
                                    <td>
                                      <?php if($courier['shipping']== 1 ): ?><?php echo e('Yes'); ?>

                                      <?php elseif($courier['shipping']== 2): ?> <?php echo e('No'); ?>

                                      <?php else: ?> <?php echo e('Not Specified'); ?> 
                                      <?php endif; ?>
                                  </td>
                                  <td> <?php echo e($courier['website']); ?></td>
                                    <td class="text-center">
                                    <div class="toggle-button-cover margin-auto">
                                        <div class="button-cover">
                                            <div class="button-togglr b2" id="button-11">
                                                <input id="toggle-block" type="checkbox" name="is_active" class="checkbox" data-user_id="<?php echo e($courier['id']); ?>" <?php echo e($courier['is_active'] == 1 ? 'checked' : ''); ?>>
                                                <div class="knobs"><span>Inactive</span></div>
                                                <div class="layer"></div>
                                            </div>
                                        </div>
                                    </div>
                                    </td>
                                    <td class="align-center">
                                        <a href="<?php echo e(route('admin.couriers.edit', $courier->id)); ?>" class="btn btn-sm btn-primary edit-btn"><i class="fa fa-pencil"></i></a>
                                       <div class="btn-group" role="group" aria-label="Second group">
                                        <a href="#" data-id="<?php echo e($courier['id']); ?>" class="sa-remove btn btn-sm btn-danger edit-btn"><i class="fa fa-trash"></i></a>
                                    </div>
                                    </td>
                                </tr>
                            <?php $slno ++; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
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
    $('.sa-remove').on("click",function(){
        var userid = $(this).data('id');
        swal({
          title: "Are you sure?",
          text: "Your will not be able to recover the record!",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Yes, delete it!",
          closeOnConfirm: false
        },
        function(isConfirm){
          if (isConfirm) {
            window.location.href = "couriers/"+userid+"/delete";
            } else {
              swal("Cancelled", "Record is safe", "error");
            }
        });
    });
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
                url:"<?php echo e(route('admin.couriers.updateStatus')); ?>",
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
<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/demo9tbi/utkarshelectricals.in/resources/views/admin/couriers/index.blade.php ENDPATH**/ ?>