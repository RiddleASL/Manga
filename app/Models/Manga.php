<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Publisher;

class Manga extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description','author','genre','chapters','manga_image','user_id','publisher_id'];
    // protected $guarded = [];

    public function publisher(){
        return $this->belongsTo(Publisher::class);
    }
}
