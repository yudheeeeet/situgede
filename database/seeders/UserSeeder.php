<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['email' => 'situgedeipb@gmail.com', 'password' => bcrypt('adminsitugede01'), 'name' => 'Admin Pengelola'],
        ];
        
        foreach ($data as $value) {
            User::insert([
                'email' => $value['email'],
                'password' => $value['password'],
                'name' => $value['name'],
            ]);
        }
    
    }
}
