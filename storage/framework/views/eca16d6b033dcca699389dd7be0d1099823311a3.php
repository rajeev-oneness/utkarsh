
<?php $__env->startSection('title'); ?> <?php echo e($pageTitle); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> <?php echo e($pageTitle); ?></h1>
            <p><?php echo e($subTitle); ?></p>
        </div>
        <a href="<?php echo e(route('admin.products.index')); ?>" class="btn btn-primary pull-right">Products</a>
    </div>
    <?php echo $__env->make('admin.partials.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover custom-data-table-style table-striped" id="sampleTable">
                        <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Size</th>
                            <th>Ind Price</th>
                            <th>Ind Offer Price</th>
                            <th>Us Price</th>
                            <th>Us Offer Price</th>
                            <th>Uk Price</th>
                            <th>Uk Offer Price</th>
                            <th>Row Price</th>
                            <th>Row Offer Price</th>
                            <th> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $slno =1; ?>
                            <?php $__currentLoopData = $sizelist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sizelists): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($slno); ?></td>
                                    <td><?php echo e($sizelists->sizes); ?></td>

                                    <td><?php echo e($sizelists->inprice); ?></td>
                                    <td><?php echo e($sizelists->inoffered_price); ?></td>

                                    <td><?php echo e($sizelists->usprice); ?></td>
                                    <td><?php echo e($sizelists->usprice); ?></td>

                                    <td><?php echo e($sizelists->ukprice); ?></td>
                                    <td><?php echo e($sizelists->ukoffered_price); ?></td>

                                    <td><?php echo e($sizelists->rowprice); ?></td>
                                    <td><?php echo e($sizelists->rowoffered_price); ?></td>
                                    
                                    <td>
                                        <a href="<?php echo e(route('admin.products.editsize', $sizelists->id)); ?>" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                        
                                        <a href="#" data-id="<?php echo e($sizelists->id); ?>" class="sa-remove btn btn-sm btn-danger edit-btn"><i class="fa fa-trash"></i></a></td>
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
            window.location.href = "<?php echo URL::to('admin/products/sizeDelete/'); ?>"+'/'+categoryId;
            } else {
              swal("Cancelled", "Record is safe", "error");
            }
        });
    });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demo9dtx/public_html/dev/dazzle/resources/views/admin/product/sizelist.blade.php ENDPATH**/ ?>