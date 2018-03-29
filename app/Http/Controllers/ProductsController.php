<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Redirect;
use Validator;
use App\Http\Requests;
use App\ProductType;
use App\Product;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_type= ProductType::all();
        return view('products.create', compact('product_type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'       => 'required',
            'unit_price'      => 'required|numeric',
            'id_type' => 'required|numeric',
            'description' => 'required',
        );
        $messages = [
            'name.required'=>'Bạn cần nhập tên sản phẩm',
            'unit_price.required'=>'Bạn cần nhập giá sản phẩm',
            'unit_price.numeric'=>'Giá của sản phảm phải là số',
            'description.required'=>'Bạn cần nhập mô tả sản phẩm',
            ];
        
        $validator = Validator::make($request->all(), $rules,$messages);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('products/create')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            // store
            $product = new Product;
            $product->name       = $request->input('name');
            $product->unit_price      = $request->input('unit_price');
            $product->id_type = $request->input('id_type');
            $product->description = $request->input('description');
            $product->save();

            // redirect
            Session::flash('message', 'Them san pham moi thanh cong!');
            return Redirect::to('products');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
