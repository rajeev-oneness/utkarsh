@extends('site.partials.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')

@push('styles')
<style type="text/css">

   .is-invalid {
      color: red;	  font-size: 11px;	font-weight: 500;
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
                     Account Login
                  </h3>
               </div>
               <div class="px-4 py-3 py-lg-4">
                  <div class="row align-items-center">					
                  <!--<div class="col-12 col-sm-6 left-pic text-center">						 
                    <img src="{{ asset('frontend/img/undraw_Login_re_4vu2.png') }}" class="img-fluid" alt="">                    
                    </div>					
                    <div class="col-lg-1 text-center align-self-stretch">                        
                        <div class="border-right h-100 mx-auto" style="width:1px;"></div>                     
                    </div>  -->                   					
                     <div class="col-12 col-lg">
                        <form class="form-default" role="form" action="{{ route('site.login.save') }}" method="POST">
                           @csrf                                           
                           <div class="row">
                              <div class="col-12">
                                 <div class="form-group">
                                    <!-- <label>email</label> -->
                                    <div class="input-group input-group--style-1">
                                       <input type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" placeholder="Email" name="email" id="email" value="{{ old('email') }}">
                                       <span class="input-group-addon">
                                       <i class="text-md fa fa-user"></i>
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
                                       <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" id="password">
                                       <span class="input-group-addon">
                                       <i class="text-md fa fa-lock"></i>
                                       </span>
                                    </div>
                                    @error('password') <div class="is-invalid"> {{ $message }} </div> @enderror
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-6">
                                 <div class="form-group">
                                    <div class="checkbox pad-btm text-left">
                                       <input id="demo-form-checkbox" class="magic-checkbox" type="checkbox" name="remember" id="remember" >
                                       <label for="demo-form-checkbox" class="text-sm">
                                       Remember Me
                                       </label>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-6 text-right">
                                 <a href="{{ route('password.request') }}" class="link link-xs link--style-3" style="vertical-align: top;">Forgot password?</a>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col text-center">
                                 <button type="submit" class="btn btn-styled btn-base-1 btn-md w-100">Login</button>
                              </div>
                           </div>
                        </form>
                     </div>
                     
                  </div>
               </div>
               <div class="text-center px-35 pb-3">
                  <p class="text-md">
                     Need an account? <a href="{{ route('site.registration') }}" class="strong-600">Register Now</a>
                  </p>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</section>
@endsection