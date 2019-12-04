<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

class Menu extends Model
{
 public static function save_new($request){
     
     $menu = new self();
     $menu->link = $request['link'];
     $menu->murl = $request['url'];
     $menu->mtitle = $request['title'];
     $menu->save();
     Session::flash('sm','Menu Link Saved!');
 }
 public static function update_item($request, $id){

      
    $menu =  self::find($id);
    $menu->link = $request['link'];
    $menu->murl = $request['url'];
    $menu->mtitle = $request['title'];
    $menu->save();
    Session::flash('sm','Menu Link is updated!');
 }
}
