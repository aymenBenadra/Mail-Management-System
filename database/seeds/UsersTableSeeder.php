<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->delete();
        User::create(array(
            'name'     => 'Mohammed-Aymen Benadra',
            'username' => 'aymmax',
            'password' => Hash::make('aymben123'),
            'role'     => 'admin',
        ));
        User::create(array(
            'name'     => 'Lucy',
            'username' => 'lucy',
            'password' => Hash::make('aymben123'),
            'role'     => 'bo',
        ));
        User::create(array(
            'name'     => 'Lily',
            'username' => 'lily',
            'password' => Hash::make('aymben123'),
            'role'     => 'dr',
        ));
        User::create(array(
            'name'     => 'Mary',
            'username' => 'mary',
            'password' => Hash::make('aymben123'),
            'role'     => 'dv',
        ));
    }
}
