<!DOCTYPE html>
<html>
  
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Mashroo Store Modest Clothing</title>
      <!-- Fonts -->
       <link href="{{ asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
      <!--Font Awesome [ OPTIONAL ]-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">

  <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">  <link href="{{ asset('frontend/css/style_new.css') }}" rel="stylesheet">

   </head>
   <body>
      <div  class="thank-you">
         <div class="cls-content">
            <div class="container">
               <div class="row">
                  <div class="col-md-8 col-md-offset-2 off">
                     <div class="panel">
                        <div class="panel-body">
                           <div class="cls-content-sm panel">
                              <div class="panel-body text-center">								<div class="thankIcon"><i class="fa fa-check"></i></div>
                                 <h1 class="thank">thank you your order successfully placed </h1>
                                 
                                 <p><b>Your Booking ID : -</b> {{ empty(Request::get('bookingcode')) ? '' : Request::get('bookingcode') }}</p>
                                 <a class="add-cart-d bt-phone thank-btn" href="{{ route('site.home') }}">Back to home</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <script type="text/javascript">
        window.history.forward(-1);
      </script>
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
