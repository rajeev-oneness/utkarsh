<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Compare;
use App\Models\NewsLetterSubscriber;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect;
use Session;

class CommonController extends BaseController {
       

    /**
     * About
     * 
     * @return \Illuminate\Http\Response
     */

    public function about(){

	    $this->setPageTitle('About', '');
	      
	    return view('site.cms.about');
    }
    
    /**
     * Our Customers
     * 
     * @return \Illuminate\Http\Response
     */

    public function ourcustomers(){

        $this->setPageTitle('Our Customers', '');
          
        return view('site.cms.ourcustomers');
    }

     /**
     * Contact
     * 
     * @return \Illuminate\Http\Response
     */

    public function contact(){

    	$this->setPageTitle('Contact', '');

    	$contactItems = new Setting();

	    return view('site.cms.contact',compact('contactItems'));
    }
    
     /**
     * terms
     * 
     * @return \Illuminate\Http\Response
     */

    public function terms(){

    	$this->setPageTitle('Terms & Conditions', '');

    	$contactItems = new Setting();

	    return view('site.cms.terms',compact('contactItems'));
    }
    
     /**
     * faq
     * 
     * @return \Illuminate\Http\Response
     */

    public function faq(){

    	$this->setPageTitle('Faq', '');

    	$contactItems = new Setting();

	    return view('site.cms.terms',compact('contactItems'));
    }
    
    
    /**
     * replacement
     * 
     * @return \Illuminate\Http\Response
     */

    public function replacement(){

    	$this->setPageTitle('Replacement', '');

    	$contactItems = new Setting();

	    return view('site.cms.replacement',compact('contactItems'));
    }
    
     /**
     * shipping
     * 
     * @return \Illuminate\Http\Response
     */

    public function shipping(){

    	$this->setPageTitle('Replacement', '');

    	$contactItems = new Setting();

	    return view('site.cms.shipping',compact('contactItems'));
    }

    /**
     * Save Contact
     * 
     * @return \Illuminate\Http\Response
     */

    public function contactsave(Request $request){

    	$data = $request->all();

    	$res = Contact::create($data);
        
        Session::flash('success', 'Your request submitted successfully.');
    	return back();
    }
    
    
    /**
     * Save compare
     * @param id
     * @return \Illuminate\Http\Response
     */

    public function compare(Request $request,$id){

        $data['mac'] = $request->ip();
        $data['product_id'] =  $id;

        $res = Compare::updateOrCreate($data);

        if($res){

            Session::flash('success', 'Item has been added to compare list.');
            return back();
        }
        
        Session::flash('error', 'Something went wrong.');
        return back();
    }

    /**
     * Compare List
     * 
     * @return \Illuminate\Http\Response
     */

    public function comparelist(Request $request){

        $ip = $request->ip();

            $comparelist = DB::Select("select * from products where id in (select product_id from compares where compares.mac = '$ip')");

        $this->setPageTitle('Compare List','');
        return view('site.products.compare',compact('comparelist'));
    }

    /**
     * Compare List Delete
     * 
     * @return \Illuminate\Http\Response
     */

    public function resetcomparelist(Request $request){

        $res =  Compare::where('mac',$request->ip())->delete();

        if($res){
            Session::flash('success', 'Compare list deleted.');
            return back();
        }
        Session::flash('error', 'Something went wrong.');
        return back();
    }
    
    public function newsletter(Request $request){

        $news['email'] = $request->email;

        $res = NewsLetterSubscriber::updateOrCreate($news);

        //dd($res);
        if($res){
            Session::flash('success', 'You have successfully subscribed.');
            return back();
        }
        Session::flash('error', 'Something went wrong.');
        return back();
    }
}
