<!DOCTYPE html>
<html>
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>{{ config('app.name') }}</title>
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
                           <div class="panel-body">
                              <h1 class="h3">Reset Password</h1>
                              <p class="pad-btm">Enter your email address to recover your password. </p>
                              <form method="POST" action="">
                                @csrf
                                <input type="hidden" name="_token" value="">            
                                <div class="form-group">
                                  <input id="email" type="email" class="form-control" name="email" value="" required placeholder="Email">
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
@include('site.partials.footer')
