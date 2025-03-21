<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntertainmentNews extends Model
{
    use HasFactory;

    protected $fillable = [
        'author',
        'title',
        'description',
        'content',
        'url',
        'urlToImage',
        'publishedAt',
    ];
}
