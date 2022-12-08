<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Manga;

class Publisher extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'address'];

    public function mangas(){
        return $this->hasMany(Manga::class);
    }
}
