<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session,Image;

class Categorie extends Model
{
    public function products(){
        return $this->hasMany('App\Product');
    }


    static public function save_new($request){
        $img = self::loadImage($request);

        $image_name = $img ? $img :'no-image.jpg';

        //create new object and save to the data base
        $category = new self();
        $category->title = $request['title'];
        $category->url = $request['url'];
        $category->article = $request['article'];
        $category->image = $image_name;

        $category->save();
        Session::flash('sm','New Category has been added');

    }


    static public function update_item($request,$id){

        $image_name = self::loadImage($request);

        $category = self::find($id);
        $category->title = $request['title'];
        $category->url = $request['url'];
        $category->article = $request['article'];

        if($image_name){
            $category->image = $image_name;
        }

        $category->save();
        Session::flash('sm','The Category has been updated');

    }

    static private function loadImage($request){
        $image_name='';

        if( $request->hasFile('image') && $request->file('image')->isValid() ){

            //get the photo from the client and rename it + move it to the server folder
            $file = $request->file('image');
            $image_name = date('Y.m.d.H.i.s').'-'.$file->getClientOriginalName();
            $request->file('image')->move( public_path().'/images',$image_name);

            //using Image provider to create a new "clean" photo and override the old one (from client)
            $img = Image::make(public_path().'/images/'. $image_name);
            $img->resize(300,null,function($constraint){
                $constraint->aspectRatio();
            });
            $img->save(public_path().'/images/'. $image_name);
        }
        return $image_name;
    }

}
