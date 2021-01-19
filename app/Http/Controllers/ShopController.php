<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;
use App\Product;
use App\Order;
use Cart,Session;


class ShopController extends MainController
{

    public function categories(){


        self::$data['title'] .='Shop Categories';
        self::$data['categories'] = Categorie::all()->toArray();
        return view('content.categories',self::$data);

    }

    public function products($cat_url){
       Product::getProducts($cat_url,self::$data);
       return view('content.products',self::$data);
    }

    public function item($cat_url,$prd_url){
        if($product = Product::where ('url','=',$prd_url)->first()){

            $product = $product->toArray();
            self::$data['title'] .= $product['title'];
            self::$data['product'] = $product;
            return view('content.item',self::$data);

        }else{
            abort(404);
        }


    }


    public function addToCart(Request $request){
       Product::addToCart($request['id']);
    }


    public function checkout(){
        $cartCollection = Cart::getContent();
        $cart = $cartCollection->toArray();
        sort($cart);
         self::$data['title'] .= ' Checkout page';
        self::$data['cart'] = $cart;
        return view('content.checkout',self::$data);
    }

    public function clearCart(){
        Cart::clear();
        return redirect('shop/checkout');
    }

    public function updateCart(Request $request){
        Product::updateCart($request);

    }

    public function removeItem($id){
        Cart::remove($id);
        return redirect('shop/checkout');
    }

    public function order(){
        if(Cart::isEmpty()){
            return redirect('shop');
        }else{
            if(!Session::has('user_id')){
                return redirect('user/signin?rt=shop/checkout');
            }else{
                Order::saveNew();
                return redirect('shop');
            }
        }
    }
}
