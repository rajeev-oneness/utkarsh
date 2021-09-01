<?php $__env->startSection('title'); ?> <?php echo e($pageTitle); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="fixed-row">
        <div class="app-title">
            <div class="active-wrap">
                <h1><i class="fa fa-tags"></i> <?php echo e($pageTitle); ?></h1>
                <div class="form-group">
                    
                    <a class="btn btn-secondary" href="<?php echo e(route('admin.products.index')); ?>"><i style="vertical-align: baseline;" class="fa fa-chevron-left"></i>Back</a>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('admin.partials.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row section-mg row-md-body no-nav">
        <div class="col-md-12 mx-auto">
            <div class="tile">
                <form action="<?php echo e(route('admin.products.update')); ?>" method="POST" role="form" enctype="multipart/form-data" id="form1">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" value="<?php echo e($targetproduct->id); ?>">
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
                                <option value="<?php echo e($n->id); ?>"<?php if($n->id==$targetproduct->category_id): ?><?php echo e('selected'); ?> <?php endif; ?>><?php echo e($n->name); ?></option>
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
                            <label class="control-label" for="name">Select Level1 </label>
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
                                <option value="<?php echo e($n->id); ?>"<?php if($n->id==$targetproduct->level1_id): ?><?php echo e('selected'); ?> <?php endif; ?>><?php echo e($n->name); ?></option>
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
                                <option value="<?php echo e($n->id); ?>"<?php if($n->id==$targetproduct->level2_id): ?><?php echo e('selected'); ?> <?php endif; ?>><?php echo e($n->name); ?></option>
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
                                <option value="<?php echo e($n->id); ?>"<?php if($n->id==$targetproduct->level3_id): ?><?php echo e('selected'); ?> <?php endif; ?>><?php echo e($n->name); ?></option>
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
unset($__errorArgs, $__bag); ?>" type="text" name="name" id="name" value="<?php echo e($targetproduct->name); ?>"/>
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
unset($__errorArgs, $__bag); ?>" type="file" id="image" name="image" value="<?php echo e($targetproduct->image); ?>"/>
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
                            <label class="control-label" for="description">Description </label>
                            <textarea name="description" id="description" class="form-control ckeditor <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="8"><?php echo e($targetproduct->description); ?></textarea>
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
                                <option value="">Select Brand</option>
                                <?php $__currentLoopData = $brand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($n->name); ?>"<?php if($n->name==$targetproduct->brand): ?><?php echo e('selected'); ?> <?php endif; ?>><?php echo e($n->name); ?></option>
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
                            <label class="control-label" for="code">Code</span></label>
                            <input class="form-control <?php $__errorArgs = ['code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="code" id="code" value="<?php echo e($targetproduct->code); ?>"/>
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
unset($__errorArgs, $__bag); ?>" type="text" name="product_tags" id="product_tags" value="<?php echo e($targetproduct->product_tags); ?>"/>
                            <?php $__errorArgs = ['product_tags'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        

                        <label class="control-label" for="price"> <b>India </b> </label>
                         
                         <div class="form-group">
                            <label class="control-label" for="price">Price <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control <?php $__errorArgs = ['inprice'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="inprice" id="inprice" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="<?php echo e(old('inprice',$targetproduct->inprice)); ?>" required/>
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
unset($__errorArgs, $__bag); ?>" type="text" name="inoffered_price" id="inoffered_price" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="<?php echo e(old('inoffered_price',$targetproduct->inoffered_price)); ?>" required/>
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
unset($__errorArgs, $__bag); ?>" type="text" name="incurrency" id="incurrency" value="<?php echo e(old('incurrency',$targetproduct->incurrency)); ?>"/>
                            <?php $__errorArgs = ['incurrency'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
unset($__errorArgs, $__bag); ?>" type="text" name="inshipping_charge" id="inshipping_charge" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="<?php echo e(old('inshipping_charge',$targetproduct->inshipping_charge)); ?>"/>
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
unset($__errorArgs, $__bag); ?>" type="text" name="inmeta_title" id="inmeta_title" value="<?php echo e(old('inmeta_title',$targetproduct->inmeta_title)); ?>"/>
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
unset($__errorArgs, $__bag); ?>" type="text" name="inmeta_keywords" id="inmeta_keywords" value="<?php echo e(old('inmeta_keywords',$targetproduct->inmeta_keywords)); ?>"/>
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
                            <label class="control-label" for="inimg_alt_tag">Img Alt Tag </label>
                            <input class="form-control <?php $__errorArgs = ['inimg_alt_tag'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="inimg_alt_tag" id="inimg_alt_tag" value="<?php echo e(old('inimg_alt_tag',$targetproduct->inimg_alt_tag)); ?>"/>
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
                            <label class="control-label" for="inmeta_description">Meta description </label>
                            <textarea name="inmeta_description" id="inmeta_description" class="form-control ckeditor <?php $__errorArgs = ['inmeta_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="8"><?php echo e($targetproduct->inmeta_description); ?></textarea>
                            <?php $__errorArgs = ['inmeta_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <label class="control-label" for="inmeta_description">Attributes</label>
                        <table class="table table-hover custom-data-table-style table-striped" id="">
                            <tr>
                                <td><input class="form-control" type="text" placeholder="Attribute1 Name" name="attr1_name" id="attr1_name"  value="<?php echo e(old('attr1_name',$targetproduct->attr1_name)); ?>"/></td>
                                <td><input class="form-control" type="text" placeholder="Attribute1 Value" name="attr1_value" id="attr1_value" value="<?php echo e(old('attr1_value',$targetproduct->attr1_value)); ?>"/></td>
                            </tr>
                            <tr>
                                <td><input class="form-control" type="text" placeholder="Attribute2 Name" name="attr2_name" id="attr2_name" value="<?php echo e(old('attr2_name',$targetproduct->attr2_name)); ?>"/></td>
                                <td><input class="form-control" type="text" placeholder="Attribute2 Value" name="attr2_value" id="attr2_value" value="<?php echo e(old('attr2_value',$targetproduct->attr2_value)); ?>"/></td>
                            </tr>
                            <tr>
                                <td><input class="form-control" type="text" placeholder="Attribute3 Name" name="attr3_name" id="attr3_name" value="<?php echo e(old('attr3_name',$targetproduct->attr3_name)); ?>"/></td>
                                <td><input class="form-control" type="text" placeholder="Attribute3 Value" name="attr3_value" id="attr3_value" value="<?php echo e(old('attr3_value',$targetproduct->attr3_value)); ?>"/></td>
                            </tr>
                            <tr>
                                <td><input class="form-control" type="text" placeholder="Attribute4 Name" name="attr4_name" id="attr4_name" value="<?php echo e(old('attr4_name',$targetproduct->attr4_name)); ?>"/></td>
                                <td><input class="form-control" type="text" placeholder="Attribute4 Value" name="attr4_value" id="attr4_value" value="<?php echo e(old('attr4_value',$targetproduct->attr4_value)); ?>"/></td>
                            </tr>
                            <tr>
                                <td><input class="form-control" type="text" placeholder="Attribute5 Name" name="attr5_name" id="attr5_name" value="<?php echo e(old('attr5_name',$targetproduct->attr5_name)); ?>"/></td>
                                <td><input class="form-control" type="text" placeholder="Attribute5 Value" name="attr5_value" id="attr5_value" value="<?php echo e(old('attr5_value',$targetproduct->attr5_value)); ?>"/></td>
                            </tr>
                             <tr>
                                <td><input class="form-control" type="text" placeholder="Attribute6 Name" name="attr6_name" id="attr6_name" value="<?php echo e(old('attr6_name',$targetproduct->attr6_name)); ?>"/></td>
                                <td><input class="form-control" type="text" placeholder="Attribute6 Value" name="attr6_value" id="attr6_value" value="<?php echo e(old('attr6_value',$targetproduct->attr6_value)); ?>"/></td>
                            </tr>
                             <tr>
                                <td><input class="form-control" type="text" placeholder="Attribute7 Name" name="attr7_name" id="attr7_name" value="<?php echo e(old('attr7_name',$targetproduct->attr7_name)); ?>"/></td>
                                <td><input class="form-control" type="text" placeholder="Attribute7 Value" name="attr7_value" id="attr7_value" value="<?php echo e(old('attr7_value',$targetproduct->attr7_value)); ?>"/></td>
                            </tr>
                             <tr>
                                <td><input class="form-control" type="text" placeholder="Attribute8 Name" name="attr8_name" id="attr8_name" value="<?php echo e(old('attr8_name',$targetproduct->attr8_name)); ?>"/></td>
                                <td><input class="form-control" type="text" placeholder="Attribute8 Value" name="attr8_value" id="attr8_value" value="<?php echo e(old('attr8_value',$targetproduct->attr8_value)); ?>"/></td>
                            </tr>
                             <tr>
                                <td><input class="form-control" type="text" placeholder="Attribute9 Name" name="attr9_name" id="attr9_name" value="<?php echo e(old('attr9_name',$targetproduct->attr9_name)); ?>"/></td>
                                <td><input class="form-control" type="text" placeholder="Attribute9 Value" name="attr9_value" id="attr9_value" value="<?php echo e(old('attr9_value',$targetproduct->attr9_value)); ?>"/></td>
                            </tr>
                             <tr>
                                <td><input class="form-control" type="text" placeholder="Attribute10 Name" name="attr10_name" id="attr10_name" value="<?php echo e(old('attr10_name',$targetproduct->attr10_name)); ?>"/></td>
                                <td><input class="form-control" type="text" placeholder="Attribute10 Value" name="attr10_value" id="attr10_value" value="<?php echo e(old('attr10_value',$targetproduct->attr10_value)); ?>"/></td>
                            </tr>
                        </table>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save product</button>
                            <a class="btn btn-secondary" href="<?php echo e(route('admin.products.index')); ?>"><i style="vertical-align: baseline;" class="fa fa-chevron-left"></i>Back</a>
                        </div>

                    </div>
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
<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\utkarsh\resources\views/admin/product/edit.blade.php ENDPATH**/ ?>