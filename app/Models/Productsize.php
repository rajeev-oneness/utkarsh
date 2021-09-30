<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Productsize extends Model
{

	protected $table = 'productsizes';

	protected $fillable = [
	   'productid','sizes','inprice','inoffered_price','usprice','usoffered_price','ukprice','ukoffered_price','rowprice','rowoffered_price'
	];

	public $timestamps = false;

	//hasOne relation with Category Model
	// public function category(){
	//     return $this->hasOne(Category::class, 'id', 'category_id');
	// }
}
