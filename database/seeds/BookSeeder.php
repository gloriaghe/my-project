<?php

use App\Models\Book;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users_fake = User::all()->pluck('id');

        for ($i=0; $i < 150; $i++) {
            $book = new Book;
            $book->title = $faker->words(rand(2, 10), true);
            $book->author = $faker->words(rand(2, 4), true);
            $book->image = 'https://picsum.photos/id/' .rand(1, 300) . '/300/200';
            $book->description = $faker->paragraphs(rand(2, 10), true);
            $book->save();
    }
    }
}
