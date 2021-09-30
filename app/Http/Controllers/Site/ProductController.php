<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\BookingProduct;
use App\Models\Cart;
use App\Models\State;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImages;
use App\Models\Productsize;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Auth;

class ProductController extends BaseController {

  /**
    * @param categoryId
    * @param $key [Category Name]
    * category wise product
    */
       
    public function categorywiseproduct(Request $request, $categoryId, $key){

        $level1Id = $request->input('sub_category');
        
        $sort_by = $request->has('sort_by') ? $request->get('sort_by') : null;
        $maxprice = $request->has('maxprice') ? $request->get('maxprice') : null;
        $category_ids = $request->has('category_ids') ? $request->get('category_ids'):array();
        //dd($category_ids);
        
        if($level1Id!= null) {
            
        $products = Product::where('is_active',1)->where('category_id',$categoryId)->where('level1_id',$level1Id)->get();
        } else {
        $products = Product::where('is_active',1)->where('category_id',$categoryId)->get();
        }
        
        if($request->has('sort_by') && $request->has('category_ids')){
            $products = $this->sortBy($sort_by,$category_ids,$maxprice);
        }
        
        if($request->has('sort_by') && empty($category_ids)){
            $products = $this->onlysortby($sort_by,$categoryId,$maxprice);
        }
        
        $categories = Category::where('is_active',1)->orderBy('orderby','asc')->get();

        $this->setPageTitle('Product List', '');
      
        return view('site.products.list',compact('products','categories','key'));
    }
    
    
    public function sortBy($sort_by,$category_ids,$maxprice){

        //dump($category_ids);

        if($sort_by==1){
           $products = Product::where('is_active',1)->where('inoffered_price','<=',$maxprice)->whereIn('category_id',$category_ids)->orderBy('id','desc')->get();
        }elseif($sort_by==2){
           $products = Product::where('is_active',1)->where('inoffered_price','<=',$maxprice)->whereIn('category_id',$category_ids)->orderBy('id','asc')->get();
        }elseif($sort_by==3){
           $products = Product::where('is_active',1)->where('inoffered_price','<=',$maxprice)->whereIn('category_id',$category_ids)->orderBy('inoffered_price','asc')->get();
        }elseif($sort_by==4){
           $products = Product::where('is_active',1)->where('inoffered_price','<=',$maxprice)->whereIn('category_id',$category_ids)->orderBy('inoffered_price','desc')->get();
        } elseif($sort_by== null) {
            $products = Product::where('is_active',1)->where('inoffered_price','<=',$maxprice)->whereIn('category_id',$category_ids)->get();
        }

        return $products;
    }
    
    public function onlysortby($sort_by,$categoryId,$maxprice){

        if($sort_by==1){
           $products = Product::where('is_active',1)->where('inoffered_price','<=',$maxprice)->where('category_id',$categoryId)->orderBy('id','desc')->get();
        }elseif($sort_by==2){
           $products = Product::where('is_active',1)->where('inoffered_price','<=',$maxprice)->where('category_id',$categoryId)->orderBy('id','asc')->get();
        }elseif($sort_by==3){
           $products = Product::where('is_active',1)->where('inoffered_price','<=',$maxprice)->where('category_id',$categoryId)->orderBy('inoffered_price','asc')->get();
        }elseif($sort_by==4){
           $products = Product::where('is_active',1)->where('inoffered_price','<=',$maxprice)->where('category_id',$categoryId)->orderBy('inoffered_price','desc')->get();
        }
        return $products;
    }

  /**
    * @param $productId
    * @param $key [Product Name]
    * product details
    */

