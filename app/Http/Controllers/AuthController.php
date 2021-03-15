<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
   public function login(LoginRequest $request)
   {

      $username = $request['username'];
      $password = $request['password'];

      // $user = User::find(2);
      // Auth::login($user);
      // return view('pages.thanhcong',['user'=>Auth::user()]);

      if (Auth::attempt(['name' => $username, 'password' => $password])) {
         return view('pages.thanhcong',['user'=>Auth::user()]);
      } else {
         return "Đăng nhập không thành công";
      }
   }

   public function logout(){
      Auth::logout();
      return view('pages.login');
   }
}
