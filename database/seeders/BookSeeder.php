<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 5; $i++) {
            DB::table('books')->insert(
                [
                    [
                        'title' => 'Book ' . $i . ' title',
                        'author' => 'author' . $i,
                        'description' => 'some description for book ' . $i,
                        'price' => rand(101, 1000),
                        'rating' => rand(0, 5),
                        'Cover' => 'covers/E4bS7bIzhVZ82cd29UF5r5RwQL25OI9w87DyPZEa.jpg',
                        'PDF' => 'pdfs/1oWSZ6INDypfxtQBVabZoIG7vxiv6pYnXQNhwT0G.pdf',
                    ],

                ]);
        }

    }
}
