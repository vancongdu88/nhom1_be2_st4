<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'product_name', 'product_slug','product_color','product_size','category_id','brand_id','product_desc','product_content','product_price','product_image','product_status', 'product_tags','product_views','price_cost','user_bought'
    ];
    protected $primaryKey = 'product_id';
 	protected $table = 'tbl_product';

     // ADD  PRODUCT
    public function category(){
        return $this->belongsTo('App\CategoryProductModel','category_id');
    }
    public function brand(){
        return $this->belongsTo('App\Brand','brand_id');
    }
    public function procondition(){
        return $this->belongsTo('App\ProductCondition','product_condition_id');
    }

}
