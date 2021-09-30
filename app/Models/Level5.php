<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level5 extends Model
{
    protected $table = 'level5';

	protected $fillable = [
	   'parent_id', 'name','shipping_charge','size_chart','is_active'
	];

	public $timestamps = false;

	//hasOne relation with Category Model
	public function level4category(){
	    return $this->hasOne(Level4::class, 'id', 'parent_id');
	}
}
