<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level1 extends Model
{
    protected $table = 'level1';

	protected $fillable = [
	   'parent_id', 'name','shipping_charge', 'image','size_chart','is_active'
	];

	public $timestamps = false;

	//hasOne relation with Category Model
	public function category(){
	    return $this->hasOne(Category::class, 'id', 'parent_id');
	}
}
