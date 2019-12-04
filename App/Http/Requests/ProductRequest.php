<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;


use Illuminate\Http\Request;




class ProductRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

  
    public function rules(Request $request)
    {
       

        $item_id= !empty($request['item_id']) ? ',' . $request['item_id'] : '';
        return [
           'categorie_id' => 'required',
           'title' => 'required',
           'url' => 'required|regex:/^[a-z\d-]+$/|unique:products,purl'. $item_id,
           'price' => 'required|numeric',
           'article' => 'required',
           'image' => 'image|max:10240',
        ];
    }
}
