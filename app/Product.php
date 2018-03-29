<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table="products";
    
    public function ProductType(){
        return $this->belongsTo('App\ProductType','id_type');
    }
}
