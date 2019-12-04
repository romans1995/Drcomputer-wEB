<?php

namespace App\Http\Controllers;
use App\Order;
use App\User;
use Illuminate\Http\Request;

class CmsController extends MainController
{
    public function dashboard(){
        return View('cms.dashboard',self::$data);
    }
    public function orders(){
        self::$data['orders'] = Order::getAll();
        return View('cms.orders',self::$data);
    }

    public function users() {
        self::$data['ur'] = User::getAll();
        return View('cms.users', self::$data);
    }
}
