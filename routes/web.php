<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('abc', function () {
    return "abc";
});
Route::get('abc/xyz', function () {
    echo "<h1>Hello World</h1>";
});
Route::get('thamso/{so?}', function ($so = '9') {
    echo $so;
});
Route::get('date/{date}', function ($date) {
    echo "Hôm nay là ngày " . $date;
});
Route::get('date1/{date}', function ($date) {
    echo "Hôm nay là ngày " . $date;
})->where(['date' => '[0-9]+']);

Route::get('info/{name}/{phone}', function ($name, $phone) {
    echo "My name is " . $name . "<br/>My phone is " . $phone;
})->where(['name' => '[a-zA-Z]+', 'phone' => '[0-9]{10}']);

Route::get('Route1', ['as' => 'MyRoute', function () {
    echo "Try for best";
}]);

Route::get('Route2', function () {
    return "Đây là Route 2";
})->name('MyRoute2');

Route::get('goi-route', function () {
    return redirect()->route('MyRoute2');
});

// goi view
Route::get('call-view', function () {
    $abc = "thử gọi view";
    return view('myview', compact('abc'));
});
Route::get('call-layout', function () {
    return view('layout.mylayout');
});
View::share('title', 'Lập trình Laravel');
View::composer(['layout.mylayout', 'myview'], function ($view) {
    return $view->with('thongtin', 'Đây là trang Admin');
});
Route::get('exists-view', function () {
    if (view()->exists('layout.mylayout')) {
        return "View này tồn tại";
    } else {
        return "View này không tồn tại";
    }
});
//Group
Route::group(['prefix' => 'MyGroup'], function () {
    Route::get('user1', function () {
        echo "User 1";
    });
    Route::get('user2', function () {
        echo "User 1";
    });
    Route::get('user3', function () {
        echo "User 1";
    });
    Route::get('user4', function () {
        echo "User 1";
    });
});

//Goi Controller
Route::get('call-controller', 'MyController@testAction');
Route::get('monhoc/{tenmon}', 'MyController@MonHoc');
//URL
Route::get('getUrl', 'MyController@GetUrl');
//gui nhan du lieu voi request
Route::get('getForm', function () {
    return view('postForm');
});
Route::post('postForm', ['as' => 'postForm', 'uses' => 'MyController@postForm']);

//Cookie
Route::get('setCookie', 'MyController@setCookie');
Route::get('getCookie', 'MyController@getCookie');

//blade template
Route::get('master', function () {
    return view('pages.laravel');
});
//database
Route::get('database', function () {
    Schema::create('loaisanpham', function ($table) {
        $table->increments('id');
        $table->string('tensp', 200);
    });

    Schema::create('nguoidung', function ($table) {
        $table->increments('id');
        $table->string('ten');
        $table->string('email');
    });
    echo "đã tạo bảng xong";
});

Route::get('lienketbang', function () {
    Schema::create('sanpham', function ($table) {
        $table->increments('id');
        $table->string('ten');
        $table->float('gia');
        $table->integer('soluong')->default(0);
        $table->integer('id_loaisanpham')->length(10)->unsigned();
        $table->foreign('id_loaisanpham')->references('id')->on('loaisanpham');
    });
    echo "Đã tạo xong bảng sản phẩm";
});

Route::get('suabang', function () {
    Schema::table('theloai', function ($table) {
        $table->dropColumn('nsx');
    });

    echo "Sửa bảng thành công";
});

Route::get('themcot', function () {
    Schema::table('theloai', function ($table) {
        $table->string('email');
    });
    echo "Thêm cột thành công";
});
Route::get('doitencot', function () {
    Schema::rename('theloai', 'nguoidung');
    echo "Đổi tên cột thành công";
});

Route::get('change-col-attr', function () {
    Schema::table('sanpham', function ($table) {
        //$table->integer('gia',12)->nullable()->change();
        $table->string('ten', 250)->nullable()->change();
    });
    echo "Đổi giá trị cột thành công";
});

//Eloquent ORM
Route::get('users/add', function () {
    $user = new App\Models\User();
    $user->name = "Nguyễn Văn E";
    $user->email = "ebcxyz@gmail.com";
    $user->password = "123456";

    $user->save();
    echo "Successfull !!";
});
Route::get('users/truncate', function () {
    DB::table('users')->truncate();
    echo "Đã xóa hết dữ liệu !!";
});
Route::get('users/find/{id}', function ($id) {
    $user = App\Models\User::find($id);
    //echo $user->name." ".$user->email." ".$user->password;
    echo $user;
});
Route::get('product/select', function () {
    $product = App\Models\Product::all()->toArray();
    echo "<pre>";
    print_r($product);
    echo "</pre>";
});
Route::get('product/raw', function () {
    $data = App\Models\Product::whereRaw('price = ?',[100000])->get()->toArray();
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});

//thêm mới database
Route::get('product/create', function(){
    $data = [

            'name' => 'test update',
            'description' => 'Điện thoại samsung',
            'price' => '40000000',
            'count' => '10',
            'id_cate' =>'1'
    ];
    App\Models\Product::create($data);
    echo "successfully !!";
});
// cập nhập database
Route::get('product/update',function(){
    $data = App\Models\Product::find(6);
    $data->id_cate = 2;
    $data->save();
    echo "Successfully !!";
});
//xóa database
Route::get('product/delete',function(){
    $data = App\Models\Product::destroy(7);
    echo "Delete sản phẩm thành công !!";
});

//form request
Route::get('form/dang-ky',function (){
    return view('pages.form');
});
//Route::post('form/dang-ky-thanh-vien',['as' =>'postDangky','uses' => 'MyController@postUsers']);
Route::post('postDangky','MyController@postUsers');
//Route::any('{all?}', 'MyController@index')->where('all','(.*)');

//Responses 
Route::get('response/json', function (){
    $arr = [
        'name' => 'Điện thoại',
        'price' => '1000$',
        'count' => '10',
        'description' => 'Điện thoại',
    ];
    return Response::json($arr);
});

//Auth
Route::get('form/login', function (){
    return view('pages.login');
});

Route::post('login','MyController@loginUser');