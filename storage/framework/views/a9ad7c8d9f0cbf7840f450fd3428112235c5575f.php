
<?php $__env->startSection('title'); ?> <?php echo e($pageTitle); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="fixed-row">
        <div class="app-title">
            <div class="active-wrap">
                <h1><i class="fa fa-tags"></i> <?php echo e($pageTitle); ?></h1>
                <div class="form-group">
                    <!--<button class="btn btn-primary" type="button" id="btnSave"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save product</button>-->
                    <a class="btn btn-secondary" href="<?php echo e(route('admin.products.index')); ?>"><i style="vertical-align: baseline;" class="fa fa-chevron-left"></i>Back</a>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('admin.partials.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row section-mg row-md-body no-nav">
        <div class="col-md-12 mx-auto">
            <div class="tile">
                <form action="<?php echo e(route('admin.products.store')); ?>" method="POST" role="form" enctype="multipart/form-data" id="form1">
                    <?php echo csrf_field(); ?>
                    <div class="tile-body form-body">
                        <div class="form-group">
                            <label class="control-label" for="name">Select Category <span class="m-l-5 text-danger"> *</span></label>
                            <select class="form-control <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="category_id" id="category_id">
                                <option value="">Select Category</option>
                                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($n->id); ?>"><?php echo e($n->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="name">Select Level1</label>
                            <select class="form-control <?php $__errorArgs = ['level1_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="level1_id" id="level1_id">
                                <option value="">Select Level1</option>
                                <?php $__currentLoopData = $level1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($n->id); ?>"><?php echo e($n->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['level1_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="name">Select level2 </label>
                            <select class="form-control <?php $__errorArgs = ['level2_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="level2_id" id="level2_id">
                                <option value="">Select level2</option>
                                <?php $__currentLoopData = $level2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($n->id); ?>"><?php echo e($n->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['level2_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="name">Select level3 </label>
                            <select class="form-control <?php $__errorArgs = ['level3_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="level3_id" id="level3_id">
                                <option value="">Select level3</option>
                                <?php $__currentLoopData = $level3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($n->id); ?>"><?php echo e($n->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['level3_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>    
                        <div class="form-group">
                            <label class="control-label" for="name">Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="name" id="name" value="<?php echo e(old('name')); ?>"/>
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label class="control-label"> Image<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="file" id="image" name="image"/>
                            <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label class="control-label"> Multiple Images</label>
                            <input class="form-control <?php $__errorArgs = ['images[]'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="file" id="images[]" name="images[]"/ multiple>
                            <?php $__errorArgs = ['images[]'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label" for="description">Description</label>
                            <textarea name="description" id="description" class="form-control ckeditor <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="8" required></textarea>
                            <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="name">Select Brand </label>
                            <select class="form-control <?php $__errorArgs = ['brand'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="brand" id="brand">
                                <?php $__currentLoopData = $brand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="">Select Brand</option>
                                <option value="<?php echo e($n->name); ?>"><?php echo e($n->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['brand'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="code">Sku Code</span></label>
                            <input class="form-control <?php $__errorArgs = ['code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="code" id="code" value="<?php echo e(old('code')); ?>"/>
                            <?php $__errorArgs = ['code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="product_tags">Product Tags</label>
                            <input class="form-control <?php $__errorArgs = ['product_tags'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="product_tags" id="product_tags" value="<?php echo e(old('product_tags')); ?>"/>
                            <?php $__errorArgs = ['product_tags'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        

                        <label class="control-label" for="price"><b>India</b> </label>
                        
                        <div class="form-group">
                            <label class="control-label" for="price">Price <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control <?php $__errorArgs = ['inprice'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="inprice" id="inprice" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="<?php echo e(old('inprice')); ?>" required/>
                            <?php $__errorArgs = ['inprice'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="inoffered_price">Offered Price <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control <?php $__errorArgs = ['inoffered_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="inoffered_price" id="inoffered_price" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="<?php echo e(old('inoffered_price')); ?>" required/>
                            <?php $__errorArgs = ['inoffered_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label" for="incurrency">Currency </label>
                            <input class="form-control <?php $__errorArgs = ['incurrency'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="incurrency" id="incurrency" value="<?php echo e(old('incurrency')); ?>"/>
                            <?php $__errorArgs = ['incurrency'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="link">shipping charges <span class="m-l-5 text-danger"> *</span></label>
                            <label class="radio-inline">
                            <input type="radio" class="grey" name="in_is_shipping_charges_include" value="1" checked>
                            Included
                            </label>
                            <label class="radio-inline">
                            <input type="radio" class="grey" name="in_is_shipping_charges_include" value="2">
                            Not Included
                            </label>
                        </div>

                        <!--<div class="form-group">
                            <label class="control-label" for="inshipping_charge">Shipping Charge <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control <?php $__errorArgs = ['inshipping_charge'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="inshipping_charge" id="inshipping_charge" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="<?php echo e(old('inshipping_charge')); ?>"/>
                            <?php $__errorArgs = ['inshipping_charge'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>-->

                        <div class="form-group">
                            <label class="control-label" for="inmeta_title">Meta Title </label>
                            <input class="form-control <?php $__errorArgs = ['inmeta_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="inmeta_title" id="inmeta_title" value="<?php echo e(old('inmeta_title')); ?>"/>
                            <?php $__errorArgs = ['inmeta_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="inmeta_keywords">Meta Keywords </label>
                            <input class="form-control <?php $__errorArgs = ['inmeta_keywords'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="inmeta_keywords" id="inmeta_keywords" value="<?php echo e(old('inmeta_keywords')); ?>"/>
                            <?php $__errorArgs = ['inmeta_keywords'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="inimg_alt_tag">Img Alt Tag</label>
                            <input class="form-control <?php $__errorArgs = ['inimg_alt_tag'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="inimg_alt_tag" id="inimg_alt_tag" value="<?php echo e(old('inimg_alt_tag')); ?>"/>
                            <?php $__errorArgs = ['inimg_alt_tag'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="inmeta_description">Meta Description</label>
                            <textarea name="inmeta_description" id="inmeta_description" class="form-control ckeditor <?php $__errorArgs = ['inmeta_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="8"></textarea>
                            <?php $__errorArgs = ['inmeta_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        

                        <!--<label class="control-label" for="price"><b> Us</b> </label>-->
                        
                        <!--<div class="form-group">-->
                        <!--    <label class="control-label" for="price">Price <span class="m-l-5 text-danger"> *</span></label>-->
                        <!--    <input class="form-control <?php $__errorArgs = ['usprice'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="usprice" id="usprice" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="<?php echo e(old('usprice')); ?>" required/>-->
                        <!--    <?php $__errorArgs = ['usprice'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>-->
                        <!--</div>-->

                        <!--<div class="form-group">-->
                        <!--    <label class="control-label" for="usoffered_price">Offered Price <span class="m-l-5 text-danger"> *</span></label>-->
                        <!--    <input class="form-control <?php $__errorArgs = ['usoffered_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="usoffered_price" id="usoffered_price" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="<?php echo e(old('usoffered_price')); ?>" required/>-->
                        <!--    <?php $__errorArgs = ['usoffered_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>-->
                        <!--</div>-->

                        <!--<div class="form-group">-->
                        <!--    <label class="control-label" for="uscurrency">Currency </label>-->
                        <!--    <input class="form-control <?php $__errorArgs = ['uscurrency'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="uscurrency" id="uscurrency" value="<?php echo e(old('uscurrency')); ?>"/>-->
                        <!--    <?php $__errorArgs = ['uscurrency'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>-->
                        <!--</div>-->

                        <!--<div class="form-group">-->
                        <!--    <label class="control-label" for="link">shipping charges <span class="m-l-5 text-danger"> *</span></label>-->
                        <!--    <label class="radio-inline">-->
                        <!--    <input type="radio" class="grey" name="us_is_shipping_charges_include" value="1" checked>-->
                        <!--    Included-->
                        <!--    </label>-->
                        <!--    <label class="radio-inline">-->
                        <!--    <input type="radio" class="grey" name="us_is_shipping_charges_include" value="2">-->
                        <!--    Not Included-->
                        <!--    </label>-->
                        <!--</div>-->

                        <!--<div class="form-group">
                        <!--    <label class="control-label" for="usshipping_charge">Shipping Charge <span class="m-l-5 text-danger"> *</span></label>-->
                        <!--    <input class="form-control <?php $__errorArgs = ['usshipping_charge'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="usshipping_charge" id="usshipping_charge" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="<?php echo e(old('usshipping_charge')); ?>"/>-->
                        <!--    <?php $__errorArgs = ['usshipping_charge'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>-->
                        <!--</div>-->-->

                        <!--<div class="form-group">-->
                        <!--    <label class="control-label" for="usmeta_title">Meta Title </label>-->
                        <!--    <input class="form-control <?php $__errorArgs = ['usmeta_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="usmeta_title" id="usmeta_title" value="<?php echo e(old('usmeta_title')); ?>"/>-->
                        <!--    <?php $__errorArgs = ['usmeta_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>-->
                        <!--</div>-->

                        <!--<div class="form-group">-->
                        <!--    <label class="control-label" for="usmeta_keywords">Meta Keywords </label>-->
                        <!--    <input class="form-control <?php $__errorArgs = ['usmeta_keywords'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="usmeta_keywords" id="usmeta_keywords" value="<?php echo e(old('usmeta_keywords')); ?>"/>-->
                        <!--    <?php $__errorArgs = ['usmeta_keywords'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>-->
                        <!--</div>-->

                        <!--<div class="form-group">-->
                        <!--    <label class="control-label" for="usimg_alt_tag">Img Alt Tag</label>-->
                        <!--    <input class="form-control <?php $__errorArgs = ['usimg_alt_tag'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="usimg_alt_tag" id="usimg_alt_tag" value="<?php echo e(old('usimg_alt_tag')); ?>"/>-->
                        <!--    <?php $__errorArgs = ['usimg_alt_tag'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>-->
                        <!--</div>-->

                        <!--<div class="form-group">-->
                        <!--    <label class="control-label" for="usmeta_description">Meta Description</label>-->
                        <!--    <textarea name="usmeta_description" id="usmeta_description" class="form-control ckeditor <?php $__errorArgs = ['usmeta_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="8"></textarea>-->
                        <!--    <?php $__errorArgs = ['usmeta_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>-->
                        <!--</div>-->


                        

                        <!--<label class="control-label" for="price"><b>Uk </b> </label>-->
                        
                        <!--<div class="form-group">-->
                        <!--    <label class="control-label" for="price">Price <span class="m-l-5 text-danger"> *</span></label>-->
                        <!--    <input class="form-control <?php $__errorArgs = ['ukprice'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="ukprice" id="ukprice" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="<?php echo e(old('ukprice')); ?>" required/>-->
                        <!--    <?php $__errorArgs = ['ukprice'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>-->
                        <!--</div>-->

                        <!--<div class="form-group">-->
                        <!--    <label class="control-label" for="ukoffered_price">Offered Price <span class="m-l-5 text-danger"> *</span></label>-->
                        <!--    <input class="form-control <?php $__errorArgs = ['ukoffered_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="ukoffered_price" id="ukoffered_price" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="<?php echo e(old('ukoffered_price')); ?>" required/>-->
                        <!--    <?php $__errorArgs = ['ukoffered_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>-->
                        <!--</div>-->
                        
                        <!--<div class="form-group">-->
                        <!--    <label class="control-label" for="ukcurrency">Currency </label>-->
                        <!--    <input class="form-control <?php $__errorArgs = ['ukcurrency'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="ukcurrency" id="ukcurrency" value="<?php echo e(old('ukcurrency')); ?>"/>-->
                        <!--    <?php $__errorArgs = ['ukcurrency'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>-->
                        <!--</div>-->

                        <!--<div class="form-group">-->
                        <!--    <label class="control-label" for="link">shipping charges <span class="m-l-5 text-danger"> *</span></label>-->
                        <!--    <label class="radio-inline">-->
                        <!--    <input type="radio" class="grey" name="uk_is_shipping_charges_include" value="1" checked>-->
                        <!--    Included-->
                        <!--    </label>-->
                        <!--    <label class="radio-inline">-->
                        <!--    <input type="radio" class="grey" name="uk_is_shipping_charges_include" value="2">-->
                        <!--    Not Included-->
                        <!--    </label>-->
                        <!--</div>-->

                        <!--<div class="form-group">
                        <!--    <label class="control-label" for="ukshipping_charge">Shipping Charge <span class="m-l-5 text-danger"> *</span></label>-->
                        <!--    <input class="form-control <?php $__errorArgs = ['ukshipping_charge'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="ukshipping_charge" id="ukshipping_charge" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="<?php echo e(old('ukshipping_charge')); ?>"/>-->
                        <!--    <?php $__errorArgs = ['ukshipping_charge'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>-->
                        <!--</div>-->-->

                        <!--<div class="form-group">-->
                        <!--    <label class="control-label" for="ukmeta_title">Meta Title </label>-->
                        <!--    <input class="form-control <?php $__errorArgs = ['ukmeta_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="ukmeta_title" id="ukmeta_title" value="<?php echo e(old('ukmeta_title')); ?>"/>-->
                        <!--    <?php $__errorArgs = ['ukmeta_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>-->
                        <!--</div>-->

                        <!--<div class="form-group">-->
                        <!--    <label class="control-label" for="ukmeta_keywords">Meta Keywords </label>-->
                        <!--    <input class="form-control <?php $__errorArgs = ['ukmeta_keywords'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="ukmeta_keywords" id="ukmeta_keywords" value="<?php echo e(old('ukmeta_keywords')); ?>"/>-->
                        <!--    <?php $__errorArgs = ['ukmeta_keywords'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>-->
                        <!--</div>-->

                        <!--<div class="form-group">-->
                        <!--    <label class="control-label" for="ukimg_alt_tag">Img Alt Tag</label>-->
                        <!--    <input class="form-control <?php $__errorArgs = ['ukimg_alt_tag'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="ukimg_alt_tag" id="ukimg_alt_tag" value="<?php echo e(old('ukimg_alt_tag')); ?>"/>-->
                        <!--    <?php $__errorArgs = ['ukimg_alt_tag'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>-->
                        <!--</div>-->

                        <!--<div class="form-group">-->
                        <!--    <label class="control-label" for="ukmeta_description">Meta Description </label>-->
                        <!--    <textarea name="ukmeta_description" id="ukmeta_description" class="form-control ckeditor <?php $__errorArgs = ['ukmeta_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="8"></textarea>-->
                        <!--    <?php $__errorArgs = ['ukmeta_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>-->
                        <!--</div>-->

                        

                        <!--<label class="control-label" > <b>Row </b> </label>-->
                        

                        <!--<div class="form-group">-->
                        <!--    <label class="control-label" for="price">Price <span class="m-l-5 text-danger"> *</span></label>-->
                        <!--    <input class="form-control <?php $__errorArgs = ['rowprice'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="rowprice" id="rowprice" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="<?php echo e(old('rowprice')); ?>" required/>-->
                        <!--    <?php $__errorArgs = ['rowprice'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>-->
                        <!--</div>-->

                        <!--<div class="form-group">-->
                        <!--    <label class="control-label" for="rowoffered_price">Offered Price <span class="m-l-5 text-danger"> *</span></label>-->
                        <!--    <input class="form-control <?php $__errorArgs = ['rowoffered_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="rowoffered_price" id="rowoffered_price" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="<?php echo e(old('rowoffered_price')); ?>" required/>-->
                        <!--    <?php $__errorArgs = ['rowoffered_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>-->
                        <!--</div>-->
                        
                        <!--<div class="form-group">-->
                        <!--    <label class="control-label" for="rowcurrency">Currency </label>-->
                        <!--    <input class="form-control <?php $__errorArgs = ['rowcurrency'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="rowcurrency" id="rowcurrency" value="<?php echo e(old('rowcurrency')); ?>"/>-->
                        <!--    <?php $__errorArgs = ['rowcurrency'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>-->
                        <!--</div>-->

                        <!--<div class="form-group">-->
                        <!--    <label class="control-label" for="link">shipping charges <span class="m-l-5 text-danger"> *</span></label>-->
                        <!--    <label class="radio-inline">-->
                        <!--    <input type="radio" class="grey" name="row_is_shipping_charges_include" value="1" checked>-->
                        <!--    Included-->
                        <!--    </label>-->
                        <!--    <label class="radio-inline">-->
                        <!--    <input type="radio" class="grey" name="row_is_shipping_charges_include" value="2">-->
                        <!--    Not Included-->
                        <!--    </label>-->
                        <!--</div>-->

                        <!--<div class="form-group">
                        <!--    <label class="control-label" for="rowshipping_charge">Shipping Charge <span class="m-l-5 text-danger"> *</span></label>-->
                        <!--    <input class="form-control <?php $__errorArgs = ['rowshipping_charge'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="rowshipping_charge" id="rowshipping_charge" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="<?php echo e(old('rowshipping_charge')); ?>"/>-->
                        <!--    <?php $__errorArgs = ['rowshipping_charge'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>-->
                        <!--</div>-->-->

                        <!--<div class="form-group">-->
                        <!--    <label class="control-label" for="rowmeta_title">Meta Title </label>-->
                        <!--    <input class="form-control <?php $__errorArgs = ['rowmeta_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="rowmeta_title" id="rowmeta_title" value="<?php echo e(old('rowmeta_title')); ?>"/>-->
                        <!--    <?php $__errorArgs = ['rowmeta_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>-->
                        <!--</div>-->

                        <!--<div class="form-group">-->
                        <!--    <label class="control-label" for="rowmeta_keywords">Meta Keywords </label>-->
                        <!--    <input class="form-control <?php $__errorArgs = ['rowmeta_keywords'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="rowmeta_keywords" id="rowmeta_keywords" value="<?php echo e(old('rowmeta_keywords')); ?>"/>-->
                        <!--    <?php $__errorArgs = ['rowmeta_keywords'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>-->
                        <!--</div>-->

                        <!--<div class="form-group">-->
                        <!--    <label class="control-label" for="rowimg_alt_tag">Img Alt Tag</label>-->
                        <!--    <input class="form-control <?php $__errorArgs = ['rowimg_alt_tag'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="rowimg_alt_tag" id="rowimg_alt_tag" value="<?php echo e(old('rowimg_alt_tag')); ?>"/>-->
                        <!--    <?php $__errorArgs = ['rowimg_alt_tag'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>-->
                        <!--</div>-->

                        <!--<div class="form-group">-->
                        <!--    <label class="control-label" for="rowmeta_description">Meta Description</label>-->
                        <!--    <textarea name="rowmeta_description" id="rowmeta_description" class="form-control ckeditor <?php $__errorArgs = ['rowmeta_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="8"></textarea>-->
                        <!--    <?php $__errorArgs = ['rowmeta_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>-->
                        <!--</div>-->
                        
                        <button class="btn btn-primary" type="submit" ><i class="fa fa-fw fa-lg fa-check-circle"></i>Save product</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script type="text/javascript" src="<?php echo e(asset('backend/js/plugins/ckeditor/ckeditor.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('backend/js/plugins/ckeditor/adapters/jquery.js')); ?>"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#btnSave").on("click",function(){
            $('#form1').submit();
        })
    })
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demo9dtx/public_html/dev/dazzle/resources/views/admin/product/create.blade.php ENDPATH**/ ?>