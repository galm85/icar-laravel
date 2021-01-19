<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MenuRequest;
use App\Menu;

use Session;

class MenuController extends MainController
{

    public function index()
    {
        return view('cms.menu.menu',self::$data);
    }


    public function create()
    {
        return view('cms.menu.add_menu',self::$data);
    }


    public function store(MenuRequest $request)
    {
            Menu::save_new($request);
            return redirect('cms/menu');
    }


    public function show($id)
    {
        self::$data['title'].='delete menu';
        self::$data['id'] = $id;
        return view('cms.menu.delete_menu',self::$data);
    }


    public function edit($id)
    {
        self::$data['menu']=Menu::find($id)->toArray();
        return view('cms.menu.edit_menu',self::$data);
    }


    public function update(MenuRequest  $request, $id)
    {
        Menu::update_item($request,$id);
        return redirect('cms/menu');
    }


    public function destroy($id)
    {
        Menu::destroy($id);
        Session::flash('sm','The menu has been deleted');
        return redirect('cms/menu');
    }
}
