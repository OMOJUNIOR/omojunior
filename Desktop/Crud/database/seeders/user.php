<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Omo',
            'tel_number' => '0880000009',
            'email' => 'omo@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
