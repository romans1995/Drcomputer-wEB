<?php

namespace App\Http\Controllers;
use App\Categorie;
use App\Product;
use Cart;
use Session;
use Illuminate\Http\Request;
use App\Order;







class ShopController extends MainController
{
    public function categories()
    {
        // Cart::clear();
        self::$data['categories'] = Categorie::all()->toArray();
        return view('content.categories', self::$data);

    }
    public function products(Request $request,$curl){
       
        Product::getAll($request,$curl,self::$data);
        self::$data['curl'] = $curl;
        self::$data['page_title'] = self::$data['products'][0]->cname .'products';
        self::$data['categorys'] = Categorie::all()->toArray();
       return view('content.products', self::$data);
    }

    public function item($curl, $purl){
        Product::getItem($purl, self::$data);
        self::$data['page_title'] = self::$data['product']['ptitle'];
        return view('content.item',self::$data);
    }
    
    public function addToCart(Request $request){

      
    Product::addToCart($request['pid']);
    }

    public function cart(){
        self::$data['page_title'] ='Cart Page';
        $cart =cart::getContent()->toArray();
        
      
        sort($cart);
        self::$data['cart'] = $cart;
        
        
        return view('content.cart',self::$data);
    }
    public function cartClear(){
        Cart::clear();
        return redirect('shop/cart');
    }
    public function updateCart(Request $request){
           Product::updateCart($request);
           return redirect('shop/cart');
    }
    public function deleteItem(Request $request){
        Cart::remove($request['pid']);
        return redirect('shop/cart');

    }
    public function saveOrder(){

        if(Cart::isEmpty()){

            return redirect('shop/cart');
        }else {

            if(! Session::has('user_id')){
                return redirect('user/signin?to=shop/cart');
            }else{
                Order::save_new();
                return redirect('shop');
            }
        }
    }
}