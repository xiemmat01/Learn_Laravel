<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('categories')->insert(
        //     [
        //         [
        //             'tenloai'=>'Laptop',
        //         'description'=>'Máy tính'
        //         ],
        //         [
        //             'tenloai'=>'Điện thoại',
        //             'description'=>'Điện thoại' 
        //         ]
            
        //     ]
        // );
        DB::table('users')->insert([

            [
                'name'=>'Nguyễn Văn A',
                'email'=>'anguyenvan@gmail.com',
                'password'=>'123456'
            ],
            [
                'name'=>'Nguyễn Văn B',
                'email'=>'bnguyenvan@gmail.com',
                'password'=>'123456'
            ],
            [
                'name'=>'Nguyễn Văn C',
                'email'=>'cnguyenvan@gmail.com',
                'password'=>'123456'
            ],
            [
                'name'=>'Nguyễn Văn D',
                'email'=>'dnguyenvan@gmail.com',
                'password'=>'123456'
            ],
        ]);
    }
}
