<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeProducts extends Model
{
    protected $table = "type_products";

    public function Products(){
    	return $this->hasMany('App\Products','id_type','id'); //id:type_products
    }


    public function BillDetail(){
    	return $this->hasManyThrough(
    			'App\BillDetail',
    			'App\Products',
    			'id_type',
    			'id_product',
    			'id', //type_product
    			'id' //product
    	);
    }
}
