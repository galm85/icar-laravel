<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PagesController extends MainController
{

    public function home(){
        self::$data['title'] .= "Home Page";
        return view('content.home',self::$data);
    }

    public function content($url){
    $content = DB::table('contents')
                ->join('menus','menus.id',"=",'contents.menu_id')
                ->where('menus.url','=',$url)
                ->get()->toArray();

        if(!$content){
            abort(404);
        }else{
            self::$data['title'] .= $content[0]->menu_title;
            self::$data['contents'] = $content;
            return view('content.content',self::$data);
        }

    }
}
