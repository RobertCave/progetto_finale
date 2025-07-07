<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author',
        'description',
        'category_id',
        'isbn',
        'price',
        'cover_image',
    ];



public function category(): BelongsTo
{
    return $this->belongsTo(Category::class);
}


}