<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use Auth;
use DB;
use Hash;
use Illuminate\Http\Request;
use URL;
use Validator;

class Apicontroller extends Controller
{
	public $successStatus = 200;
	public $errorStatus = 401;
	
	public function city($stateid)
	{
	    header('Content-Type:application/json');
        $city = City::where('is_active',1)->where('state_id',$stateid)->get();
        die(json_encode(array("status"=>"1","city"=>$city)));
        /*return response()
            ->json(['message'=>'success','status'=>'1',"city"=>$city], $this->successStatus);*/
	}

    public function edit_venue_price(Request $request){

        $VenuePriceCalender = VenuePriceCalender::findOrFail($request->id);
        $data = $request->all();
        $VenuePriceCalender->update($data);
      return response()
               ->json(["updated successfully"], $this->successStatus);
    }

    public function service_calender_add_price(Request $request){

        $data = $request->all();
        ServicePriceCalender::create($data);

        return response()
               ->json(['message'=>'Added successfully','status'=>'1'], $this->successStatus);
    }

    public function fetch_service_calender_price($service_id){

       $venueprice = ServicePriceCalender::where('service_id',$service_id)
                          ->get(['service_prices.*','service_prices.price as title']);

       echo json_encode($venueprice);
    }

    public function delete_service_price(Request $request){

        $res = ServicePriceCalender::where('id',$request->id)->delete();
        if($res){
            return response()
               ->json([200], $this->successStatus);
        }
    }
    
    public function checkcoupon($couponcode){

        $code = $couponcode;

        $use_date = date("Y-m-d");

        $result = DB::select("select * from coupon_codes where coupon_code='$code'
            and (start_date<='$use_date' and end_date>='$use_date')");
       
        if (count($result) > 0) {

            $offer_type = $result[0]->offer_type;
            $offer_rate = $result[0]->offer_rate;

            return response()
          ->json(['message'=>'success','status'=>'1','offer_type'=>$offer_type,'offer_rate'=>$offer_rate], $this->successStatus);
           
        } else {
            return response()
          ->json(['message'=>'error','status'=>'0'], 200);
        }
    }
}
