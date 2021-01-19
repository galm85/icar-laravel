<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MenuRequest;
use App\Categorie;
use App\Http\Requests\CategoryRequest;
use Session;

class CategoriesController extends MainController
{

    public function index()
    {
        self::$data['categories'] = Categorie::all()->toArray();
        return view('cms.categories.catrgories',self::$data);
    }


    public function create()
    {
        return view('cms.categories.add_category',self::$data);
    }


    public function store(CategoryRequest $request)
    {

            Categorie::save_new($request);
            return redirect('cms/categories');
    }


    public function show($id)
    {
        self::$data['id'] = $id;
        return view('cms.categories.delete_category',self::$data);
    }


    public function edit($id)
    {
        self::$data['category']=Categorie::find($id)->toArray();
        return view('cms.categories.edit_category',self::$data);
    }


    public function update(CategoryRequest  $request, $id)
    {

        Categorie::update_item($request,$id);
        return redirect('cms/categories');
    }


    public function destroy($id)
    {
        Categorie::destroy($id);
        Session::flash('sm','The category has been deleted');
        return redirect('cms/categories');
    }
}
