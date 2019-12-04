<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Image;
use Session;

class Categorie extends Model
{
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
$category = new self();
$category ->cname = $request['name'];
$category->cdescription = $request['article'];
$category->cimage= $file_name;
$category->curl = $request['url'];
$category->save();
Session::flash('sm','Category   updated!');
     
    }
    public static function update_item($request, $id)
    {

      $file_name='';
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
$category = self::find($id);
$category ->cname = $request['name'];
$category->cdescription = $request['article'];
if($file_name){
  if($category->cimage != 'pa1.jpg')
        {
            unlink( public_path() . '/images/' . $category->cimage);
        }
  $category->cimage= $file_name;
  
}

$category->curl = $request['url'];
$category->save();
Session::flash('sm','Category has been  updated!');
      
    }
}