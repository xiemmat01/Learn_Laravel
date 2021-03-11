<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Models\ThanhVien;
class AuthController extends Controller
{
   public function login (LoginRequest $request){
        // $user = ThanhVien::whereRaw('username =?',[$request['username']])->get()->toArray();
        $username = $request['username'];
        $password = $request['password'];
        // if (Auth::attempt(['name' => $username, 'password' => $password])) {
        //     return redirect('/');
        // }else{
        //     return "asdasd";
        // }
        return $user;
   }
}
