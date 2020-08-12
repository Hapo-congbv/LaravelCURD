<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'congthanh',
                'userimage' => 'thanhcong.png',
                'password' => '123456789',
                'fullname' => 'nguyen thanh cong',
                'email' => 'vancong1234@gmail.com',
                'mobile' => '031239949',
                'role' => '2',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'username' => 'Nam',
                'userimage' => 'nam.png',
                'password' => '123456789',
                'fullname' => 'nguyen thanh Nam',
                'email' => 'thanhNam1234@gmail.com',
                'mobile' => '031239949',
                'role' => '2',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'username' => 'Chinh',
                'userimage' => 'chinh.png',
                'password' => '123456789',
                'fullname' => 'nguyen cong chinh',
                'email' => 'congchinh1234@gmail.com',
                'mobile' => '031239949',
                'role' => '2',
                'created_at' => date('Y-m-d H:i:s')
            ],
        ]);
    }
}
