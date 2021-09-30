<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Godown extends Model
{
	protected $table = 'godowns';

	protected $fillable = [
	   'name','address','phone','is_active','is_deleted'
	];

	public $timestamps = false;
}