    public function productdetails($productId, $key){

        $product = Product::findOrFail($productId);

        $product_images = array();
        $image = new \stdClass();
        $image->id = 1000;
        $image->product_id = $product->id;
        $image->image = $product->image;

        array_push($product_images, $image);

        $images = ProductImages::where('book_id',$product->id)->get();

        foreach ($images as $i) {
            array_push($product_images, $i);
        }

        //dd($product_images);

        //$productsizes = DB::select("select * from sizes where id in (select sizes from productsizes where sizes.id = productsizes.sizes and productsizes.productid='$product->id')");
        
        $productsizes = DB::select("select sizes.*, productsizes.inprice, productsizes.inoffered_price, productsizes.productid
        from sizes left join productsizes
        on(sizes.id = productsizes.sizes) where productsizes.productid='$product->id'");
        //dd($productsizes);
        $relatedproduct = [];
        
        if(!empty($product->level5category->id)){
            $relatedproduct = Product::where('id','!=',$product->id)->where('level5_id',$product->level5category->id)->where('is_active',1)->take(12)->get();
        } elseif(!empty($product->level4category->id)){
            $relatedproduct = Product::where('id','!=',$product->id)->where('level2_id',$product->level4category->id)->where('is_active',1)->take(12)->get();
        } elseif(!empty($product->level3category->id)){
            $relatedproduct = Product::where('id','!=',$product->id)->where('level3_id',$product->level3category->id)->where('is_active',1)->take(12)->get();
        } elseif(!empty($product->level2category->id)){
            $relatedproduct = Product::where('id','!=',$product->id)->where('level2_id',$product->level2category->id)->where('is_active',1)->take(12)->get();
        } elseif(!empty($product->level1category->id)){
            $relatedproduct = Product::where('id','!=',$product->id)->where('level1_id',$product->level1category->id)->where('is_active',1)->take(12)->get();
        }elseif(!empty($product->category->id)){
            $relatedproduct = Product::where('id','!=',$product->id)->where('category_id',$product->category->id)->where('is_active',1)->take(12)->get();
        }

        $this->setPageTitle('Product Details', '');
        return view('site.products.details',compact('product','productsizes','product_images','relatedproduct'));
    }
    
    /**
     * get the search result
     * 
     * @return \Illuminate\Http\Response
     */

    public function SearchProducts(Request $request){

        $search_keyword = $request->get('search_keyword');

        $sort_by = $request->has('sort_by') ? $request->get('sort_by') : null;

        //$products = Product::Where('name', 'like', '%' . $search_keyword . '%')->orWhere('product_tags', 'like', '%' . $search_keyword . '%')->where('is_active',1)->where('is_deleted',0)->get();
        
        $products = DB::select("select * from products where name like '%$search_keyword%' or product_tags like '%$search_keyword%' or category_id in (select id from categories where name like '%$search_keyword%')
        or level1_id in (select id from level1 where name like '%$search_keyword%')
        and is_active=1 and is_deleted=0");
        
        if($request->has('sort_by')){
            $products = $this->sortBysearch($sort_by,$search_keyword);
        }

        $categories = Category::where('is_active',1)->orderBy('orderby','asc')->get();

        $this->setPageTitle('Search Result', '');
        return view('site.products.searchproducts',compact('products','categories'));
    }
    
    private function sortBysearch($sort_by,$search_keyword){

        if($sort_by==1){
           //$products = Product::where('is_active',1)->Where('name', 'like', '%' . $search_keyword . '%')->orWhere('product_tags', 'like', '%' . $search_keyword . '%')->orderBy('id','desc')->get();
           $products = DB::select("select * from products where name like '%$search_keyword%' or product_tags like '%$search_keyword%' or category_id in (select id from categories where name like '%$search_keyword%')
        or level1_id in (select id from level1 where name like '%$search_keyword%')
        and is_active=1 and is_deleted=0 order by id desc");
        }elseif($sort_by==2){
           //$products = Product::where('is_active',1)->Where('name', 'like', '%' . $search_keyword . '%')->orWhere('product_tags', 'like', '%' . $search_keyword . '%')->orderBy('id','asc')->get();
           $products = DB::select("select * from products where name like '%$search_keyword%' or product_tags like '%$search_keyword%' or category_id in (select id from categories where name like '%$search_keyword%')
        or level1_id in (select id from level1 where name like '%$search_keyword%')
        and is_active=1 and is_deleted=0 order by id asc");
        }elseif($sort_by==3){
           //$products = Product::where('is_active',1)->Where('name', 'like', '%' . $search_keyword . '%')->orWhere('product_tags', 'like', '%' . $search_keyword . '%')->orderBy('inoffered_price','asc')->get();
           
           $products = DB::select("select * from products where name like '%$search_keyword%' or product_tags like '%$search_keyword%' or category_id in (select id from categories where name like '%$search_keyword%')
        or level1_id in (select id from level1 where name like '%$search_keyword%')
        and is_active=1 and is_deleted=0 order by inoffered_price asc");
        }elseif($sort_by==4){
           //$products = Product::where('is_active',1)->Where('name', 'like', '%' . $search_keyword . '%')->orWhere('product_tags', 'like', '%' . $search_keyword . '%')->orderBy('inoffered_price','desc')->get();
           
           $products = DB::select("select * from products where name like '%$search_keyword%' or product_tags like '%$search_keyword%' or category_id in (select id from categories where name like '%$search_keyword%')
        or level1_id in (select id from level1 where name like '%$search_keyword%')
        and is_active=1 and is_deleted=0 order by inoffered_price desc");
        }
        return $products;
    }
    
    /**
     * add to cart a product
     * 
     * @return \Illuminate\Http\Response
     */

    public function addcart(Request $request){

        $data = $request->all();
        $data['mac'] = $request->ip();
        $data['is_active'] = 1;

        $cart_items = Cart::where('product_name',$request->product_name)->where('product_id',$request->product_id)->where('mac',$data['mac'])->where('is_active',1)->where('is_deleted',0)->get();

        if(count($cart_items)>0){
            Session::flash('error', 'This product is already added to cart.');
            //notify()->error('This product is already added to cart.', '');
            return back();
        } else {
           Cart::create($data);
           Session::flash('success', 'This product successfully added to cart.');
           //notify()->success('This product successfully added to cart.', '');
        }
        
        if(!empty($_POST['view'])){
            
            return redirect()->route('site.viewcart');
        } else{
            return back();
        }
    }
    
    /**
     * buy now a product
     * 
     * @return \Illuminate\Http\Response
     */

    public function buynow(Request $request){

        $data = $request->all();
        $data['mac'] = $request->ip();
        $data['is_active'] = 1;

        $cart_items = Cart::where('product_name',$request->product_name)->where('product_id',$request->product_id)->where('mac',$data['mac'])->where('is_active',1)->where('is_deleted',0)->get();

        if(count($cart_items)>0){
            //Session::flash('error', 'This product is already added to cart.');
            //notify()->error('This product is already added to cart.', '');
            return back();
        } else {
           Cart::create($data);
           //Session::flash('success', 'This product successfully added to cart.');
           //notify()->success('This product successfully added to cart.', '');
        }
        
        $cart_products = [];

        $cart_productdatas = Cart::where('mac',$request->ip())->get();

        foreach($cart_productdatas as $n){

            $product =  Product::findOrFail($n->product_id);

            if(!empty($product)){
                if($n->product_id = $product->id){
                    $n->shippingcharge = $product->inshipping_charge;
                }
            } else {
                $n->shippingcharge = 0;
            }
            array_push($cart_products, $n);
        }

        $this->setPageTitle('My Cart', '');
        return view('site.products.cart',compact('cart_products'));
    }

    /**
     * view cart products
     * 
     * @return \Illuminate\Http\Response
     */

    public function viewcart(Request $request){

        $cart_products = [];

        $cart_productdatas = Cart::where('mac',$request->ip())->get();

        foreach($cart_productdatas as $n){

            $product =  Product::findOrFail($n->product_id);

            if(!empty($product)){
                if($n->product_id = $product->id){
                    $n->shippingcharge = $product->inshipping_charge;
                }
            } else {
                $n->shippingcharge = 0;
            }
            array_push($cart_products, $n);
        }

        $this->setPageTitle('My Cart', '');
        return view('site.products.cart',compact('cart_products'));
    }

    /**
     * update cart products
     * 
     * @return \Illuminate\Http\Response
     */

    public function updatecart(Request $request){

        $product_id = $request->product_id;
         
        $cartItem = Cart::findOrFail($product_id);

        $cartItem->update(['quantity'=> $request->quantity]);

        Session::flash('success', 'Cart updated successfully');
        return back();
    }

    /**
     * remove a product from cart
     * 
     * @return id [cart table id]
     */

    public function removecart($id){

        $res = Cart::find($id)->delete();

        if ($res) {
            Session::flash('success', 'product removed from cart');
            return back();
        }
            
        Session::flash('error', 'Went wrong');
        return back();
    }

    /**
     * Checkout
     * 
     * @return \Illuminate\Http\Response
     */

   public function checkout(Request $request){
       
        $discount = 0;
        $coupon_code = '';

        $bookings = Booking::where('mac',$request->ip())->where('billing_address','!=','')->where('status',0)->get();

        if(count($bookings)){

            $cartProducts = [];

            $cart_productdatas = Cart::where('mac',$request->ip())->get();

            foreach($cart_productdatas as $n){

            $product =  Product::findOrFail($n->product_id);

            if(!empty($product)){
                if($n->product_id = $product->id){
                    $n->shippingcharge = $product->inshipping_charge;
                }
            } else {
                $n->shippingcharge = 0;
            }
            array_push($cartProducts, $n);
        }
            $states = State::where('is_active',1)->get();

            $this->setPageTitle('Checkout', '');
            return view('site.products.checkout',compact('cartProducts','bookings','states'));

        } else {

            $data['mac'] = $request->ip();
            $data['unique_code'] = 'MASHROO' . rand(100000, 999999);
            $data['coupon_code'] = $coupon_code;
            $data['discount_amount'] = $discount;
            $data['billing_country'] = 'India';
            $data['shipping_country'] = 'India';
            $data['is_active'] = 1;

            $status = Booking::create($data);
        
            $cartProducts = [];

            $cart_productdatas = Cart::where('mac',$request->ip())->get();

            foreach($cart_productdatas as $n){

            $product =  Product::findOrFail($n->product_id);

            if(!empty($product)){
                if($n->product_id = $product->id){
                    $n->shippingcharge = $product->inshipping_charge;
                }
            } else {
                $n->shippingcharge = 0;
            }
            array_push($cartProducts, $n);
        }
            $bookings = Booking::where('id',$status->id)->get();
            $states = State::where('is_active',1)->get();
            $this->setPageTitle('Checkout', '');
            return view('site.products.checkout',compact('cartProducts','bookings','states'));
        }
    }

    /**
     * payment page
     * @param $bookingId
     * @return \Illuminate\Http\Response
     */

    public function payment(Request $request, $bookingId){

        if (! $request->isMethod('post')) {
            return back();
        }

        $booking_id = base64_decode($bookingId);

        $data = $request->all();
        $discount = $request->discount_amount;
        if(count($data)){
        $status = Booking::findOrFail($booking_id);

        $stat = $status->update($data);

            $cartProducts = [];

            $cart_productdatas = Cart::where('mac',$request->ip())->get();

            foreach($cart_productdatas as $n){

            $product =  Product::findOrFail($n->product_id);

            if(!empty($product)){
                if($n->product_id = $product->id){
                    $n->shippingcharge = $product->inshipping_charge;
                }
            } else {
                $n->shippingcharge = 0;
            }
            array_push($cartProducts, $n);
        }
            $booking = Booking::where('id',$booking_id)->get();
            $booking = $booking[0];
            //$pin_codes = Pincode::where('pin',$booking->shippingpin)->get();
            $this->setPageTitle('Review Booking', '');
        return view('site.products.payment',compact('cartProducts','booking','discount'));

        } else {

            $cartProducts = [];

            $cart_productdatas = Cart::where('mac',$request->ip())->get();

            foreach($cart_productdatas as $n){

            $product =  Product::findOrFail($n->product_id);

            if(!empty($product)){
                if($n->product_id = $product->id){
                    $n->shippingcharge = $product->inshipping_charge;
                }
            } else {
                $n->shippingcharge = 0;
            }
            array_push($cartProducts, $n);
        }
            $booking = Booking::where('id',$booking_id)->get();
            $booking = $booking[0];
            //$pin_codes = Pincode::where('pin',$booking->shippingpin)->get();
            $this->setPageTitle('Review Booking', '');
        return view('site.products.payment',compact('cartProducts','booking','discount'));
        }
        
        //Session::flash('error', 'Went wrong');
        return back();
    }

    /**
     * booking process after payment
     * 
     * @return \Illuminate\Http\Response
     */

    public function booking(Request $request){

        $booking_id = base64_decode($request->bookingId);

        $booking = Booking::findOrFail($booking_id);
        $dt = Carbon::now()->timezone('Asia/Calcutta');
        $booking->total_amount = $request->amount;
        $booking->shipping_charge = $request->shipping_charge;
        if($request->transaction_id=='' || $request->transaction_id== null){
            $booking->payment_mode = 3;
        } else {
            $booking->payment_mode = 1;
        }
        
        $booking->paid_amount = $request->amount;
        $booking->transaction_id = $request->transaction_id;
        $booking->is_paid = 1;
        $booking->status = 1;
        if(Auth::guard('users')->check()){
        $booking->user_id = Auth::guard('users')->user()->id;
        }
        
        $booking->order_date_time = $dt->toDateTimeString(); 
        
        $booking->save();

        $cartProducts = Cart::where('mac',$request->ip())->get();

        if(!empty($cartProducts)){
            for ($i=0; $i <count($cartProducts) ; $i++) { 

                $data['booking_id'] = $booking->id;
                $data['product_name'] = $cartProducts[$i]->product_name;
                $data['product_brand'] = $cartProducts[$i]->product_brand;
                $data['product_code'] = $cartProducts[$i]->product_code;
                $data['product_image'] = $cartProducts[$i]->product_image;
                $data['quantity'] = $cartProducts[$i]->quantity;
                $data['price'] = $cartProducts[$i]->price;
                $data['gst'] = $cartProducts[$i]->gst;
        
            BookingProduct::create($data);

            }
        }
        
        // $res = $this->shiprocket($booking);
        
        // if(!$res){
        //     Session::flash('error', 'Went wrong');
        //     return back();
        // }
        Cart::where('mac',$request->ip())->delete();
        //$res = json_decode($res);
        //$booking->shiprocket_order_id = $res->order_id;
        //$booking->shiprocket_shipment_id = $res->shipment_id;
        
        $booking->save();
        
        // dump($booking);
        // dd($res);
        return redirect('thankyou?bookingcode='.$booking->unique_code);
    }

    /**
     * thank you page after booking successful
     * 
     * @return productId
     */

    public function thankyou($bookingcode =''){

        $this->setPageTitle('','');
        return view('site.products.thankyou');
    }
    
    public function checkcoupon(Request $request){

        $code = $request->code;

        $booking = Booking::findOrFail($request->bookingId);

        $use_date = date("Y-m-d");

        $result = DB::select("select * from coupon_codes where coupon_code='$code'
            and (start_date<='$use_date' and end_date>='$use_date')");
       
        if (count($result) > 0) {

            $offer_type = $result[0]->offer_type;
            $offer_rate = $result[0]->offer_rate;

            Session::flash('success', 'Your coupon code is applied successfully');
           
            return redirect('check-out?offer_type='.$offer_type.'&offer_rate='.$offer_rate);
        } else {
            Session::flash('error', 'Sorry! This is either invalid or expired coupon code.');
            return back();
        }
    }
    
    public function shiprocket($booking){

        $logindetails = $this->shiprocketlogin();
        $logindetails = json_decode($logindetails);
        
        //echo "<pre>";
        //print_r($logindetails);

        $dt = Carbon::now()->timezone('Asia/Calcutta')->toDateTimeString();

        //$booking = Booking::findOrFail(178);
        
        $pushdata = array();

        foreach($booking->bookingProduct as $n){
            $data['name'] = $n->product_name;
            $data['sku'] = $n->product_code;
            $data['units'] = $n->quantity;
            $data['selling_price'] = $n->price;

            array_push($pushdata, $data);
        }

        $name =  $this->split_name($booking->name);
        $jsondata['order_id'] = $booking->id;
        $jsondata['order_date'] = $booking->order_date_time;
        $jsondata['channel_id'] = '38928';
        $jsondata['pickup_location'] = 'THOBE';
        $jsondata['billing_customer_name'] = $name[0];
        $jsondata['billing_last_name'] = $name[1];
        $jsondata['billing_address'] = $booking->shipping_address;
        $jsondata['billing_address_2'] = $booking->shipping_address;
        $jsondata['billing_city'] = $booking->shipping_city;
        $jsondata['billing_pincode'] = $booking->shipping_pin;
        $jsondata['billing_state'] = $booking->state->name;
        $jsondata['billing_country'] = $booking->shipping_country;
        $jsondata['billing_email'] = $booking->email;
        $jsondata['billing_phone'] = $booking->mobile;
        $jsondata['shipping_is_billing'] = true;
        $jsondata['shipping_customer_name'] = '';
        $jsondata['shipping_last_name'] = '';
        $jsondata['shipping_address'] = '';
        $jsondata['shipping_address_2'] = '';
        $jsondata['shipping_city'] = '';
        $jsondata['shipping_pincode'] = '';
        $jsondata['shipping_country'] = '';
        $jsondata['shipping_state'] = '';
        $jsondata['shipping_email'] = '';
        $jsondata['shipping_phone'] = '';
        $jsondata['order_items'] = $pushdata;
        
        $payment_method = '';
        if($booking->payment_mode==1) {
            $payment_method = "Prepaid";
        } elseif($booking->payment_mode==3) {
            $payment_method = "Cod";
        }
         
        $jsondata['payment_method'] = $payment_method;
        $jsondata['shipping_charges'] = $booking->shipping_charge;
        $jsondata['total_discount'] = $booking->discount_amount;
        $jsondata['sub_total'] = $booking->total_amount;
        $jsondata['length'] = 10;
        $jsondata['breadth'] = 1;
        $jsondata['height'] = 10;
        $jsondata['weight'] = 5;

        $token = $logindetails->token;
        
        // echo json_encode($jsondata);
        
        // die();
        
        //echo $token;

        $url = 'https://apiv2.shiprocket.in/v1/external/orders/create/adhoc';

        $headers = array(
            "Content-Type: application/json",
            "Authorization: Bearer ". $token
        );
        //  echo '<pre>';
        //  print_r($headers);
        //  die();
        // Open connection
        $ch = curl_init();
        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, 'CURL_HTTP_VERSION_1_1');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($jsondata));
        // Execute post
        $result = curl_exec($ch);
        
        /*echo "result : ".$result;
        die();*/

        curl_close($ch);

        return $result;

        /*return response()
            ->json(["jsondata"=>$jsondata]);*/
    }

    public function shiprocketlogin(){

        $headers = array(
            'Content-Type: application/json'
        );

        $jsondata['email'] = "rahul@mashroostore.com";
        $jsondata['password'] = "Welcome@123";

        $url = 'https://apiv2.shiprocket.in/v1/external/auth/login';

        $ch = curl_init();
        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($jsondata));
        // Execute post
        $result = curl_exec($ch);

        curl_close($ch);
        return $result;
    }

    public function split_name($name) {
    $name = trim($name);
    $last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
    $first_name = trim( preg_replace('#'.$last_name.'#', '', $name ) );
    return array($first_name, $last_name);
  }
}
