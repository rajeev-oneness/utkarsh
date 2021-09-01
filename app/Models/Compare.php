<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compare extends Model
{
    protected $table = 'compares';

	protected $fillable = [
	   'mac', 'product_id',
	];

	public $timestamps = false;
}
