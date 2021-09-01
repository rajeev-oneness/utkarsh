<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = 'wish_lists';

	protected $fillable = [
	   'user_id', 'product_id', 'is_active', 'is_deleted'
	];

	public $timestamps = false;
}
