<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContentRequest;
use App\Menu;
use App\Content;

use Session;

class ContentController extends MainController
{

    public function index()
    {
        self::$data['content'] = Content::all()->toArray();
        return view('cms.content.content',self::$data);
    }


    public function create()
    {
        return view('cms.content.add_content',self::$data);
    }


    public function store(ContentRequest $request)
    {
            Content::save_new($request);
            return redirect('cms/content');
    }


    public function show($id)
    {
        self::$data['id'] = $id;
        return view('cms.content.delete_content',self::$data);
    }


    public function edit($id)
    {
        self::$data['content']=Content::find($id)->toArray();
        return view('cms.content.edit_content',self::$data);
    }


    public function update(ContentRequest  $request, $id)
    {
        Content::update_item($request,$id);
        return redirect('cms/content');
    }


    public function destroy($id)
    {
        Content::destroy($id);
        Session::flash('sm','The Content has been deleted');
        return redirect('cms/content');
    }
}
