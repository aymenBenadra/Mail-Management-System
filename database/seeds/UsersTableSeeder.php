<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Adds the users to the users table in the database.
     */
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
            'role' => 'bo',
        ));
        User::create(array(
            'name' => 'Lily',
            'username' => 'lily',
            'password' => Hash::make('aymben123'),
            'role' => 'dr',
        ));

        // Divisions separated by its name
        User::create(array(
            'name' => 'DEU',
            'username' => 'deu',
            'password' => Hash::make('aymben123'),
            'role' => 'dv',
        ));
        User::create(array(
            'name' => 'DGU',
            'username' => 'dgu',
            'password' => Hash::make('aymben123'),
            'role' => 'dv',
        ));
        User::create(array(
            'name' => 'DAJF',
            'username' => 'dajf',
            'password' => Hash::make('aymben123'),
            'role' => 'dv',
        ));
        User::create(array(
            'name' => 'DAF',
            'username' => 'daf',
            'password' => Hash::make('aymben123'),
            'role' => 'dv',
        ));
        User::create(array(
            'name' => 'Mr Chafki',
            'username' => 'chafki',
            'password' => Hash::make('aymben123'),
            'role' => 'dv',
        ));
        User::create(array(
            'name' => 'Mr Abdouh',
            'username' => 'abdouh',
            'password' => Hash::make('aymben123'),
            'role' => 'dv',
        ));
        User::create(array(
            'name' => 'SI',
            'username' => 'si',
            'password' => Hash::make('aymben123'),
            'role' => 'dv',
        ));
        User::create(array(
            'name' => 'SD',
            'username' => 'sd',
            'password' => Hash::make('aymben123'),
            'role' => 'dv',
        ));
    }
}
