@extends('site.partials.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')

@push('styles')
<style type="text/css">
      .is-invalid {
         color: red;
      }
      .is-invalid {
         border-color: red;
      }
</style>
@endpush
<section class="bg-light py-5">
<div class="profile">
   <div class="container">
      <div class="row justify-content-center m-0">
         <div class="col-xl-4">
            <div class="card shadow-lg border-0">
               <div class="text-center px-35 pt-4 pb-4">
                  <h3 class="heading heading-4 strong-500">
                     Create an account.
                  </h3>
               </div>
               <div class="px-4 py-3 py-lg-4">
                  <div class="row align-items-center">					
                    <!--<div class="col-12 col-sm-6 left-pic text-center">	             
                        <img src="{{ asset('frontend/img/undraw_Login_re_4vu2.png') }}" class="img-fluid" alt="">                    
                    </div>					
                    <div class="col-lg-1 text-center align-self-stretch">                        
                        <div class="border-right h-100 mx-auto" style="width:1px;"></div>                     
                    </div>-->
                     <div class="col-12 col-lg">
                        <form class="form-default" role="form" action="{{ route('site.registration.save') }}" method="POST">
                           @csrf                                           
                           <div class="row">
                              <div class="col-12">
                                 <div class="form-group">
                                    <!-- <label>name</label> -->
                                    <div class="input-group input-group--style-1">
                                       <input type="text" class="form-control @error('name') is-invalid @enderror" value="" placeholder="Name" name="name" value="{{ old('name') }}">
                                       <span class="input-group-addon">
                                       <i class="text-md fa fa-user"></i>
                                       </span>
                                    </div>
                                       @error('name')
                                       <div class="is-invalid"> {{ $message }} </div>
                                       @enderror
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-12">
                                 <div class="form-group">
                                    <!-- <label>email</label> -->
                                    <div class="input-group input-group--style-1">
                                       <input type="email" class="form-control @error('email') is-invalid @enderror" value="" placeholder="Email" name="email" value="{{ old('email') }}">
                                       <span class="input-group-addon">
                                       <i class="text-md fa fa-envelope"></i>
                                       </span>
                                    </div>
                                       @error('email') <div class="is-invalid"> {{ $message }} </div> @enderror
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-12">
                                 <div class="form-group">
                                    <!-- <label>password</label> -->
                                    <div class="input-group input-group--style-1">
                                       <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password">
                                       <span class="input-group-addon">
                                       <i class="text-md fa fa-lock"></i>
                                       </span>
                                    </div>
                                       @error('password') <div class="is-invalid"> {{ $message }} </div> @enderror
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-12">
                                 <div class="form-group">
                                    <!-- <label>confirm_password</label> -->
                                    <div class="input-group input-group--style-1">
                                       <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm Password" name="password_confirmation">
                                       <span class="input-group-addon">
                                       <i class="text-md fa fa-lock"></i>
                                       </span>
                                    </div>
                                       @error('password_confirmation')<div class="is-invalid"> {{ $message }} </div> @enderror
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-12">
                                 <div class="form-group">
                                    <div class="g-recaptcha" data-sitekey="">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-12">
                                 <div class="checkbox pad-btm text-left">
                                    <input class="magic-checkbox" type="checkbox" name="checkbox_example_1" id="checkboxExample_1a" required>
                                    <label for="checkboxExample_1a" class="text-sm">By signing up you agree to our terms and conditions.</label>
                                 </div>
                              </div>
                           </div>
                           <div class="row align-items-center">
                              <div class="col-12 text-right  mt-3">
                                 <button type="submit" class="btn btn-styled btn-base-1 w-100 btn-md">Create Account</button>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
               <div class="text-center px-35 pb-3">
                  <p class="text-md">
                     Already have an account? <a href="{{ route('site.login') }}" class="strong-600">Log In</a>
                  </p>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</section>
@endsection