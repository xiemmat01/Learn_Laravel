<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class AddProduct extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->insert([
            [
                'name' => 'Laptop Asus 1',
            'description' => 'laptop asus 1',
            'price' => '100000',
            'count' => '10',
            'id_cate' =>'1'
            ],
            [
                'name' => 'Laptop Asus 2',
            'description' => 'laptop asus 2',
            'price' => '100000',
            'count' => '10',
            'id_cate' =>'1'
            ],
            [
                'name' => 'Laptop Asus 3',
            'description' => 'laptop asus 3',
            'price' => '100000',
            'count' => '10',
            'id_cate' =>'1'
            ],
            [
                'name' => 'Điện thoại 1',
            'description' => 'Điện thoại 1',
            'price' => '100000',
            'count' => '10',
            'id_cate' =>'1'
            ],
            [
                'name' => 'Điện thoại 2',
            'description' => 'Điện thoại 2',
            'price' => '100000',
            'count' => '10',
            'id_cate' =>'1'
            ],
        ]);
    }
}
