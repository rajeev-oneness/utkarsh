<!DOCTYPE html>
<html>
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Forgot Password - {{ config('app.name') }}</title>
      <!-- Fonts -->
      <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
      <!--Font Awesome [ OPTIONAL ]-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
   </head>
   
   <body>
      <div  class="reset">
         <div class="cls-content">
            <div class="container">
               <div class="row">
                  <div class="col-md-8 col-md-offset-2 off">
                     <div class="panel">
                        <div class="panel-body">
                           <div class="cls-content-sm panel">
                              @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                              @endif
                              <div class="panel-body">
                                 <h1 class="h3">Reset Password</h1>
                                 <p class="pad-btm">Enter your email address to recover your password. </p>
                                 <form method="post" action="{{ route('password.email') }}">
                                    @csrf
                                    <div class="form-group">
                                       <input id="email" type="email" class="form-control" name="email" placeholder="Email address" autofocus value="{{ old('email') }}" required>
                                       @if ($errors->has('email'))
                                          <span class="help-block">
                                             <strong>{{ $errors->first('email') }}</strong>
                                          </span>
                                       @endif
                                    </div>
                                    
                                    <div class="form-group text-right">
                                       <button class="btn btn-danger btn-lg btn-block" type="submit">
                                       Send Password Reset Link
                                       </button>
                                    </div>
                                 </form>
                                 <div class="pad-top">
                                    <a href="{{ route('site.login') }}" class="back">Back to Login</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--JAVASCRIPT-->
      <!--=================================================-->
      <!--jQuery [ REQUIRED ]-->
      <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
      <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
      <!-- Plugins: Sorted A-Z -->
      <script src="{{ asset('frontend/js/jquery.countdown.min.js') }}"></script>
      <script src="{{ asset('frontend/js/select2.min.js') }}"></script>
      <script src="{{ asset('frontend/js/nouislider.min.js') }}"></script>
      <script src="{{ asset('frontend/js/sweetalert2.min.js') }}"></script>
      <script src="{{ asset('frontend/js/slick.min.js') }}"></script>
      <script src="{{ asset('frontend/js/jquery.share.js') }}"></script>
      <script src="{{ asset('frontend/js/bootstrap-tagsinput.min.js') }}"></script>
      <script src="{{ asset('frontend/js/jodit.min.js') }}"></script>
      <script src="{{ asset('frontend/js/xzoom.min.js') }}"></script>
      <!-- App JS -->
      <script src="{{ asset('frontend/js/main.js') }}"></script>
   </body>
</html>
