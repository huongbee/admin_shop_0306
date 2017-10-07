<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = "products";

    public function TypeProducts(){
    	return $this->belongsTo('App\TypeProducts','id_type','id');//other_key id:type_product
    }

    public function BillDetail(){
    	return $this->hasMany('App\BillDetail','id_product','id'); //id:local_key: products
    }


    public function Bills(){
    	return $this->belongsToMany('App\Bills','bill_detail','id_product','id_bill');
    }

}
