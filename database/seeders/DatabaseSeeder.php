<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use App\Models\View;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {

        //Create Default Users
        User::create([
            'name' => 'Aung Kyaw Wai Htun',
            'email' => 'aung955910@gmail.com',
            'gender' => 'Male',
            'role' => 'admin',
            'password' => Hash::make('admin123'),
        ]);

        User::create([
            'name' => 'Taylor',
            'email' => 'taylor@gmail.com',
            'gender' => 'Female',
            'password' => Hash::make('taylorteam'),
        ]);

        User::create([
            'name' => 'Harry',
            'email' => 'harry@gmail.com',
            'gender' => 'Male',
            'password' => Hash::make('harryteam'),
        ]);

        //Create Default Book
        Book::factory(10)->create();

        //Create Default Comment
        Comment::factory(30)->create();

        //Crate Default Category
        $categories = ['Helath', 'Business', 'Agricultural', 'Technical', 'Language', 'Religion', 'Magazine', 'Knowledge', 'Comic', 'History', 'Journal', 'Lyrics', 'Comedy'];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
            ]);
        }

        //Create Default Author
        $authors = ['P.G. Wodehouse', 'Patter Frankopan', 'Ethan Brown', 'Walter Isaacson', 'Barbara W. Tuchman'];

        foreach ($authors as $author) {
            Author::create([
                'name' => $author,
                'age' => rand(40, 55),
                'gender' => 'Male',
            ]);
        }

        //Create view mode
        View::create([
            'mode' => 0
        ]);
    }
}