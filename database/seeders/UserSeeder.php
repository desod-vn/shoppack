<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);
        DB::table('users')->insert([
            'username' => 'admin1',
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);
        DB::table('users')->insert([
            'username' => 'admin2',
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);
        DB::table('users')->insert([
            'username' => 'admin3',
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        DB::table('users')->insert([
            'username' => 'user',
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);
        DB::table('users')->insert([
            'username' => 'user1',
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);
        DB::table('users')->insert([
            'username' => 'user2',
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);
        DB::table('users')->insert([
            'username' => 'user3',
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);
    }
}
