<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CategoryRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

  
    public function rules(Request $request)
    {
        $item_id= !empty($request['item_id']) ? ',' . $request['item_id'] : '';
        return [
           'name' => 'required',
           'url' => 'required|regex:/^[a-z\d-]+$/|unique:categories,curl'. $item_id,
           'article' => 'required',
           'image' => 'image|max:10240',
        ];
    }
}
