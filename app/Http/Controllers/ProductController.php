<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests;
use App\Product;
use App\ProductType;

class ProductController extends Controller
{
    public function index() {

        $result = Product::where('new',1)->paginate(5);
        
        $product_type = ProductType::find(1)->Product;
        $getCache = Cache::get('userList',function(){
            return \App\User::first();
        });

        return view('showproduct',compact('result','product_type','getCache'));
    }
    
    public function detail($id){
        $result = Product::where('id',$id)->first();
        return view('product_detail',compact('result'));
    }
}
