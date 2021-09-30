<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level2 extends Model
{
    protected $table = 'level2';

	protected $fillable = [
	   'parent_id', 'name','shipping_charge','size_chart','is_active'
	];

	public $timestamps = false;

	//hasOne relation with Category Model
	public function lelevl1category(){
	    return $this->hasOne(Level1::class, 'id', 'parent_id');
	}
}
