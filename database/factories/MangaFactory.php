<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Manga>
 */
class MangaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        // Define what columns you wish to change and then fill it in with random infomation
        // Description is lorem ipsum as it looks cleaner when viewing
        $genres = array("horror", "sol", "shounen");
        shuffle($genres);

        return [
            'title' => Str::random(15),
            'genre' => $genres[1],
            'chapters' => random_int(1,30),
            'description' => ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ornare a nisl id placerat. In pretium metus ut nisl ullamcorper elementum. Sed egestas sit amet erat sit amet bibendum. Nunc commodo vel libero quis porttitor. Donec in lacus justo. Praesent posuere condimentum justo, ac eleifend urna varius a. Proin sed lacinia lectus.

            Nunc mattis tincidunt nulla nec mattis. Praesent eu elit non nunc dapibus auctor at ut libero. Nullam at odio eros. Nulla ut odio et ante cursus porta. Aliquam porta facilisis risus, pulvinar vestibulum massa. Integer ac odio eu risus rhoncus elementum. Sed vitae augue a mi rhoncus hendrerit ut vitae lacus. Nunc nisl odio, pretium at lorem vitae, varius pharetra ex. Nam ultrices sed risus et condimentum. Sed sit amet velit quis mauris consequat condimentum.
            
            Donec tempor efficitur velit sit amet hendrerit. Nunc placerat quam non turpis consectetur, eget gravida nisi euismod. Vestibulum eget massa eu ex accumsan efficitur. Donec vel lacinia quam. In congue augue vitae aliquet tincidunt. Sed malesuada egestas imperdiet. Cras at quam gravida, rhoncus urna vel, feugiat enim. Pellentesque gravida, risus ut dignissim vulputate, ipsum eros consectetur augue, eget venenatis felis arcu non erat. Nam aliquam eros ut tortor lobortis, vel tincidunt sapien ornare. Aliquam quis sem ligula. Nam sed placerat urna, quis placerat dui. Aliquam vitae dapibus sapien. Sed eget mauris quis nulla volutpat malesuada nec non dolor. 
            ',
            'manga_image' => '2022-12-05-220031_aslkdjasdlkj.png',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
            'user_id' => random_int(1,2),
        ];
    }
}
