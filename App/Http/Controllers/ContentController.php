<?php

namespace App\Http\Controllers;


use App\Http\Requests\ContentRequest;
use App\Menu;
use App\Content;

use Session;


class ContentController extends MainController
{
   
    public function index()
    {
        self::$data['contents'] = Content::all()->toArray();
       return view('cms.content',self::$data);
    }

   
    public function create()
    {
        return view('cms.create_content',self::$data);

    }
    public function store(ContentRequest $request)
    {
      
        Content::save_new($request);
        return redirect('cms/content');
    }

    
    public function show($id)
    {
        self::$data['item_id'] = $id;
        return view('cms.delete_content',self::$data);
    }

    
    public function edit($id)
    {
        self::$data['item'] =Content::find($id)->toArray();
        return view('cms.edit_content',self::$data);
    }

    
    public function update(ContentRequest $request, $id)
    {
        Content::update_item($request, $id);
        return redirect('cms/content');
    }

    public function destroy($id)
    {
        content::destroy($id);
        Session::flash('sm','Item has been deleted');
        return redirect('cms/content');
    }
}
