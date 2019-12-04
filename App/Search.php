<?php

namespace App;
use App\categorie;


use Illuminate\Database\Eloquent\Model;
use Product;
use Session;

class Search extends Model
{
    public function products($curl){
       
        Product::getAll($curl,self::$data);
        self::$data['curl'] = $curl;
        self::$data['page_title'] = self::$data['products'][0]->cname .'products';
       return view('content.products', self::$data);
    }
}