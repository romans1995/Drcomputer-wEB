<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;



class PermissionRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

  
    public function rules(Request $request)
    {
       

        $id = !empty($request['user_id']) ? ',' . $request['user_id'] : '';       
        return [
           'firstName' =>'required|min:2|max:70',
            'lastName' =>'required|min:2|max:70',
            'phone' => 'required|min:8|max:10',
            'email' => 'required|email|unique:users,email'.$id,
            'password' =>'required|min:6|max:20|confirmed', 
            'city'=>'required',
            'permission'=>'required'
        ];
        
    }
}