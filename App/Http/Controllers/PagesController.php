<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\Content;
use Cart;
use DB;

class PagesController extends MainController
{

public function home()
{
 
  self::$data['page_title'] = 'home page';
 
  return view('content.home',self::$data);
}




public function categories(){
  self::$data['page_title']='shop';
  return view('content.categories',self::$data);
}
public function cart(){
  
  $cart =cart::getContent()->toArray();

  
  self::$data['cart'] = $cart;
  
  
  return view('content.home',self::$data);
}

public function content($murl){
  Content::getContent($murl,self::$data);
  return View('content.content',self::$data);
 
}

}