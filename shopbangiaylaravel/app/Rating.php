<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
     public $timestamps = false; //set time to false
    protected $fillable = [
    	'rating_id', 'product_id', 'rating','rating_status'
    ];
    protected $primaryKey = 'rating_id';
 	protected $table = 'tbl_rating';

    public function comment(){
      return $this->belongsTo('App\Comment');
   }
}
