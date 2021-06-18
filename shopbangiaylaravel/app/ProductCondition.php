<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCondition extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'product_condition_name'
    ];
    protected $primaryKey = 'product_condition_id';
 	protected $table = 'tbl_product_conditon';

    public function product(){
        return $this->hasMany('App\Product');
    }
}
