<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;
use Hash;
use Session;

class User extends Model
{
    
    
    public static function verify($email, $password){
   

        $valid = false;
        $user = DB::table('users as u')
        ->join('users_roles as ur','u.id','=','ur.user_id')
        ->where('u.email','=',$email)
        ->first();
        if($user){
            if(Hash::check($password, $user->password)){
                $valid = true;
                Session::put('user_id',$user->id);
                Session::put('user_firstName',$user->firstName);

                if ($user->permission_id == 1){
                    Session::put('is_admin',true);
                }
                Session::flash('sm', 'Welcome '.$user->firstName);
            }
        }
        return $valid;
    }
    
    public static function save_new($request){
        $user = new self();
        $user->firstName = $request['firstName'];
        $user->lastName = $request['lastName'];
        $user->email =$request['email'];
        $user->phone = $request['phone'];
        $user->password = bcrypt($request['password']);
        $user->save();
        DB::insert("INSERT INTO city_roles VALUES(?, ?)",[$user->id, $request['city']]);

        DB::insert("INSERT INTO users_roles VALUES(?, ?)",[$user->id, 2]);
        Session::put('user_id',$user->id);
         Session::put('user_firstName',$user->firstName);
         Session::flash('sm', ' Welcome '. $user->firstName);
    }

    public static function getAll(){
         return (DB::table('users as u')
        ->join('users_roles as ur','u.id','=','ur.user_id')
        ->join('permission as p','p.id','=','ur.permission_id')
        ->select('ur.*','u.*','p.Kind')
        ->get());
      
        
        
        }
        public static function getP(){
            return DB::table('permission as p')
            ->select('p.*')
            ->get();

        }

        
        public static function getCity(){
            return DB::table('citys as c')
            ->select('c.*')
            ->get();
            
        }

        public static function getcp(){
            return DB::table('city_roles as rc')
            ->select('c.*','rc.*','p.*','ur.*')
            ->join('citys as c','rc.city_id','=','c.id')
            ->join('users_roles as ur','ur.user_id','=','rc.user_id')
            ->join('permission as p','ur.permission_id','=','p.id')
            ->get();
            
        }
       
        public static function smc_save_new($request){
            
            $user = new self();
            $user->firstName = $request['firstName'];
            $user->lastName = $request['lastName'];
            $user->email =$request['email'];
            $user->phone = $request['phone'];
            $user->password = bcrypt($request['password']);
            
            
                $user->save();
            
            $user->password = bcrypt($request['password']);
        
            DB::table('city_roles')->insert(
            ['city_id' => $request['city']]);

            DB::insert("INSERT INTO users_roles VALUES(?, ?)",[$user->id, $request['permission']]);
            // DB::table('users_roles')
            // ->insert(['permission_id' => $request['permission']]);

            Session::put('user_id',$user->id);
             Session::put('user_firstName',$user->firstName);
             Session::flash('sm', 'you just add '. $user->firstName);
            
        }
        public static function update_user($request, $id){
            

            $user = self::find($id);
            $user->firstName = $request['firstName'];
            $user->lastName = $request['lastName'];
            $user->email = $request['email'];
            $user->phone = $request['phone'];
            $user->password = bcrypt($request['password']);
            
            
            $user->save();
            
           
            DB::table('city_roles')
            ->where('user_id', $id)
            ->update(['city_id' => $request['city']]);

            DB::table("UPDATE INTO users_roles VALUES(?, ?)",[$user->id, $request['permission']]);

            // DB::table('users_roles')
            // ->where('user_id','=', $id)
            // ->update(['permission_id' => $request['permission']]);

            Session::put('user_id',$user->id);
             Session::put('user_firstName',$user->firstName);
             Session::flash('sm', 'you just Updated '. $user->firstName);
             


    }
   
    public static function delete_user($id)
    {
        DB::delete("DELETE FROM users_roles WHERE user_id=$id");
        User::destroy($id);
        Session::flash('sm', 'User has been deleted');
    }

    public static function findOrder()
    {
        $id = Session::get('user_id');
        return DB::select("SELECT data,total,created_at FROM `orders` WHERE user_id=$id");
    }
}