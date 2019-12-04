<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use App\Http\Requests\UserRequest;


use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


use App\User;
use Session;
use Validator;


class PermissionController extends  MainController
{
   
    public function index()
    {
        self::$data['ur']= User::getAll();
       return view('cms.users',self::$data);

    }

   
    public function create()
    {
        
        self::$data['city'] = User::getCity()->toArray();
        self::$data['per'] = User::getp()->toArray();
        return view('cms.create_user',self::$data);

    }
    public function store(PermissionRequest $request)
    {
        User::smc_save_new($request);
        return redirect('cms/users');
    }

    
    public function show($id)
    {
        
        self::$data['user_id'] = $id;
        
        return view('cms.delete_users',self::$data);
    }


    public function edit($id)
    {
        self::$data['cps'] = User::getcp()->toArray();
        self::$data['permission'] = User::getAll()->toArray();
        self::$data['user']=User::find($id)->toArray();
        return view('cms.edit_users',self::$data);
    }

    
    public function update(PermissionRequest $request, $id)
    {
        
        User::update_user($request, $id);
        return redirect('cms/users');
    }
       
              

    public function destroy($id)
    {
        $user=User::find($id);

       User::destroy($id);
       Session::flash('sm','This User has been deleted');

       return redirect('cms/users');
    }
}