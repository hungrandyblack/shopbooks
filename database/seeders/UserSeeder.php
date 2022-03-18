<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name         = "Nguyễn Ngọc Khánh Vũ";
        $user->email        = 'admin@gmail.com';
        $user->address      = 'Đông Hà - Quảng Trị';
        $user->birthday     = '1998/08/14';
        $user->password     = Hash::make("admin123");
        $user->save();
        $user->name         = "Nguyễn Ngọc Khánh Vũ";
        $user->email        = 'admin@gmail.com';
        $user->address      = 'Đông Hà - Quảng Trị';
        $user->birthday     = '1998/03/18';
        $user->password     = Hash::make("admin123");
        $user->save();
    }
}
