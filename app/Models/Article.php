<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'author',
        'title',
        'description',
        'content',
        'category_id',
        'category_name',
        'url',
        'urlToImage',
        'publishedAt',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
