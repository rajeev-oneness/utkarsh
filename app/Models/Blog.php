<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
	protected $fillable = [
	   'title','image', 'content', 'is_active','url_key','post_date'
	];

    public $timestamps = false;
}
