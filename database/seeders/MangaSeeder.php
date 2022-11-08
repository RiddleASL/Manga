<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Models\Manga;

class MangaSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $genres = array("horror", "sol", "shounen");
        // shuffle($genres);

        // DB::table('mangas')->insert([
        //     'title' => Str::random(15),
        //     'author' => Str::random(5) . " " . Str::random(7),
        //     'genre' => $genres[1],
        //     'chapters' => random_int(1,30),
        //     'description' => ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ornare a nisl id placerat. In pretium metus ut nisl ullamcorper elementum. Sed egestas sit amet erat sit amet bibendum. Nunc commodo vel libero quis porttitor. Donec in lacus justo. Praesent posuere condimentum justo, ac eleifend urna varius a. Proin sed lacinia lectus.

        //     Nunc mattis tincidunt nulla nec mattis. Praesent eu elit non nunc dapibus auctor at ut libero. Nullam at odio eros. Nulla ut odio et ante cursus porta. Aliquam porta facilisis risus, pulvinar vestibulum massa. Integer ac odio eu risus rhoncus elementum. Sed vitae augue a mi rhoncus hendrerit ut vitae lacus. Nunc nisl odio, pretium at lorem vitae, varius pharetra ex. Nam ultrices sed risus et condimentum. Sed sit amet velit quis mauris consequat condimentum.
            
        //     Donec tempor efficitur velit sit amet hendrerit. Nunc placerat quam non turpis consectetur, eget gravida nisi euismod. Vestibulum eget massa eu ex accumsan efficitur. Donec vel lacinia quam. In congue augue vitae aliquet tincidunt. Sed malesuada egestas imperdiet. Cras at quam gravida, rhoncus urna vel, feugiat enim. Pellentesque gravida, risus ut dignissim vulputate, ipsum eros consectetur augue, eget venenatis felis arcu non erat. Nam aliquam eros ut tortor lobortis, vel tincidunt sapien ornare. Aliquam quis sem ligula. Nam sed placerat urna, quis placerat dui. Aliquam vitae dapibus sapien. Sed eget mauris quis nulla volutpat malesuada nec non dolor. 
        //     ',
        //     'manga_image' => '2022-11-07-060001_Kobold Adventured.jpg',
        //     'created_at' => date("Y-m-d H:i:s"),
        //     'updated_at' => date("Y-m-d H:i:s"),
        //     'user_id' => 1
        // ]);

        // Fills our database with fake information
        Manga::factory(15)->create();
    }
}
