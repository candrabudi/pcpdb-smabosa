<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use bcrypt;

class UserAdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'full_name' => 'Admin Tech Bosa', 
            'email' => 'admintechsmabosa@gmail.com',
            'password' => bcrypt('successpcpdb'),
            'role_name' => 'Admin'
        ]);
    }
}
