<?php $__env->startSection('title'); ?> <?php echo e($pageTitle); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> <?php echo e($pageTitle); ?></h1>
            <p><?php echo e($subTitle); ?></p>
        </div>
        <a href="<?php echo e(route('admin.products.create')); ?>" class="btn btn-primary pull-right">Add New</a>
    </div>
    <?php echo $__env->make('admin.partials.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php
    $category_id = (isset($_GET['category_id']) && $_GET['category_id']!='')?$_GET['category_id']:'';
    $name = (isset($_GET['name']) && $_GET['name']!='')?$_GET['name']:'';
    $code = (isset($_GET['code']) && $_GET['code']!='')?$_GET['code']:'';
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form action="">
                    <table class="table table-hover custom-data-table-style table-striped" id="">
                        <tbody>
                            <tr>
                                <td>
                                    <select class="form-control " name="category_id" id="category_id">
                                        <option value="">Choose Category</option>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($n->id); ?>" <?php if($n->id==$category_id): ?><?php echo e('selected'); ?> <?php endif; ?>><?php echo e($n->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="name" placeholder="Product Title" value="<?php echo e($name); ?>">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="code" placeholder="Product Code" value="<?php echo e($code); ?>">
                                </td>
                                <td>
                                    <button class="btn btn-primary" type="submit" id="btnSave"><i class="fa fa-fw fa-lg fa-check-circle"></i>Search</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    </form>
                    <table class="table table-hover custom-data-table-style table-striped" id="sampleTable">
                        <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Name</th>
                           
                            <th>Category</th>
                            <th>Code</th>
                            <!--<th>Shipping</th>-->
                            <!--<th>Price</th>-->
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $slno =1; ?>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($slno); ?></td>
                                    <td><?php echo e($products->name); ?></td>
                                    
                                    <td><?php echo e(empty($products->category->name) ? '' : $products->category->name); ?></td>
                                    <td><?php echo e($products->code); ?></td>
                                    <!--<td><?php if($products->shipping==1): ?><?php echo e('Yes'); ?> <?php elseif($products->shipping==2): ?><?php echo e('No'); ?> <?php else: ?> <?php echo e('Not specified'); ?> <?php endif; ?>
                                    </td>-->
                                    <!--<td>Price : <?php echo e($products->price); ?> <br>
                                        Offer : <?php echo e($products->offered_price); ?>

                                    </td>-->
                                    
                                    <td class="text-center">
                                        <div class="toggle-button-cover margin-auto">
                                             <div class="button-cover">
                                                <div class="button-togglr b2" id="button-11">
                                                    <input id="toggle-block" type="checkbox" name="is_active" class="checkbox" data-category_id="<?php echo e($products['id']); ?>" <?php echo e($products['is_active'] == true ? 'checked' : ''); ?>>
                                                    <div class="knobs"><span>Inactive</span></div>
                                                    <div class="layer"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="<?php echo e(route('admin.products.edit', $products->id)); ?>" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                            <!--<?php if($products->is_bestseller==1): ?>
                                    <a href="<?php echo e(route('admin.products.bestseller',['id' => $products->id, 'idd'=>'0'] )); ?>" class="btn btn-sm btn-primary">Bestseller</a>
                                            <?php else: ?>
                                    <a href="<?php echo e(route('admin.products.bestseller', ['id' => $products->id, 'idd'=>'1'])); ?>" class="btn btn-sm btn-primary">Not Bestseller</a>
                                            <?php endif; ?>-->

                                            <?php if($products->is_today_deal==1): ?>
                                    <a href="<?php echo e(route('admin.products.todaydeal',['id' => $products->id, 'idd'=>'0'] )); ?>" class="btn btn-sm btn-primary">Flash Deal</a>
                                            <?php else: ?>
                                    <a href="<?php echo e(route('admin.products.todaydeal', ['id' => $products->id, 'idd'=>'1'])); ?>" class="btn btn-sm btn-primary">Not Flash Deal</a>
                                            <?php endif; ?>

                                            <?php if($products->is_new==1): ?>
                                    <a href="<?php echo e(route('admin.products.newarrival',['id' => $products->id, 'idd'=>'0'] )); ?>" class="btn btn-sm btn-primary">Trending</a>
                                            <?php else: ?>
                                    <a href="<?php echo e(route('admin.products.newarrival', ['id' => $products->id, 'idd'=>'1'])); ?>" class="btn btn-sm btn-primary">Not Trending</a>
                                            <?php endif; ?>


                                            <!--<?php if($products->is_pre_order==1): ?>
                                    <a href="<?php echo e(route('admin.products.preorder',['id' => $products->id, 'idd'=>'0'] )); ?>" class="btn btn-sm btn-primary">Pre Order</a>
                                            <?php else: ?>
                                    <a href="<?php echo e(route('admin.products.preorder', ['id' => $products->id, 'idd'=>'1'])); ?>" class="btn btn-sm btn-primary">Not Pre Order</a>
                                            <?php endif; ?>-->

                                            <?php if($products->stock==1): ?>
                                    <a href="<?php echo e(route('admin.products.stock',['id' => $products->id, 'idd'=>'0'] )); ?>" class="btn btn-sm btn-primary">In Stock</a>
                                            <?php else: ?>
                                    <a href="<?php echo e(route('admin.products.stock', ['id' => $products->id, 'idd'=>'1'])); ?>" class="btn btn-sm btn-primary">Out Of Stock</a>
                                            <?php endif; ?>
                                            <!-- <a href="<?php echo e(route('admin.products.addsize', $products->id)); ?>" class="btn btn-sm btn-primary">Add Size</a>
                                            <a href="<?php echo e(route('admin.products.sizelist', $products->id)); ?>" class="btn btn-sm btn-primary">Size list</a> -->
                                            <a href="<?php echo e(route('admin.products.detail', $products->id)); ?>" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                                             <a href="#" data-id="<?php echo e($products['id']); ?>" class="sa-remove btn btn-sm btn-danger edit-btn"><i class="fa fa-trash"></i></a>
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
    <!-- <script type="text/javascript" src="<?php echo e(asset('backend/js/plugins/jquery.dataTables.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('backend/js/plugins/dataTables.bootstrap.min.js')); ?>"></script>
    <script type="text/javascript">$('#sampleTable').DataTable({"ordering": false});
    </script> -->
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
            window.location.href = "products/"+categoryId+"/delete";
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
                url:"<?php echo e(route('admin.products.updateStatus')); ?>",
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
<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\utkarsh\resources\views/admin/product/index.blade.php ENDPATH**/ ?>