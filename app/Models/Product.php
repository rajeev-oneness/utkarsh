<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //protected $table = 'product';

	protected $fillable = [
	   'category_id','level1_id','level2_id','level3_id','level4_id','level5_id','name','image','size_chart','description','brand','code','price','offered_price','gst','hsn','author','pages','edition','language','isbn_no','binding','publish_year','weight','weight_denomination','color','paper_density','length','duration','validity','version','no_of_users','works_in','internet_connection_required','system_requirements','product_activation_procedure','procedure_to_redeem_code','generic_name','demo_lecture_link','demo_lecture_link2','demo_lecture_link3','demo_lecture_link4','demo_lecture_link5','curriculum','no_of_lectures','video_time','medium_of_teaching','study_materials_provided','item_info','package_info','no_of_views_per_lecture','certification_for_course_provided','phase1_date','phase2_date','extra_validation_price','pendrive_price','printed_book_price','mobile_extra_price','prerequisites','advantage','step_to_use','meta_key','meta_description','product_tags','seo_keywords','link','shipping','is_active','is_bestseller','is_today_deal','is_new','is_recommended','stock','is_pre_order','inprice','inoffered_price','incurrency','inshipping_charge','inmeta_title','inmeta_keywords','inimg_alt_tag','inmeta_description','usprice','usoffered_price','uscurrency','usshipping_charge','usmeta_title','usmeta_keywords','usimg_alt_tag','usmeta_description','ukprice','ukoffered_price','ukcurrency','ukshipping_charge','ukmeta_title','ukmeta_keywords','ukimg_alt_tag','ukmeta_description','rowprice','rowoffered_price','rowcurrency','rowshipping_charge','rowmeta_title','rowmeta_keywords','rowimg_alt_tag','rowmeta_description','in_is_shipping_charges_include','uk_is_shipping_charges_include','us_is_shipping_charges_include','row_is_shipping_charges_include',
	   		'attr1_name','attr1_value',
	   		'attr2_name','attr2_value',
	   		'attr3_name','attr3_value',
	   		'attr4_name','attr4_value',
	   		'attr5_name','attr5_value',
	   		'attr6_name','attr6_value',
	   		'attr7_name','attr7_value',
	   		'attr8_name','attr8_value',
	   		'attr9_name','attr9_value',
	   		'attr10_name','attr10_value',
	];

	public $timestamps = false;

	//hasOne relation with level5 Model
	public function level5category(){
	    return $this->hasOne(Level5::class, 'id', 'level5_id');
	}

	//hasOne relation with Level4 Model
	public function level4category(){
	    return $this->hasOne(Level4::class, 'id', 'level4_id');
	}

	//hasOne relation with Level3 Model
	public function level3category(){
	    return $this->hasOne(Level3::class, 'id', 'level3_id');
	}

	//hasOne relation with Level2 Model
	public function level2category(){
	    return $this->hasOne(Level2::class, 'id', 'level2_id');
	}

	//hasOne relation with Level1 Model
	public function level1category(){
	    return $this->hasOne(Level1::class, 'id', 'level1_id');
	}

	//hasOne relation with category Model
	public function category(){
	    return $this->hasOne(Category::class, 'id', 'category_id');
	}
	
	public function sizes(){
		return $this->hasMany(Productsize::class, 'productid', 'id');
	}
}
