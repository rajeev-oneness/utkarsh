<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('backend/css/main.css')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('backend/css/font-awesome/4.7.0/css/font-awesome.min.css')); ?>"/>
    <title>Login - <?php echo e(config('app.name')); ?></title>
</head>
<body>
<section class="material-half-bg">
    <div class="cover"></div>
</section>
<section class="login-content">
    <div class="logo">
        <h1><?php echo e(config('app.name')); ?></h1>
    </div>
    <div class="login-box">
        <form class="login-form" action="<?php echo e(route('admin.login.post')); ?>" method="POST" role="form">
            <?php if(session()->has('verified')): ?>
                <div class="alert alert-success">
                    Verified successfully
                </div>
            <?php endif; ?>
            <?php if(session()->has('error')): ?>
                <div class="alert alert-danger">
                    <?php echo e(session()->get('error')); ?>

                </div>
            <?php endif; ?>
            <?php echo csrf_field(); ?>
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
            <div class="form-group">
                <label class="control-label" for="email">Email Address</label>
                <input class="form-control" type="email" id="email" name="email" placeholder="Email address" autofocus value="<?php echo e(old('email')); ?>">
            </div>
            <div class="form-group">
                <label class="control-label" for="password">Password</label>
                <input class="form-control" type="password" id="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <div class="utility">
                    <div class="animated-checkbox">
                        <label>
                            <input type="checkbox" name="remember"><span class="label-text">Remember me</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group btn-container">
                <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
            </div>
            <a class="btn btn-link" href="<?php echo e(route('admin.password.request')); ?>">Forgot Your Password?</a>
        </form>
    </div>
</section>
<script src="<?php echo e(asset('backend/js/jquery-3.2.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('backend/js/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('backend/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('backend/js/main.js')); ?>"></script>
<script src="<?php echo e(asset('backend/js/plugins/pace.min.js')); ?>"></script>
</body>
</html><?php /**PATH /home/demo9dtx/public_html/dev/utkarsh/resources/views/admin/auth/login.blade.php ENDPATH**/ ?>