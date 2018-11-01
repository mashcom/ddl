<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Licence;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }


    public function accountExists($licence_no){
      $licence = Licence::whereLicenceNo($licence_no)->first();
      if($licence->exists()){
        $token = rand(1000,9999);

        if(mail($licence->email, 'Password Creation', "Account creation token is ".$token)){
          $licence->reset_token = $token;
          if($licence->save()){
            return response()->json(["status"=>"success","email"=>$licence->email]);
          }

        }
        return response()->json(["status"=>"email_err"]);
      }
      return response()->json(["status"=>"not_found"]);
    }

    public function verifyToken($licence_no,$token){
      $licence = Licence::whereLicenceNo($licence_no)->whereResetToken($token)->first();
      if ($licence != null) {
              $licence->reset_token = '';
              $licence->save();
              return response()->json(["status"=>"success"]);
      }
      return response()->json(["status"=>"failed"]);
    }

    public function savePassword($licence_no,$password){
      $licence = Licence::whereLicenceNo($licence_no)->first();
      $licence->password =sha1($password);
      if($licence->save()){
          return response()->json(["status"=>"success"]);
      }
        return response()->json(["status"=>"failed"]);
    }


}
