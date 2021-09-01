<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\BaseController;
use App\Mail\WelcomeMail;
use App\Models\Booking;
use App\Models\Product;
use App\Models\User;
use App\Models\Wishlist;
use App\Models\UserShipping;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Redirect;
use Route;
use Session;
use Validator;

class ProfileController extends BaseController{

    public function __construct()
    {
        
    }

     /**
     * profile
     * 
     * 
     */
    public function profile(){
        
        $user = User::findOrFail(Auth::guard('users')->user()->id);
         
        $this->setPageTitle('My Profile', '');
        return view('site.auth.profile',compact('user'));
    }

     /**
     * update profile
     * 
     * @return \Illuminate\Http\Response
     */

    public function updateprofile(Request $request){

        $this->validate($request,[
        'name' => 'required' ,
        ],
        [
        'name.required' => 'Name is required',
        ]);

        $data['name'] = $request->name;


        if( ($request->password!=null) && ($request->new_password!=null) ){
           $check = $this->passwordchange($request->password, $request->new_password);

           if($check['type']=='error'){
            $request->session()->flash("error",$check['message']);
            return back();
           } else if($check['type']=='success') {
              $data['password'] = Hash::make($request->new_password);
           }
        }
        
        if( ($request->address!=null) ||  ($request->city!=null) ||  ($request->pin_code!=null) ||  ($request->phone!=null)){

            $shippingdata['address'] = $request->address;
            $shippingdata['city'] = $request->city;
            $shippingdata['pin_code'] = $request->pin_code;
            $shippingdata['phone'] = $request->phone;
            $shippingdata['user_id'] = Auth::guard('users')->user()->id;
            $shippingdata['country'] = $request->country;

            $shippcount = UserShipping::where('user_id',Auth::guard('users')->user()->id)->get();

            if(count($shippcount)){
                UserShipping::where('user_id', Auth::guard('users')->user()->id)
                  ->update(['address' => $shippingdata['address'],
                           'city' => $shippingdata['city'],
                           'pin_code' => $shippingdata['pin_code'],
                           'phone' => $shippingdata['phone'],
                          'country' => $shippingdata['country']
                         ]); 
            } else {
                UserShipping::create($shippingdata);
            }
        }

        $user = User::findOrFail(Auth::guard('users')->user()->id);
        $user->update($data);

        $request->session()->flash("success","Profile updated sucessfully");
        return back();
    }

    public function passwordchange($password, $new_password){

        if (!(Hash::check($password, Auth::user()->password))) {
            $info['message'] = 'Your current password does not matches with the password you provided. Please try again.';
            $info['type'] = 'error';
            return $info;
        }

        if(strcmp($password, $new_password) == 0){
            $info['message'] = 'New Password cannot be same as your current password. Please choose a different password.';
            $info['type'] = 'error';
            return $info;
        }

        $info['type'] = 'success';
        return $info;
    }

    public function mybookings(){

        $user_id = Auth::guard('users')->user()->id;
        /*$bookings = DB::select("select booking_products.*, bookings.order_date_time as date_time,bookings.unique_code as code from bookings
        left join booking_products
        on(booking_products.booking_id=bookings.id) where booking_id in (select id from bookings where user_id = '$user_id')");*/
        
        $bookings = DB::select("select * from bookings where user_id ='$user_id'");

        $this->setPageTitle('My Bookings', '');
        return view('site.auth.purchasehistory',compact('bookings'));
    }

    public function bookingDetails($bookingId){

        $booking = Booking::findOrFail($bookingId);

        $this->setPageTitle('Booking Details', '');
        return view('site.profile.invoice',compact('booking'));
    }

    public function changepassword(){

       $this->setPageTitle('Change Password', '');
       return view('site.profile.changepassword');
    }

     /**
     * my wishlist
     * 
     * @return \Illuminate\Http\Response
     */
    
    public function wishlist(){

        $user_id = Auth::guard('users')->user()->id;

        $products = DB::select("select * from products where id in (select product_id from wish_lists where user_id='$user_id')");
        //dd($products);
        $this->setPageTitle('My Wishlist', '');
        return view('site.auth.wishlist',compact('products'));
    }
    
    /**
     * add to wishlist a product
     * 
     * @return productId
     */

    public function addwishlist($productId){

       if(! Auth::guard('users')->check()){
            Session::flash('error', 'You need to login');
            return back();
       }

       $userId =  Auth::guard('users')->user()->id;

       $result = Wishlist::where('user_id',$userId)->where('product_id',$productId)->get();

       if(count($result)){
           Session::flash('error', 'You have already added this product to your wishlist.');
           return back();
       } else {

            $data['user_id'] = $userId;
            $data['product_id'] = $productId;
            $data['is_active'] = 1;

            Wishlist::create($data);
            Session::flash('success', 'You have successfully added this product to your wishlist.');
       }

       return back();
    }

    /**
     * delete from wishlist a product
     * 
     * @return productId
     */

    public function deletewishlist($id){
        $user_id = Auth::guard('users')->user()->id;

        $res = DB::delete("delete from wish_lists where product_id='$id' and user_id='$user_id'");

        if ($res) {
            Session::flash('success', 'Product successfully deleted from your wishlist');
        } 
        
        Session::flash('error', 'went wrong');
        return Redirect::back();
    }
}