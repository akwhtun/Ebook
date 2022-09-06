<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {

        User::create([
            'name' => 'Aung Kyaw Wai Htun(Admin)',
            'email' => 'aung955910@gmail.com',
            'phone' => '09891082064',
            'address' => 'Mandalay',
            'role' => 'admin',
            'password' => Hash::make('admin123'),
        ]);
        Book::factory(10)->create();
        Category::factory(14)->create();
    }
}