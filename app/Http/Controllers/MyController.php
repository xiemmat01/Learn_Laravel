<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\LaravelRequest;
use App\Models\User;

class MyController extends Controller
{
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

            $user = new User();
            $user -> name = $request->name;
            $user -> email = $request->email;
            $user -> password = $request->password;
            $user -> save();
            return redirect('form/dang-ky');
    }
}
