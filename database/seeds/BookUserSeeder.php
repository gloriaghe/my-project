<?php

use App\Models\Book;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;


class BookUserSeeder extends Seeder
{

    public function run(Faker $faker)
    {
        $books = Book::all();
        $users = User::all()->pluck('id');
        $nUsers = count($users);

        foreach ($books as $book) {
            $bookUsers = $faker->randomElements($users, rand(1, $nUsers));

            foreach ($bookUsers as $UserId) {
                $book->users()->attach($UserId);
            }
        }
    }
}
