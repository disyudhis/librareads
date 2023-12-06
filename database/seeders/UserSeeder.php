<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate([
            "id"    => "1",
            'email' => 'admin@gmail.com'
         ], [
             'name'              => 'Admin',
             'password'          => Hash::make('password'),
             'role'              => 'ADMIN',
         ]);
 
         User::firstOrCreate([
            "id"    => "2",
            'email' => 'member@gmail.com'
         ], [
             'name'              => 'Member',
             'password'          => Hash::make('password'),
             'role'              => 'MEMBER',
         ]);
    }
}
