<?php

namespace App\Http\Controllers;
use App\Menu;
use App\Product;
use App\categorie;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public static $data = ['is_admin'=>false];
    
    public function __construct(){
       
 self::$data['menus'] = Menu::all()->toArray();
 self::$data['products'] = Product::all();
 self::$data['categorys'] = Categorie::all()->toArray();

    }
     
    

               
}
