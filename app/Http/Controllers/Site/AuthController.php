<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\BaseController;
use App\Mail\WelcomeMail;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Redirect;
use Route;
use Session;
use Validator;

class AuthController extends BaseController{
    
    use AuthenticatesUsers;

    protected $redirectTo = '/profile';

	public function __construct()
    {
    	$this->middleware('guest:users', ['except' => 'logout']);
    }
    
    public $loginAfterSignUp = true;

    /**
     * user login
     * 
     * @return \Illuminate\Http\Response
     */

    public function loadlogin(){
        
        $this->setPageTitle('Login', '');
        return view('site.auth.login');
    }
    
    /**
     * user login process
     * 
     * @return \Illuminate\Http\Response
     */

    public function login(Request $request){

        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        $rememberMe = $request->has('remember') ? true : false;
        
        $credentials = $request->only('email', 'password');

        if (Auth::guard('users')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $rememberMe)) {
            
             Session::flash('success', 'Welcome to mashroo');
            return redirect()->intended(route('site.home'));
        }
        
        /*if (Auth::guard('users')->attempt($credentials, $rememberMe)) {
            Session::flash('success', 'Welcome to mashroo');
            return redirect()->intended(route('site.home'));
        }*/
              Session::flash('error', 'wrong username or password');
        return back()->withInput($request->only('email', 'remember'));
    }
    
    /**
     * user register page load
     * 
     * @return \Illuminate\Http\Response
     */

    public function loadregister(){
        
        $this->setPageTitle('Register', '');
        return view('site.auth.registration');
    }

    /**
     * user Register process
     * 
     * @return \Illuminate\Http\Response
     */

    public function register(Request $request){

        $this->validate($request, array(
            "name" => "required",
            'email' => 'required|email|unique:users' ,
            'password' => 'required|confirmed|min:6',
        ), 
        array(
            "name.required" => "Name is required",
            "password.required" => "Password is required",
            "email.required" => "Email is required",
            "email.unique" => "Email is already exists",
            "password.confirmed" => "You password and confirmed password does not match.",
        )); 

        $User = new User;
        $User->name = $request->name;
        $User->email = $request->email;
        $User->mobile = $request->mobile;
        $User->password = hash::make($request->password);
        $User->save();

        //Mail::to($User->email)->send(new WelcomeMail($User));
        
        if ($this->loginAfterSignUp) {
            return $this->login($request);
        }
        
        Session::flash('success', 'You have registered successfully. Please login to continue');
        return redirect()->route('site.home');
    }

    /**
     * user logout 
     * 
     */

    public function logout(){

        Auth::guard('users')->logout();

        Session::flash('success', 'You logout successfully');
        return redirect('/');
    }
}