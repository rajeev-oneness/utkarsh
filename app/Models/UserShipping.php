<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserShipping extends Model
{
    protected $table = 'user_shipping';

	protected $fillable = [
	   'adddress', 'user_id', 'country', 'city', 'pin_code', 'phone'
	];

	public $timestamps = false;
}
