<?php

namespace App;
use Cart;

use Illuminate\Database\Eloquent\Model;
use DB;
use Session;
use Image;



class Product extends Model
{
    public static function getAll($request,$curl,&$data){
        if(!empty($request['price'])){
            if($request['price']=='up'){
            $order= 'DESC';
        }elseif($request['price']=='down'){
                $order ='ASC';
            }else{
                abort(404);
            }
            $data['products'] = DB::table('products as p')
            ->select('p.*','c.cname')
            ->join('categories as c','c.id','=','p.categorie_id')
            ->where('c.curl','=',$curl)
            ->orderBy('price',$order)
            ->paginate(3)
            ->appends('price',request('price'));
        }else{
     
            $data['products'] = DB::table('products as p')
            ->select('p.*','c.cname')
            ->join('categories as c','c.id','=','p.categorie_id')
            ->where('c.curl','=',$curl)
            ->paginate(3);
           if(count($data['products'])== 0){
               abort(404);
           }
        }
    }


    public static function getItem($purl, &$data)
    {
        
        if( $product = self::where('purl','=',$purl)->first()){
           
            $data['product'] = $product->toArray();
           
        }else{
            abort(404);
        }
        
        
    }

    public static function addToCart($pid){
        if(!Cart::get($pid) && $product = self::find($pid)){
            $product = $product;
        Cart::add($pid,$product['ptitle'],$product['price'],1,['image'=>$product['pimage']]);
        Session::flash('sm',$product['ptitle'] . 'added to cart!');
        }
    }
    public static function updateCart($request){
        
        if( !empty($request['op']) && !empty($request['pid']) &&is_numeric($request['pid']) ){
           if ($product = Cart::get($request['pid'])){

            if($request['op'] == 'plus'){
                Cart::update($request['pid'], [
                    'quantity' => 1]);

            }elseif($request['op']=='minus'){
                

                    Cart::update($request['pid'], ['quantity' => -1]);
                

               
            }

            }

        }
    }
    public static function save_new($request){

        
      $file_name="pa1.jpg";
      if($request->hasFile('image') && $request->file('image')->isValid()){

        $file =$request->file('image');
        $file_name = date('Y.m.d.H.i.s'). '-' . $file->getClientOriginalName();
        $request->file('image')->move(public_path(). '/images', $file_name);
        $img = Image::make(public_path().'/images/' .$file_name);
        $img -> resize(300,null, function ($constraint) {
          $constraint->aspectRatio();
        });
        $img->save();
      }
      $product = new self();
      $product->categorie_id = $request['categorie_id'];
      $product->ptitle =$request['title'];
      $product->particle = $request['article'];
      $product->price= $request['price'];
      $product->pimage = $file_name;
      $product->purl =$request['url'];
      $product->save();
      Session::flash('sm','Product saved !');

    }
    public static function update_item($request, $id)
    {

        $file_name="";
        if($request->hasFile('image') && $request->file('image')->isValid()){
  
          $file =$request->file('image');
          $file_name = date('Y.m.d.H.i.s'). '-' . $file->getClientOriginalName();
          $request->file('image')->move(public_path(). '/images', $file_name);
          $img = Image::make(public_path().'/images/' .$file_name);
          $img -> resize(300,null, function ($constraint) {
            $constraint->aspectRatio();
          });
          $img->save();
        }
        $product =  self::find($id);
        $product->categorie_id = $request['categorie_id'];
        $product->ptitle =$request['title'];
        $product->particle = $request['article'];
        $product->price= $request['price'];
        if($file_name){
            if($product->pimage != 'pa1.jpg'){
                unlink(public_path() . '/images/' . $product->pimage);
            }
            $product->pimage =$file_name;
        }
        $product->purl =$request['url'];
        $product->save();
        Session::flash('sm','Product saved !');
  
      }

    }
