<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

class Content extends Model
{
    static public function save_new($request){
        $content = new self();
        $content->menu_id = $request['menu_id'];
        $content->title = $request['title'];
        $content->article = $request['article'];

        $content->save();
        Session::flash('sm','The content has been save');

    }


    static public function update_item($request,$id){
        $content = self::find($id);
        $content->menu_id = $request['menu_id'];
        $content->title = $request['title'];
        $content->article = $request['article'];

        $content->save();
        Session::flash('sm','The content has been updated');
    }
}
