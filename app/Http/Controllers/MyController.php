<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\LaravelRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use App\Models\ThanhVien;

class MyController extends Controller
{
    public function index(){
        return redirect('/');
    }
    public function testAction (){
        echo "asdasd";
    }
    public function MonHoc ($tenmon){
        echo "Tên môn học ".$tenmon;
        //return redirect()->route('MyRoute');
    }
    public function GetUrl (Request $myRequest){
        //return $myRequest->url();
        if ($myRequest->isMethod('get')) {
            echo 'Phương thức Get';
        }
        else{
            echo "Không phải phương thức Get";
        }
        if ($myRequest->isMethod('post')) {
            echo '<br/>Phương thức POST';
        }
        else{
            echo "<br/>Không phải phương thức POST";
        }
        if ($myRequest->is('get*')) {
            echo '<br/>Có get';
        }
        else{
            echo "<br/>Không Có get";
        }
    }

    public function postForm (Request $request){
        if ($request->input('Ten') != null && $request->input('sdt') != null) {
            echo $request->input('Ten')." ".$request->input('sdt');
        }else {
            echo "Chưa nhập thông tin";
        }
    }
    public function setCookie(){
        $response = new Response();
        $response->withCookie('khoahoc', 'Laravel - ABC',1);
        echo "Đã set cookie";
        return $response;
    }
    public function getCookie(Request $request){
        return $request->cookie('khoahoc');
    }

    public function postUsers(LaravelRequest $request){

            $img = $request->file('fImages');
            $dir = 'public/upload/images';    
            $img_name = $img->getClientOriginalName();
            $user = new User();
            $user -> name = $request->name;
            $user -> email = $request->email;
            $user -> password = $request->password;
            $user -> images = $img_name;
            $user -> save();
            $img->move($dir,$img_name);
            return redirect('form/dang-ky');
    }

    public function loginUser(LoginRequest $request){
       $users = ThanhVien::whereRaw('username=?',[$request->username])->get()->toArray();
         if ( Hash::check($request->password, $users[0]['password'])) {
            return redirect('/');
         }else {
            return "Đăng nhập không thành công";
         }
    }
}
