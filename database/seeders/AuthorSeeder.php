<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\Manga;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Author::factory()
            ->times(3)
            ->create();

            foreach(Manga::all() as $manga){
                $authors = Author::inRandomOrder()->take(rand(1, 3))->pluck('id');
                $manga->authors()->attach($authors);
            }
    }
}
