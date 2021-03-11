<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AddThanhVien extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('thanh_vien')->insert([
            [
                'username'=>'test1',
                'password'=>Hash::make(12345),
                'level'=>1,
            ],
            [
                'username'=>'test2',
                'password'=>Hash::make(12345),
                'level'=>2,
            ],
            [
                'username'=>'test3',
                'password'=>bcrypt(12345),
                'level'=>2,
            ],
        ]);
    }
}
