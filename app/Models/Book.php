<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $fillable = [
    'title', 'author', 'genre', 'description', 'publication_year', 'cover_image' , 'user_id'
];
public function reviews()
{
    return $this->hasMany(Review::class);
}
}
