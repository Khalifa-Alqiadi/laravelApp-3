<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user01['name'] = 'admin';
        $user01['email'] = 'admin@gmail.com';
        $user01['password'] = Hash::make('123123123');
        $user01['avatar'] = 'img.jpg';
        User::create($user01)->attachRole('super_admin');


        $user02['name'] = 'DRC';
        $user02['email'] = 'DRC@gmail.com';
        $user02['password'] = Hash::make('123123123');
        $user02['avatar'] = 'DRC.png';
        User::create($user02)->attachRole('owner');

        $user03['name'] = 'FHD';
        $user03['email'] = 'FHD@gmail.com';
        $user03['password'] = Hash::make('123123123');
        $user03['avatar'] = 'FHD.jpg';
        User::create($user03)->attachRole('owner');


        $user04['name'] = 'khalifa alqiadi';
        $user04['email'] = 'khalifa@gmail.com';
        $user04['password'] = Hash::make('123123123');
        $user04['avatar'] = 'img.jpg';
        User::create($user04)->attachRole('client');
    }
}
