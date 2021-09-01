<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
	protected $fillable = [
	   'name','is_active'
	];

	public $timestamps = false;
}
