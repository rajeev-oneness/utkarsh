<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('backend/css/main.css')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('backend/css/font-awesome/4.7.0/css/font-awesome.min.css')); ?>"/>
    <title>Forget Password - <?php echo e(config('app.name')); ?></title>
</head>
<body>
<section class="material-half-bg">
    <div class="cover"></div>
</section>
<section class="login-content">
    <div class="logo">Forget
        <h1><?php echo e(config('app.name')); ?></h1>
    </div>
    <div class="login-box">
        <?php if(session('status')): ?>
        <div class="alert alert-success">
            <?php echo e(session('status')); ?>

        </div>
        <?php endif; ?>
        <form class="login-form" role="form" method="POST" action="<?php echo e(route('admin.password.email')); ?>">
            <?php echo csrf_field(); ?>
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Forget Password</h3>
            <div class="form-group">
                <label class="control-label" for="email">Email Address</label>
                <input class="form-control" type="email" id="email" name="email" placeholder="Email address" autofocus value="<?php echo e(old('email')); ?>" required>
                <?php if($errors->has('email')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('email')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Send Password Reset Link
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>
<script src="<?php echo e(asset('backend/js/jquery-3.2.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('backend/js/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('backend/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('backend/js/main.js')); ?>"></script>
<script src="<?php echo e(asset('backend/js/plugins/pace.min.js')); ?>"></script>
</body>
</html><?php /**PATH /home1/demo9tbi/utkarshelectricals.in/resources/views/admin/auth/passwords/email.blade.php ENDPATH**/ ?>