<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level3 extends Model
{
    protected $table = 'level3';

	protected $fillable = [
	   'parent_id', 'name','shipping_charge','size_chart','is_active'
	];

	public $timestamps = false;

	//hasOne relation with Category Model
	public function lelevl2category(){
	    return $this->hasOne(Level2::class, 'id', 'parent_id');
	}
}
