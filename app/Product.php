<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cart , Session,Image;

class Product extends Model
{
    static public function getProducts($cat_url,&$data){
       if($category = Categorie::where('url','=',$cat_url)->first()){

        $category = $category->toArray();
        $data['title'] .=$category['title'].' products';
        $data['cat_url']=$cat_url;

            if($products = Categorie::find($category['id'])->products){
              $data['products'] =   $products->toArray();
            }

       }else{
           abort(404);
       }


    }



    static public function addToCart($id){

        if(!empty($id) && is_numeric($id)){
            if(!Cart::get($id)){
                if($product = self::find($id)){
                    $product = $product->toArray();
                    Cart::add($id,$product['title'],$product['price'],1,[]);
                    Session::flash('sm',$product['title'].' added to cart');
                }
            }
        }

    }

    static public function updateCart($request){
        if(!empty($request['id'])&&  is_numeric($request['id'])){
            if(!empty($request['op'])){
                $item = Cart::get($request['id']);
                if($item){
                    if($request['op']=='+'){
                        Cart::update($request['id'],['quantity'=>1]);
                    }elseif($request['op']=='-'){
                        $item = $item->toArray();
                        if($item['quantity']-1 != 0){
                            Cart::update($request['id'],['quantity'=>-1]);

                        }
                    }
                }
            }
        }
    }






    static public function save_new($request){
        $img = self::loadImage($request);

        $image_name = $img ? $img :'no-image.jpg';

        //create new object and save to the data base
        $product = new self();
        $product->categorie_id = $request['categorie_id'];
        $product->title = $request['title'];
        $product->article = $request['article'];
        $product->image = $image_name;
        $product->url = $request['url'];
        $product->price = $request['price'];
        $product->save();
        Session::flash('sm','New Product has been added');

    }


    static public function update_item($request,$id){

        $image_name = self::loadImage($request);

        $product = self::find($id);
        $product->categorie_id = $request['categorie_id'];
        $product->title = $request['title'];
        $product->article = $request['article'];
        $product->url = $request['url'];
        $product->price = $request['price'];

        if($image_name){
            $product->image = $image_name;
        }

        $product->save();
        Session::flash('sm','The Product has been updated');

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
