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
            'name' => 'BO',
            'username' => 'bo',
            'password' => Hash::make('ausybo'),
            'role' => 'bo',
        ));
        User::create(array(
            'name' => 'DR',
            'username' => 'dr',
            'password' => Hash::make('ausydr'),
            'role' => 'dr',
        ));

        // Divisions separated by its name
        User::create(array(
            'name' => 'DEU',
            'username' => 'deu',
            'password' => Hash::make('ausydeu'),
            'role' => 'dv',
        ));
        User::create(array(
            'name' => 'DGU',
            'username' => 'dgu',
            'password' => Hash::make('ausydgu'),
            'role' => 'dv',
        ));
        User::create(array(
            'name' => 'DAJF',
            'username' => 'dajf',
            'password' => Hash::make('ausydajf'),
            'role' => 'dv',
        ));
        User::create(array(
            'name' => 'DAF',
            'username' => 'daf',
            'password' => Hash::make('ausydaf'),
            'role' => 'dv',
        ));
        User::create(array(
            'name' => 'Mr Chafki',
            'username' => 'chafki',
            'password' => Hash::make('ausychafki'),
            'role' => 'dv',
        ));
        User::create(array(
            'name' => 'Mr Abdouh',
            'username' => 'abdouh',
            'password' => Hash::make('ausyabdouh'),
            'role' => 'dv',
        ));
        User::create(array(
            'name' => 'SI',
            'username' => 'si',
            'password' => Hash::make('ausysi'),
            'role' => 'admin',
        ));
        User::create(array(
            'name' => 'SD',
            'username' => 'sd',
            'password' => Hash::make('ausysd'),
            'role' => 'dv',
        ));
    }
}
