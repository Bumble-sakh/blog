<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;
use DB;

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
                'name' => 'Admin',
                'email' => 'admin@mail.ru',
                'password' => Hash::make('123'),
            ],
            [
                'name' => 'Bumble',
                'email' => 'bumble@mail.ru',
                'password' => Hash::make('123'),
            ],
        ]);
    }
}
