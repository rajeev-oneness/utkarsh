
<?php $__env->startSection('title'); ?> <?php echo e($pageTitle); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> <?php echo e($pageTitle); ?></h1>
            <p><?php echo e($subTitle); ?></p>
        </div>
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
                            <th>Order Id</th>
                            <th>Name</th>
                            <th>Mobile No</th>
                            <th>Order Date</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Payment Mode</th>
                            <th>Transaction Id</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $slno =1; ?>
                            <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($slno); ?></td>
                                    <td><?php echo e($products->unique_code); ?></td>
                                    
                                    <td><?php echo e($products->name); ?></td>
                                    <td><?php echo e($products->mobile); ?></td>
                                    <td><?php echo e(date("d/M/Y", strtotime($products->order_date_time))); ?></td>

                                    <td><?php echo e($products->total_amount +  $products->tax_amount); ?></td>
                                    <td>
                                    <?php if($products->status==1): ?><?php echo e('Order Pending'); ?>

                                    <?php elseif($products->status==2): ?><?php echo e('Order Shipped'); ?>

                                    <?php elseif($products->status==3): ?><?php echo e('Order Completed'); ?>

                                    <?php elseif($products->status==4): ?><?php echo e('Order Modified'); ?>

                                    <?php elseif($products->status==5): ?><?php echo e('Payment Link Raised'); ?>

                                    <?php elseif($products->status==6): ?><?php echo e('Order Cancelled'); ?>

                                    <?php endif; ?>
                                    </td>

                                    <td>
                                    <?php if($products->payment_mode==1): ?><?php echo e('Online Payment'); ?>

                                    <?php elseif($products->payment_mode==2): ?><?php echo e('With Wallet'); ?>

                                    <?php elseif($products->payment_mode==3): ?><?php echo e('COD'); ?>

                                    <?php endif; ?>
                                    </td>
                                    <td><?php echo e($products->transaction_id); ?></td>
                                    
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="<?php echo e(route('admin.orders.invoice', $products->id)); ?>" class="btn btn-sm btn-primary">Invoice</a>
                                            <a href="<?php echo e(route('admin.orders.detail', $products->id)); ?>" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                                            <?php if($products->status == 1): ?>
                                            <a href="javascript:void(0);" data-toggle="modal" data-target="#myModal1<?php echo e($products['id']); ?>" class="btn btn-sm btn-primary"><i class="fa fa-truck" aria-hidden="true"></i></a>
                                            <?php else: ?>
                                            <a href="javascript:void(0);" data-toggle="modal" data-target="#myModal2<?php echo e($products['id']); ?>" class="btn btn-sm btn-primary">Courier Details</a>
                                            <?php endif; ?>
                                            <a href="#" data-id="<?php echo e($products['id']); ?>" class="sa-remove btn btn-sm btn-danger edit-btn"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                    </tr>

                                    

                                    <div class="modal fade myModal2<?php echo e($products['id']); ?>" tabindex="-1" role="dialog" id="myModal2<?php echo e($products['id']); ?>">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Courier Details</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p>Courier Name : <b><?php echo e($products['courier_name']); ?> </b></p>
                                                <p>POD No : <b><?php echo e($products['pod_no']); ?> </b></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                    </div>

                                    

                                    

                                    <div class="modal fade" tabindex="-1" role="dialog" id="myModal1<?php echo e($products['id']); ?>">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Courier Details</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?php echo e(route('admin.orders.updatecourier',$products['id'])); ?>" method="post">
                                                    <?php echo csrf_field(); ?>
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label class="control-label">
                                                                    Courier Name 
                                                                </label>
                                                               
                                                                <select class="form-control" id="courier_name" name="courier_name" required="required"
                                                                >
                                                                <option value="">Select Courier</option>  
                                                                <?php
                                                                foreach ($couriers as $c) {
                                                                ?>
                                                                <option value="<?=$c->name?>"><?=$c->name?></option>
                                                                <?php
                                                                }
                                                                ?> 
                                                                </select>

                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">
                                                                    POD No 
                                                                </label>
                                                                <input type="text" placeholder="Insert POD No" class="form-control" id="pod_no" name="pod_no" required="required">
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <button class="btn btn-yellow btn-block" type="submit">
                                                                        Assign Courier <i class="fa fa-arrow-circle-right"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->

                                

                                
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
            window.location.href = "orders/"+categoryId+"/delete";
            } else {
              swal("Cancelled", "Record is safe", "error");
            }
        });
    });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demo9dtx/public_html/dev/dazzle/resources/views/admin/order/index.blade.php ENDPATH**/ ?>