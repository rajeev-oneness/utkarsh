<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level4 extends Model
{
    protected $table = 'level4';

	protected $fillable = [
	   'parent_id', 'name','shipping_charge','size_chart','is_active'
	];

	public $timestamps = false;

	//hasOne relation with Category Model
	public function lelevl3category(){
	    return $this->hasOne(Level3::class, 'id', 'parent_id');
	}
}
