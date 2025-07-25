<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class order_product extends Model
{
    //
    protected $fillable = [
        'order_id',
        'book_id',
        'quantity',
        'price'
    ];



public function order(): BelongsTo
{
    return $this->belongsTo(Order::class);
}



public function book(): BelongsTo
{
    return $this->belongsTo(Book::class);
}
}
