<?php

namespace App;
use Cart;
use DB;
use Illuminate\Database\Eloquent\Model;
use Session;



class Order extends Model
{
   public  static function save_new(){
$order = new self();
$order->user_id = Session::get('user_id');
$order->data = serialize(Cart::getContent()->toArray());
$order->total = Cart::getTotal();
$order->save();
Cart::clear();
Session::flash('sm','Your order has been orderd SUCCESFILLY :)');
   } 
   public static function getAll(){
      return DB::table('orders as o')
      ->join('users as u', 'u.id', '=','o.user_id')
      ->select('o.*','u.firstName','u.lastName')
     ->orderBy('o.created_at','DESC')
      ->get()
      ->toArray();
   }
}
