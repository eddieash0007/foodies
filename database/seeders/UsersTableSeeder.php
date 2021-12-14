<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = DB::table('users')->insert([
            'name' => 'Eddie Ash',
            'email' => 'eddash@eddmail.com',
            'password' => Hash::make('password'),
            'admin' => 1
        ]);
    }
}
