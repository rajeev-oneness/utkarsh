<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';

	protected $fillable = [
	   'parent_id','user_id','offer_type','offer_rate','shiprocket_order_id','shiprocket_shipment_id', 'name', 'email','mobile','amount','shipping_charge','billing_city','billing_state','billing_country','billing_address','billing_pin','billing_landmark','shipping_city','shipping_state','shipping_country','shipping_address','shipping_pin','shipping_landmark','lat','lon','total_amount','discount_amount','payment_mode','paid_amount','transaction_id','order_date_time','is_paid','status','image', 'is_active','unique_code','mac'
	];

	public $timestamps = false;

	//hasMany relation with Category Model
	public function bookingProduct(){
	    return $this->hasMany(BookingProduct::class, 'booking_id', 'id');
	}
	
	public function state(){
		return $this->hasOne(State::class, 'id', 'shipping_state');
	}
}
