<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart_product extends Model
{
    protected $fillable = [
        'cart_id',
        'book_id',
        'quantity'
    ];




public function cart(): BelongsTo
{
    return $this->belongsTo(Cart::class);
}



public function book(): BelongsTo
{
    return $this->belongsTo(Book::class);
}




}
