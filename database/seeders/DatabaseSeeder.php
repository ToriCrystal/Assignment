<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        \DB::table('users')->insert([
        'name' => 'Gia Nhật', 'email' => 'nhatforomg@gmail.com',
        'password' => bcrypt('123456789'), 'role' => 1
        ]);
    }
}
