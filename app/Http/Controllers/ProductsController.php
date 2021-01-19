<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Categorie;
use App\Product;

use Session;

class ProductsController extends MainController
{

    public function index()
    {
        self::$data['products'] = Product::all()->toArray();
        return view('cms.products.products',self::$data);
    }


    public function create()
    {
        self::$data['categories'] = Categorie::all()->toArray();
        return view('cms.products.add_product',self::$data);
    }


    public function store(ProductRequest $request)
    {

            Product::save_new($request);
            return redirect('cms/products');
    }


    //show before destroy
    public function show($id)
    {
        self::$data['product'] = Product::find($id);
        self::$data['id'] = $id;
        return view('cms.products.delete_product',self::$data);
    }


    public function edit($id)
    {
        self::$data['product']=Product::find($id)->toArray();
        self::$data['categories']=Categorie::all()->toArray();
        return view('cms.products.edit_product',self::$data);
    }


    public function update(ProductRequest  $request, $id)
    {

        Product::update_item($request,$id);
        return redirect('cms/products');
    }


    public function destroy($id)
    {
        Product::destroy($id);
        Session::flash('sm','The Product has been deleted');
        return redirect('cms/products');
    }
}
