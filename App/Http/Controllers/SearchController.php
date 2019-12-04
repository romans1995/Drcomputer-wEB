<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\categorie;
use App\Search;


class SearchController extends Controller
{
    public function autoComplete(){

        return view('search.autocomplete');
    }
    

    
    public function autoCompleteAjax(Request $request,$curl){

 $search =$request->$products;
 $posts =Product::where('ptitle','like',"%search%")
 ->orderBy('created_at','DESC')->limit(5)->get();

 if(!$products->isEmpty())
 {
     foreach($products as $product)
     {
        $new_row['title']= $product->ptitle;
	            $new_row['image']=Helper::catch_first_image($product->pimage);
                $new_row['url']= url('shop/' .$curl .'/' .$product->purl);
                $row_set[] = $new_row; //build an array
 }


}
   
echo json_encode($row_set); 

               
}
}
