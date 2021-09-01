<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CouponCode extends Model
{
    protected $table = 'coupon_codes';

	protected $fillable = [
	   'coupon_name', 'coupon_code', 'start_date','end_date','offer_type','offer_rate','maximum_time_of_use','maximum_user_can_use','no_of_used','is_closed', 'is_active'
	];

	public $timestamps = false;
}
