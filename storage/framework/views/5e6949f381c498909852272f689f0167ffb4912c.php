<?php $__env->startSection('title'); ?> <?php echo e($pageTitle); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> <?php echo e($pageTitle); ?></h1>
            <p><?php echo e($subTitle); ?></p>
        </div>
        <a href="<?php echo e(route('admin.level1.create')); ?>" class="btn btn-primary pull-right">Add New</a>
    </div>
    <?php echo $__env->make('admin.partials.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover custom-data-table-style table-striped" id="sampleTable">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Category Name</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Size Chart</th>
                            <th>Shipping Charge</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $slno =1; ?>
                            <?php $__currentLoopData = $level1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($slno); ?></td>
                                    <td><?php echo e(empty($level1->category->name) ? '':$level1->category->name); ?></td>
                                    <td><?php echo e($level1->name); ?></td>
                                    <td>
                                        <?php if($level1->image!=''): ?>
                                        <img style="width: 150px;height: 100px;" src="<?php echo e(URL::to('/').'/categories/'); ?><?php echo e($level1->image); ?>">
                                        <?php endif; ?>
                                    </td>
                                    
                                    <td>
                                        <?php if($level1->size_chart!=''): ?>
                                        <img style="width: 150px;height: 100px;" src="<?php echo e(asset('/sizechart/'.$level1->size_chart)); ?>">
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($level1->shipping_charge); ?></td>
                                    <td class="text-center">
                                        <div class="toggle-button-cover margin-auto">
                                             <div class="button-cover">
                                                <div class="button-togglr b2" id="button-11">
                                                    <input id="toggle-block" type="checkbox" name="is_active" class="checkbox" data-category_id="<?php echo e($level1['id']); ?>" <?php echo e($level1['is_active'] == true ? 'checked' : ''); ?>>
                                                    <div class="knobs"><span>Inactive</span></div>
                                                    <div class="layer"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="<?php echo e(route('admin.level1.edit', $level1->id)); ?>" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                             <a href="#" data-id="<?php echo e($level1['id']); ?>" class="sa-remove btn btn-sm btn-danger edit-btn"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php $slno++ ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript" src="<?php echo e(asset('backend/js/plugins/jquery.dataTables.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('backend/js/plugins/dataTables.bootstrap.min.js')); ?>"></script>
    <script type="text/javascript">$('#sampleTable').DataTable({"ordering": false});
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
    <script type="text/javascript">
    $('.sa-remove').on("click",function(){
        var categoryId = $(this).data('id');
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
            window.location.href = "level1/"+categoryId+"/delete";
            } else {
              swal("Cancelled", "Record is safe", "error");
            }
        });
    });
    </script>
    <script type="text/javascript">
        $('input[id="toggle-block"]').change(function() {
            var category_id = $(this).data('category_id');
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
                url:"<?php echo e(route('admin.level1.updateStatus')); ?>",
                data:{ _token: CSRF_TOKEN, id:category_id, is_active:is_active},
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
<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demo9dtx/public_html/dev/dazzle/resources/views/admin/level1/index.blade.php ENDPATH**/ ?>