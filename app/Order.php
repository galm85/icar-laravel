<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session,Cart,DB;

class Order extends Model
{
    static public function saveNew(){
        $cartCollection = Cart::getContent();
        $cart = $cartCollection->toArray();
        $order = new self();
        $order->user_id = Session::get('user_id');
        $order->data = serialize($cart);
        $order->total = Cart::getTotal();
        $order->save();
        Cart::clear();
        Session::flash('sm','Thank you your order sent');
    }



    static public function getOrders(){
        $sql = "SELECT o.*,u.name FROM orders o JOIN users u ON u.id = o.user_id ORDER BY o.created_at DESC";
        return DB::select($sql);
    }
}
