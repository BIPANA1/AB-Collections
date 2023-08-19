<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'ADMIN',
            'email' => 'admin@gmail.com',
            'avatar' => asset('/Image/glassboy.png'),
            'password' => Hash::make('admin123'),
            'address' =>  'dharan',
            'phone' =>   '981745',
            'role' => 1,
            'created_at' => now(),
            'updated_at' => now(),


        ]);
    }
}
