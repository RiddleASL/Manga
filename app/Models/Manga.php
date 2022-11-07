<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manga extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'title',
        'description',
        'author',
        'genre',
        'chapters',
        'manga_image'
    ];
}
