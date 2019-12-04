<?php

namespace App\Http\Controllers;
use App\Categorie;

use App\Http\Requests\ProductRequest;
use App\Product;
use Session;


class ProductController extends  MainController
{
   
    public function index()
    {
        self::$data['products']= Product::all();
       return view('cms.products',self::$data);
    }

   
    public function create()
    {
        self::$data['categories'] = Categorie::all()->toArray();
        return view('cms.create_product',self::$data);

    }
    public function store( ProductRequest $request)
    {
        
        Product::save_new($request);
        return redirect('cms/products');
    }

    
    public function show($id)
    {
        
        self::$data['item_id'] = $id;
        return view('cms.delete_product',self::$data);
    }

    
    public function edit($id)
    {
        self::$data['categories'] = Categorie::all()->toArray();
        self::$data['item'] =Product::find($id)->toArray();
        return view('cms.edit_product',self::$data);
    }

    
    public function update(ProductRequest $request, $id)
    {
       
        Product::update_item($request, $id);
        return redirect('cms/products');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        

        if($product->pimage != 'pa1.jpg')
        {
            unlink( public_path() . '/images/' . $product->pimage);
        }
        Product::destroy($id);
        Session::flash('sm','Item has been deleted');
        return redirect('cms/products');
    }
}
