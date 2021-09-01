<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
	protected $fillable = [
	   'name','image', 'content', 'is_active','designation','post_date'
	];

    public $timestamps = false;
}
